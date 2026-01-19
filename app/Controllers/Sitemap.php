<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Sitemap extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        
        // Ambil semua berita yang sudah publish
        // Kita gunakan method getPublishedNews() yang sudah ada di model kakak
        $news = $newsModel->getPublishedNews()->findAll();

        // Header agar browser/Google tahu ini adalah file XML
        $this->response->setContentType('text/xml');

        // Mulai buat struktur XML
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>\n";

        // --- 1. Halaman Statis ---
        
        // Home
        $xml .= "  <url>\n";
        $xml .= "    <loc>" . base_url('/') . "</loc>\n";
        $xml .= "    <priority>1.0</priority>\n";
        $xml .= "    <changefreq>daily</changefreq>\n";
        $xml .= "  </url>\n";

        // Tentang Kami
        $xml .= "  <url>\n";
        $xml .= "    <loc>" . base_url('tentang-kami') . "</loc>\n";
        $xml .= "    <priority>0.8</priority>\n";
        $xml .= "    <changefreq>monthly</changefreq>\n";
        $xml .= "  </url>\n";

        // Armada
        $xml .= "  <url>\n";
        $xml .= "    <loc>" . base_url('armada') . "</loc>\n";
        $xml .= "    <priority>0.8</priority>\n";
        $xml .= "    <changefreq>monthly</changefreq>\n";
        $xml .= "  </url>\n";

        // Halaman Index Berita
        $xml .= "  <url>\n";
        $xml .= "    <loc>" . base_url('news') . "</loc>\n";
        $xml .= "    <priority>0.9</priority>\n";
        $xml .= "    <changefreq>daily</changefreq>\n";
        $xml .= "  </url>\n";

        // --- 2. Halaman Dinamis (Berita) ---
        foreach ($news as $item) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . base_url('news/' . $item['slug']) . "</loc>\n";
            // Gunakan tanggal update terakhir atau tanggal publish
            $date = date('Y-m-d', strtotime($item['updated_at'] ?? $item['published_at']));
            $xml .= "    <lastmod>" . $date . "</lastmod>\n";
            $xml .= "    <priority>0.7</priority>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>";

        return $xml;
    }
}