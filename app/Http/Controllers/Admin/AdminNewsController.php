<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')->select('*');
        $news = $news->get();
        $pageName = 'Tên Trang - News';
        return view('/admin/news', compact('news', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/news_create');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->email = $request->email;
        $news->description = $request->description;

        $news->save();
        return redirect()->action('Admin\AdminNewsController@index');
    }



    // public function store(Request $request)
    // {
    //     $title = $request->title;
    //     $email = $request->email;
    //     $description = $request->description;

    //     $data = array(
    //         "title" => $title,
    //         "email" => $email,
    //         "description" => $description
    //     );


    //     DB::table('news')->insert($data);

    //     return view('/admin/news/create');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($news->description);
        return view('/admin/news_detail', compact('news', 'des'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $pageName = 'News - Update';
        return view('/admin/news_update', compact('news', 'pageName'));
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
        $news = News::find($id);
        $news->title = $request->title;
        $news->email = $request->email;
        $news->description = $request->description;

        $news->save();
        return redirect()->action('Admin\AdminNewsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        $news->delete();
        return redirect()->action('Admin\AdminNewsController@index')->with('success','Dữ liệu xóa thành công.');
    }
}
