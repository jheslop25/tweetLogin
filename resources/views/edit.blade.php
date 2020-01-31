@extends('layouts.app')
@section('content')
@if(Auth::user()->name == $tweet['author'])
    <form action='/edit' method='post'>
        @csrf
        <p>tweet id: {{$tweet['id']}}</p>
        <p>tweet author: {{$tweet['author']}}</p>
        <p>tweet content: {{$tweet['content']}}</p>
    <input name="id" value="{{$tweet['id']}}" readonly>
    <input type="text" name="author" value="{{Auth::user()->name}}" readonly>
    <input type="text" name="content" value="{{$tweet['content']}}">
    <input type="submit" name="submit" value="edit tweet">
    </form>

    @else
    <p>you do not own this tweet!</p>
    <a href="/tweets">tweets home</a>
@endif
@endsection
