<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = \App\Models\Bookmark::all();
        return view('home')->with('bookmarks', $bookmarks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bookmark_url_name' => 'required',
            'bookmark_url' => 'required',
        ]);

        $bookmark = new \App\Models\Bookmark;
        $bookmark->url_name = $request->input('bookmark_url_name');
        $bookmark->url = $request->input('bookmark_url');
        $bookmark->user_id = auth()->user()->id;
        $bookmark->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookmark = \App\Models\Bookmark::find($id);
        return view('bookmarks.edit')->with('bookmark', $bookmark);
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
        $this->validate($request, [
            'bookmark_url_name' => 'required',
            'bookmark_url' => 'required',
        ]);

        $bookmark = \App\Models\Bookmark::find($id);
        $bookmark->url_name = $request->input('bookmark_url_name');
        $bookmark->url = $request->input('bookmark_url');
        $bookmark->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookmark = \App\Models\Bookmark::find($id);
        $bookmark->delete();
        return redirect('home');

    }
}
