<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $title = 'About';
        $time = date("F j, Y, g:i a");
        $filename ='..\app\Http\Controllers\AboutController.php';
        $createTime = date("F j, Y, g:i a",filectime($filename));
        return view('about.index',compact('title','time','createTime'));
    }
}
