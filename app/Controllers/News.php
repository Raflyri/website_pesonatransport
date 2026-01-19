<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    protected $helpers = ['settings', 'text'];

    public function index()
    {
        $model = new NewsModel();

        $data = [
            'title' => 'Berita & Artikel',
            'news'  => $model->getPublishedNews()->paginate(6),
            'pager' => $model->pager
        ];

        return view('pages/news', $data);
    }

    public function detail($slug = null)
    {
        $newsModel = new NewsModel();

        $isAdmin = session()->get('isLoggedIn');

        $query = $newsModel->where('slug', $slug);

        if (!$isAdmin) {
            $query->where('published_at <=', date('Y-m-d H:i:s'));
        }

        $newsItem = $query->first();

        if (!$newsItem) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $sidebarNews = $newsModel->where('slug !=', $slug)
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->findAll(3);

        $metaDesc = substr(strip_tags($newsItem['content']), 0, 160);

        $data = [
            'title'        => $newsItem['title'],
            'meta_desc'    => $metaDesc,
            'news_item'    => $newsItem,
            'sidebar_news' => $sidebarNews
        ];

        return view('pages/news_detail', $data);
    }
}
