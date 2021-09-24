<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\IndexSlider;
use App\News;
use App\Gallery;
use Carbon\Carbon;

class CmsController extends Controller
{

    // Index
    public function uploadIndexSlider(Request $req)
    {
        $doc = $req->file('sliderInput');

        $destinationPath = public_path('/upload/index/');
        
        $docTmpPath = $_FILES['sliderInput']['tmp_name'];     //provide name stored on the temporary web server
        $docName = $_FILES['sliderInput']['name'];            //provide name before it was submitted
        $docNameCmps = explode(".", $docName);
        $docExtension = strtolower(end($docNameCmps));      // dpt extension dia e.g. -> .jpg for filtering kot??
        $newDocName = time() .'_'. $docName;

        $dest_path = $destinationPath  . $newDocName;

        $curCount = IndexSlider::get()->count();

        move_uploaded_file($docTmpPath, $dest_path); 

        $file = IndexSlider::insertGetId([ 
            'file_name'              =>  $docName,
            'file_path'              =>  $newDocName,
            'file_extension'         =>  $docExtension,
            'position'               =>  $curCount,
            'created_at'             =>  Carbon::now(),
       ]);

        return redirect('/cms/index');
    }

    public function uploadIndexVideo(Request $req)
    {
        $youtubeurl = $req->input('linkInput');
        $curCount = IndexSlider::get()->count();
        
        IndexSlider::insert([
            'youtube_url'   =>  $youtubeurl,
            'position'      =>  $curCount,
            'created_at'    =>  Carbon::now(),
        ]);

        return redirect('/cms/index');
    }
    // Index closing

    // News Update
    public function uploadNews(Request $req)
    {
        $doc = $req->file('newsFormFile');

        $destinationPath = public_path('/upload/news/');
        
        $docTmpPath = $_FILES['newsFormFile']['tmp_name'];       //provide name stored on the temporary web server
        $docName = $_FILES['newsFormFile']['name'];              //provide name before it was submitted
        $docNameCmps = explode(".", $docName);
        $docExtension = strtolower(end($docNameCmps));          // dpt extension dia e.g. -> .jpg for filtering kot??
        $newDocName = time() .'_'. $docName;

        $dest_path = $destinationPath.$newDocName;

        move_uploaded_file($docTmpPath, $dest_path); 

        $file = News::insertGetId([
            'title'             =>  $req->newsFormTitle,
            'description'       =>  $req->newsFormDesc,
            'topic'             =>  $req->newsFormTopic,
            'img_loc'           =>  $newDocName,
            'web_link'          =>  $req->newsFormLink,
            'created_at'        =>  Carbon::now(),
            'updated_at'        =>  Carbon::now(),
       ]);

        return redirect('/cms/news');
    }

    public function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    public function uploadGallery(Request $req)
    {
        $count = Gallery::get()->groupBy('linked_folder')->count();
        $count+=1;
        $destinationPath = public_path('upload/gallery/');

        if($_FILES['galleryFormFile']) {
            $file_ary = $this->reArrayFiles($_FILES['galleryFormFile']);
        }

        foreach ($file_ary as $key => $files) {

            $docName = $files['name'];
            $docTmpPath = $files['tmp_name'];
            $linkFolder = 'folder'.$count;
            $newPath = $destinationPath.'/'.$linkFolder;

            if(!File::isDirectory($newPath)){
                File::makeDirectory($newPath, 0777, true. true);
            }

            $newDocName = time().'_'.$docName;

            $dest_path = $newPath  .'/'. $newDocName;

            $entry = Gallery::insertGetId([
                'file_loc'          =>  $newDocName,
                'title'             =>  $req->galleryFormTitle,
                'description'       =>  $req->galleryFormDesc,
                'linked_folder'     =>  $linkFolder,
                'created_at'        =>  Carbon::now(),
                'updated_at'        =>  Carbon::now(),
           ]);

            move_uploaded_file($docTmpPath, $dest_path);

        }

        return redirect('/cms/gallery');
    }
    // News update closing

}
