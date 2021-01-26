<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
{
    return view('admin.profile.create');
}

public function create(Request $request)
{

    $this->validate($request, Profile::$rules);
    $profile = new Profile;
    $form = $request->all();
    
    unset($form['_token']);
    unset($form['image']);
      // データベースに保存
      $profile->fill($form);
      $profile->save(); 


    return redirect('admin/profile/create');
}

public function edit()
{
    return view('admin.profile.index');
}

public function update()
{
    return redirect('admin/profile/index');
}
public function index(Request $request)
{
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
        // 検索されたら検索結果を取得する
        $posts = Profile::where('title', $cond_title)->get();
    } else {
        // それ以外はすべてのニュースを取得する
        $posts = Profile::all();
    }
    return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
}



}
