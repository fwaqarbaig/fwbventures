<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Media;
use App\Models\MenuItem;
use App\Models\OdooPage;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\RedirectRule;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;
use App\Services\HtmlSanitizer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the CMS admin dashboard.
     */
    public function index(): View
    {
        $stats = [
            'total_products' => Product::count(),
            'published_products' => Product::where('status', 'published')->count(),
            'total_services' => Service::count(),
            'published_services' => Service::where('status', 'published')->count(),
            'total_inquiries' => Inquiry::count(),
            'unread_inquiries' => Inquiry::unread()->count(),
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'total_pages' => Page::count(),
            'total_categories' => Category::count(),
            'total_tags' => Tag::count(),
            'total_media' => Media::count(),
            'total_users' => User::count(),
            'total_menu_items' => MenuItem::count(),
            'active_menu_items' => MenuItem::where('is_active', true)->count(),
            'total_redirects' => RedirectRule::count(),
            'active_redirects' => RedirectRule::where('is_active', true)->count(),
            'redirect_hits' => (int) RedirectRule::sum('hits'),
        ];

        $topRedirects = RedirectRule::orderByDesc('hits')
            ->take(5)
            ->get();

        $recentPosts = Post::with(['user', 'categories'])
            ->latest()
            ->take(30)
            ->get();

        $recentMedia = Media::latest()
            ->take(8)
            ->get();

        $recentInquiries = Inquiry::latest()
            ->take(5)
            ->get();

        $services = Service::ordered()->get();

        $pages = Page::orderBy('title')->get();

        $odoo = OdooPage::getSettings();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentMedia', 'recentInquiries', 'odoo', 'services', 'pages', 'topRedirects'));
    }

    /**
     * Handle quick draft saving from the dashboard.
     */
    public function quickDraft(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ]);

        $slug = Post::createUniqueSlug($validated['title']);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => HtmlSanitizer::clean($validated['content'] ?? ''),
            'status' => 'draft',
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Quick draft saved successfully!');
    }

    /**
     * Check if a focus keyphrase is already used by another entity (cannibalization prevention).
     */
    public function checkKeyword(Request $request): JsonResponse
    {
        $keyword = trim((string) $request->query('keyword', ''));
        $currentType = (string) $request->query('type', '');
        $currentId = $request->query('id');

        if (mb_strlen($keyword) < 3) {
            return response()->json([
                'is_duplicate' => false,
                'used_in' => [],
            ]);
        }

        $kwLower = mb_strtolower($keyword);
        $usedIn = [];

        // Check Services
        $services = Service::where('status', '!=', 'archived')
            ->when($currentType === 'service' && $currentId, fn ($q) => $q->where('id', '!=', $currentId))
            ->where(function ($q) use ($kwLower) {
                $q->whereRaw('LOWER(focus_keyword) = ?', [$kwLower])
                    ->orWhereRaw('LOWER(title) = ?', [$kwLower]);
            })
            ->get(['id', 'title', 'slug', 'focus_keyword']);

        foreach ($services as $s) {
            $usedIn[] = [
                'type' => 'Service',
                'id' => $s->id,
                'title' => $s->title,
                'slug' => $s->slug,
                'url' => route('service.show', $s->slug),
            ];
        }

        // Check Posts
        $posts = Post::where('status', '!=', 'archived')
            ->when($currentType === 'post' && $currentId, fn ($q) => $q->where('id', '!=', $currentId))
            ->where(function ($q) use ($kwLower) {
                $q->whereRaw('LOWER(focus_keyword) = ?', [$kwLower])
                    ->orWhereRaw('LOWER(title) = ?', [$kwLower]);
            })
            ->get(['id', 'title', 'slug', 'focus_keyword']);

        foreach ($posts as $p) {
            $usedIn[] = [
                'type' => 'Blog Post',
                'id' => $p->id,
                'title' => $p->title,
                'slug' => $p->slug,
                'url' => route('post.show', $p->slug),
            ];
        }

        // Check Pages
        $pages = Page::where('status', '!=', 'archived')
            ->when($currentType === 'page' && $currentId, fn ($q) => $q->where('id', '!=', $currentId))
            ->where(function ($q) use ($kwLower) {
                $q->whereRaw('LOWER(focus_keyword) = ?', [$kwLower])
                    ->orWhereRaw('LOWER(title) = ?', [$kwLower]);
            })
            ->get(['id', 'title', 'slug', 'focus_keyword']);

        foreach ($pages as $pg) {
            $usedIn[] = [
                'type' => 'Page',
                'id' => $pg->id,
                'title' => $pg->title,
                'slug' => $pg->slug,
                'url' => url('/'.$pg->slug),
            ];
        }

        return response()->json([
            'is_duplicate' => count($usedIn) > 0,
            'used_in' => $usedIn,
        ]);
    }
}
