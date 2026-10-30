# FWB Ventures - Engineering, Solar, CCTV & Lithium Energy CMS

Official website and web application for **FWB Ventures** (`https://www.fwbventures.com`), Karachi's premier Engineering, Procurement, and Construction (EPC) firm for Solar Installation, Heavy-Duty Mounting Frame Structures, CCTV Security Systems, and LiFePO4 Lithium Batteries.

---

## Project Overview

- **Brand:** FWB Ventures
- **Official Domain:** `https://www.fwbventures.com`
- **Location:** Karachi, Sindh, Pakistan
- **Core Divisions:**
  1. **Solar Installation** (On-Grid, Off-Grid, Hybrid, K-Electric Net Metering, 3kW to 100kW+)
  2. **Solar Frame Structure** (Hot-Dip Galvanized Pergolas, Carports, Ground-Mounts, Industrial Trusses)
  3. **CCTV Services** (Hikvision, Dahua, Uniview, IP PoE, 4K ColorVu, Wireless, AMCs)
  4. **Lithium Batteries** (LiFePO4, 12V/24V/48V 100Ah-200Ah, 5kWh to 200kWh ESS, Wholesale Supply)
- **Framework:** Laravel 11.x (PHP 8.3)
- **CSS / Frontend:** Tailwind CSS v4, Alpine.js, Lucide Icons

---

## Administration & Content Management

- **Admin Login:** `/login` (Directs to `/admin/dashboard`)
- **Contact Inquiries:** Stored in database table `inquiries` and accessible via admin panel.
- **Service Management:** Full CRUD with SEO meta, schemas, pricing tables, and media management.
- **Master XML Sitemaps:** Dynamic and cached via `/sitemap.xml`.
