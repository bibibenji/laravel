<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


use Illuminate\Support\Facades\Input;
use App\Img;
use App\Post;
use Illuminate\Http\Request;
use Log;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public function index(){
        $posts = Post::get();
        return view('pages/index', ['posts' => $posts]);
    }
    
    public function add(Request $request){
        if ($request->input('id'))
        {
            $post = Post::findOrFail($request->input('id'));
            $post->update($request->all());
        }
        else
            $post_id = Post::create($request->all());

        $posts = Post::get();
        return view('pages/index', ['posts' => $posts]);
    }
    
    public function delete($id){
        Post::destroy(['id', $id]);
        
        $posts = Post::get();
        return redirect()->route('index');
    }
}
