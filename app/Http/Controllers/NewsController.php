<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Product;
use App\Gallery;
use App\Video;

class NewsController extends Controller
{
    public function newsView()
    {
        $array = News::paginate(3);
        $videos = Video::all();
        $galleryFile = Gallery::get()->groupBy('linked_folder');

        return view('news_updates', compact('array', 'galleryFile', 'videos'));
    }

    public function videoView()
    {
        $videos = Video::all();
        return view('news_updates', compact('videos'));
    }

    public function cmsView()
    {
        return view('auth/login');
    }

}