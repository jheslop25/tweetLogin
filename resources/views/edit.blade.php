@extends('layouts.app')
@section('content')
    <form action='/edit' method='post'>
        @csrf
        <p>tweet id: {{$tweet['id']}}</p>
        <p>tweet author: {{$tweet['author']}}</p>
        <p>tweet content: {{$tweet['content']}}</p>
    <input name="id" value="{{$tweet['id']}}" readonly>
    <input type="text" name="author" value="{{$tweet['author']}}">
    <input type="text" name="content" value="{{$tweet['content']}}">
    <input type="submit" name="submit" value="edit tweet">
    </form>
@endsection
