<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use DB;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all()->where('user_id', Auth::user()->id);
        $posts = DB::table('posts')
                ->join('users', 'users.id', 'posts.user_id')
                ->select('posts.*', 'users.name')
                ->where('posts.user_id', Auth::user()->id)
                ->get();

        return view('post.posts', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        //dd(Auth::user());
        $this->validate($request,
        [
            'post_name' => 'required',
            'desc' => 'required',
        ]);


        $post = new Post();

        $post->post_name = $request->post_name;
        $post->description = $request->desc;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->back()->with('success', 'Your Post has been created');
    }
    public function view($id)
    {
        // $post = Post::all()->where('id', $id)->first();
        $post = Post::findOrFail($id);
        return view('post.view', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }
    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->post_name = $request->post_name;
        $post->description = $request->desc;
        $post->save();

        return redirect()->back()->with('success', 'Your Post has been updated');
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);

        if ($post) {
            $post->delete();
        }
        return redirect()->back()->with('warning', 'Your Post has been deleted');
    }
}
