@extends('layouts.app')
    @section('content')




    @foreach ($allTweets ?? '' as $tweet)
    <p> {{$tweet['content']}}</p>
    <p><strong> {{$tweet['author']}}</strong></p>
    {{-- @php
        var_dump($tweet['id']);
    @endphp --}}

    @auth

    <form action="/delete" method="post">
        @csrf
    <button type="submit" name="deleteId" value="{{$tweet['id']}}">delete post</button>
    </form>
    <form action="/view" method="post">
        @csrf
    <button type="submit" name="viewId" value="{{$tweet['id']}}">View post</button>
    </form>
    <form action="/update" method="post">
        @csrf
    <button type="submit" name="editId" value="{{$tweet['id']}}">Edit post</button>
    </form>
    @endauth
    @endforeach
    @auth
    @include('tweetForm')
    @endauth
    @endsection
