@props(['schema' => null, 'data' => null])

@php
    $payload = $data ?? $schema;
@endphp

@if(!empty($payload))
    @php
        $baseUrl = rtrim(config('app.url', url('/')), '/');
        
        $sanitizeJsonLd = function($data) use (&$sanitizeJsonLd, $baseUrl) {
            if (is_string($data)) {
                $cleaned = str_replace(
                    ['http://localhost:8000', 'http://127.0.0.1:8000', 'https://rentalpower.ae', 'http://rentalpower.ae'],
                    $baseUrl,
                    $data
                );
                $cleaned = str_replace('"inLanguage": "en-AE"', '"inLanguage": "en-PK"', $cleaned);
                $cleaned = str_replace('"inLanguage":"en-AE"', '"inLanguage":"en-PK"', $cleaned);
                $cleaned = str_replace('rentalpower-logo.png', 'fwb-logo.svg', $cleaned);
                $cleaned = str_replace('Rental Power Engineering Team', 'FWB Ventures Engineering Team', $cleaned);
                $cleaned = str_replace('Rental Power UAE', 'FWB Ventures', $cleaned);
                $cleaned = preg_replace('/"name":\s*"Q[0-9]+:\s*/i', '"name": "', $cleaned);
                return $cleaned;
            }
            if (is_array($data)) {
                $sanitized = [];
                foreach ($data as $k => $v) {
                    if ($k === 'name' && is_string($v)) {
                        $v = preg_replace('/^Q[0-9]+:\s*/i', '', $v);
                    }
                    if ($k === 'inLanguage' && is_string($v) && strtolower($v) === 'en-ae') {
                        $v = 'en-PK';
                    }
                    $sanitized[$k] = $sanitizeJsonLd($v);
                }
                return $sanitized;
            }
            return $data;
        };

        if (is_string($payload)) {
            $trimmed = trim($payload);
            $trimmed = $sanitizeJsonLd($trimmed);
        } else {
            $payload = $sanitizeJsonLd($payload);
        }
    @endphp

    @if(is_array($payload))
        <script type="application/ld+json">
        {!! json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @else
        @if(str_starts_with($trimmed, '<script'))
            {!! $trimmed !!}
        @else
            <script type="application/ld+json">
            {!! $trimmed !!}
            </script>
        @endif
    @endif
@endif
