<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller {
    
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        foreach($posts as $post) {
            $post->body = $this->shortenText($post->body);
        }
        return view('admin.index', ['posts' => $posts]);     
    }
    
    public function getCreate() {
        return view('admin.create');
    }
    
    public function postCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:50|unique:posts',
            'author' => 'required|max:20',
            'body' => 'required'
        ]);
        
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->author = $request['author'];
        $post->save();
        
        return redirect()->route('admin.index')->with(['success' => 'Post Created Successfully!']);
    }
    
    public function shortenText($text, $len = 20) {
        if(strlen($text) > $len) {
            $text = substr($text, 0, $len) . "...";
        }
        return $text;
    }
}
