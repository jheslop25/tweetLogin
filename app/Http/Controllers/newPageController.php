<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class newPageController extends Controller
{

    public function loggedin(){
            return view('home');
    }

    public function show(){
        $tweets = \App\tweet::all();
        //$tweets = \App\tweet::find(2);
        //DB::select('select * from tweets');

        return view('hello', ['allTweets' => $tweets]);
    }

    // public function showID(Request $request){
    //     $tweets = \App\tweet::find($request->id);
    //     return view('hello' )
    // }
}
