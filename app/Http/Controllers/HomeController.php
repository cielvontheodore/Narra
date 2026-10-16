<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();
        $gallery = Gallery::latest()->take(3)->get();
        $product = Product::latest()->take(3)->get();

        return view('welcome', compact('news', 'gallery', 'product'));
    }

    public function gallery()
    {
        $gallery = Gallery::latest()->get();

        return view('dedicatedpage.gallery.index', compact('gallery'));
    }

    public function galleryShow(Gallery $gallery)
    {
        return view('dedicatedpage.gallery.dedicated', compact('gallery'));
    }

    public function news()
    {
        $news = News::latest()->get();

        return view('dedicatedpage.news.index', compact('news'));
    }

    public function newsShow(News $news)
    {
        return view('dedicatedpage.news.dedicated', compact('news'));
    }
}
