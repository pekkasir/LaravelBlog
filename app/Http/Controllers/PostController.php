<?php

namespace App\Http\Controllers;
use App\Post;

class PostController extends Controller {
    
    public function getBlogIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        foreach($posts as $post) {
            $post->body = $this->shortenText($post->body, 60);
            //$post->created_at = date('d.m.Y', (int)$post->created_at);
        }
        return view('frontend.index', ['posts' => $posts]);
    }
    
    public function getSinglePost($id) {
        $post = Post::find($id);
        if(!$post) {
            return redirect()->route('frontend.index')->with(['fail' => "Post with id $id not found!"]);
        }
        return view('frontend.single', ['post' => $post]);
    }
    
    public function getContact() {
        return view('frontend.contact');
    }
    
    public function shortenText($text, $len = 20) {
        if(strlen($text) > $len) {
            $text = substr($text, 0, $len) . "...";
        }
        return $text;
    }
}