<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    //

public function Message(){
    echo'welcome to laravel';
}

public function create(){
    return view('create');

}

public function store(Request $request){


// echo  $request->input('name');
// dd($request->has('name'));
// dd($request->all());

// echo $request->url();
// echo $request->method();

// $errors  =[];

// $title   = $request->$name;
// $content = $request->$content;
// $image   = $request->$image;

$this->validate($request,[
"title"     =>"required|string",
"content"   =>"required|min:50",
"image"     =>"required"

]);








}
}
