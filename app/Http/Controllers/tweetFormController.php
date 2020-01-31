<?php

namespace App\Http\Controllers;

use App\Http\Requests\tweetForm;
use Illuminate\Http\Request;
use Auth;

class tweetFormController extends Controller
{
    public function showForm(){
        return view('tweetForm');
    }

   public function checkWithController(Request $request){
       if($request->validate([
            'author' => 'required | min:3 | max: 50',
            'content' => 'required | min:3 | max: 144'
       ])){
            if(Auth::check()){
                $tweet = new \App\tweet();
                $tweet->author = $request->title; // minor hack here. missnamed form input as title vs. author
                $tweet->content = $request->content;
                $tweet->save();

                $tweets = \App\tweet::all();
                return view('hello', ['allTweets' => $tweets]);
            }
       }
   }


   public function delete(Request $request){
        $id = $request->deleteId;
        $tweet = \App\tweet::find($id);
            if(Auth::user()->name == $tweet->author){
               \App\tweet::destroy($id);

               $tweets = \App\tweet::all();
                return view('hello', ['allTweets' => $tweets]);
                // redirect('/tweets');
            } else {
                return redirect('/tweets');
            }

   }

   public function viewTweet(Request $request){
        $id = $request->viewId;
        if(Auth::check()){
            $tweet = \App\tweet::find($id);

            return view('single', ['tweet' => $tweet]);
        }
   }

   public function update(Request $request){
        $id = $request->editId;
        if(Auth::check()){
            $tweet = \App\tweet::find($id);

            return view('edit', ['tweet' => $tweet]);
        }
   }

   public function editTweet(Request $request){
        $id = $request->id;
        if(Auth::check()){
            $tweet = \App\tweet::find($id);
            $tweet->author = $request->author;
            $tweet->content = $request->content;

            $tweet->save();
            return redirect('/tweets');
        }

   }
}
