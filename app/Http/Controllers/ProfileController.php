<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', 'LIKE', "%{$cond_name}%")->get();
        } else {
          // それ以外はすべてのプロフィールを取得する
          $posts = Profile::all();
        }
        return view('profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
}
