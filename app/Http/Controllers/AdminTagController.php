<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=Tag::all();
      return view('admin.tags.show_all')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.tags.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tags=new Tag;
      $tags->title=$request->title;
      $tags->save();
      Session::flash('message', 'Tag has been added!');
      return redirect()->route('admin.tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tag=Tag::find($id);
      return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $tag=Tag::find($id);
      $tag->title=$request->title;
      $tag->save();
      Session::flash('message', 'Tag has been edited!');
      return redirect()->route('admin.tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post=Tag::where('id',$id)->delete();
      Session::flash('message', 'Tag has been deleted!');
      return back();
    }
}
