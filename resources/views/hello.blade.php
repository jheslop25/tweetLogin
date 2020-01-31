@extends('layouts.app')
    @section('content')
    @guest
    Please Sign in or sign up
    @else
    Welcome {{ Auth::user()->name}}
    @foreach ($allTweets ?? '' as $tweet)
    <p> {{$tweet['content']}}</p>
    <p><strong> {{$tweet['author']}}</strong></p>
    @php
        var_dump($tweet['id']);
    @endphp


    <form action="/delete" method="post">
        @csrf
    <button type="submit" name="deleteId" value="{{$tweet['id']}}">delete post</button>
    </form>
    <form action="/view" method="post">
        @csrf
    <button type="submit" name="viewId" value="{{$tweet['id']}}">View post</button>
    </form>
    @endforeach
    @include('tweetForm')
    @endguest
    @endsection
