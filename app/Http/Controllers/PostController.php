<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    
    public function index()
    {
        $post=Post::all();
        return view('posts.index',compact('post'));
    }
    public function postTrashed()
    {
        $post=Post::onlyTrashed()->get();
        return view('posts.trashed',compact('post'));
    }


    public function create()
    {
       return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'photo'=>'required|image'
        ]);
        $photo=$request->photo;
        $newphoto =time().$photo->getClientOriginalName();
        $photo->move('uploade/posts',$newphoto);
        $post=Post::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'content'=>$request->content,
            'photo'=>'uploade/posts/'.$newphoto,
            'slug'=>str_slug($request->title),
        ]);
        return redirect()->back();
    }


    public function show($slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('posts.show',compact('post')); 
    }


    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit',compact('post'));
    }


    public function update(Request $request, $id)
    {
         $post=Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
        ]);
        
        if ($request->has('photo')) {
            $photo=$request->photo;
            $newphoto =time().$photo->getClientOriginalName();
            $photo->move('uploade/posts',$newphoto);
            $post->photo='uploade/posts'.$newphoto;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->photo='uploade/posts/'.$newphoto;
        $post->save();
        return view('posts.index');
    }


    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function hdelelet( $id)
    {
        $post=Post::withTrashed('id',$id)->first();
        $post->foreceDelete();
        return redirect()->back();
    }
    public function restore( $id)
    {
        $post=Post::withTrashed('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
}
