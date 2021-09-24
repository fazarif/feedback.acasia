<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndexSlider;
use App\News;
use App\Gallery;

class ContentController extends Controller
{
    // INDEX JSON
    public function jsonIndex()
    {
        $indexFile = IndexSlider::all()->sortBy('position');
        json_encode($indexFile);
        return response()->json(['indexFile' => $indexFile]);
    }

    public function jsonIndexUpdate(Request $req)
    {
        // $arr = [];
        $arr = json_decode($req->getContent());
        // SINI dah dpt dah array

        // $test = ["drag1","drag2","drag3","drag5","drag4","drag"];
        foreach($arr as $key => $arrays)
        {
            $x = str_replace('drag', '', $arrays);
            $file = IndexSlider::where('id',$x)->update([
                'position'  =>  $key,
            ]);
        }
        // return response()->json(['arr' => $arr ]);
        return response()->json($arr);
    }

    public function jsonIndexDelete(Request $req)
    {
        $arr = json_decode($req->getContent());
        // SINI dah dpt dah array

        IndexSlider::where('id',$arr)->delete();

        return response()->json(array(
            'success'   =>  true,
        ));

    }
    // INDEX JSON CLOSING

    // NEWS UPDATE JSON
    public function jsonNews()
    {
        $newsFile = News::all()->sortBy('created_at');
        json_encode($newsFile);
        return response()->json(['newsFile' => $newsFile]);
    }

    public function newsIndex()
    {
        $data = News::all()->sortBy('created_at')->paginate(3);
        return view('pagination', compact('data'));
    }

    public function newsTest(Request $request)
    {

        if($request->ajax())
        {
            $data = News::all()->sortBy('created_at')->paginate(3);
            return view('news-index2', compact('data')->render());
        }
    }

    public function galleryIndex()
    {
        $galleryFile = Gallery::get()->groupBy('linked_folder');
        return view('news_updates', compact('galleryFile'));
    }

    public function jsonGallery()
    {
        $galleryFileJson = Gallery::all()->groupBy('linked_folder');
        json_encode($galleryFileJson);
        return response()->json(['newsFile' => $galleryFileJson]);
    }
    // NEWS UPDATE JSON
}
