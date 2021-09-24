<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\IndexSlider;
use App\Gallery;
use App\Video;

class HomeController extends Controller
{

    public function login()
    {
        return view('auth/login');
    }

    //  CMS NEWS PAGE
    public function newsPage()
    {
        $news = News::orderByDesc('created_at')->paginate(4);
        return view('cms.news-index', compact('news'));
    }

    public function galleryPage()
    {
        $galleryFile = Gallery::get()->groupBy('linked_folder');
        // dd($galleryFile);
        return view('cms.news-gallery', compact('galleryFile'));
    }

    public function videoPage()
    {
        $videos = Video::paginate(10);
        return view('cms.news-video', compact('videos'));
    }
}
