<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class AdminController extends Controller {
        
    public function getLoginForm() {
        return view('frontend.login');
    }
    
    public function postLogin(Request $request) {
        $this->validate($request, [
            'username' => "required",
            'password' => 'required'
        ]);
        
        if(!Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect()->back()->with(['fail' => "Login Failed!"]);
        }
        
        return redirect()->route('admin.index');
    }
    
    public function getLogout() {
        Auth::logout();
        return redirect()->route('frontend.index');
    }
    
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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
    
    public function getEditPost($id) {
        $post = Post::find($id);
        if(!$post) {
            return redirect()->route('admin.index')->with(['fail', "Post Not found"]);
        }
        return view('admin.edit', ['post' => $post]);
    }
    
    public function postEditPost(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:50',
            'author' => 'required|max:20',
            'body' => 'required'
        ]);
        $post = Post::find($request['id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->update();
        
        return redirect()->route('admin.index')->with(['success', "Post Updated Successfully!"]);
    }
    
    public function getDeletePost($id) {
        $post = Post::find($id);
        if(!$post) {
            return redirect()->route('admin.delete')->with('fail', "Post not found");
        }
        $post->delete();
        return redirect()->route('admin.index')->with(['success' => 'Post Deleted Successfully!']);
    }
}
