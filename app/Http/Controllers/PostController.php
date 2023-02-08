<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postingan = Post::orderBy('id','desc')->paginate(5);
        return view('index',
        ['posts' => Post::all()
    ]);
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
            ]);
            $postvar = new Post();
            $postvar->title = $request->title;
            $postvar->content = $request->content;
            $postvar->save();

        return redirect()->route('index')->with('success','Postingan berhasil!');
    }


    public function edit($id)
    {
        return view('edit',
        ['post' => Post::where('id',$id)->first()
    ]);
    }   


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $postvar = Post::where('id', $post->id)->first();
        $postvar->title = $request->title;
        $postvar->content = $request->content;
        $postvar->save();
        return redirect()->route('index')->with('success','Post telah diupdate.');
    }



    public function destroy(Post $post)
    {
        Post::where('id',$post->id)->delete();
        return redirect()->route('index')->with('success','Post telah dihapus');
    }
}
