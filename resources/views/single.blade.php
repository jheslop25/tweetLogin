@extends('layouts.app')

@section('content')
<p>{{$tweet->content}}</p>
<h6>{{$tweet->author}}</h6>
@endsection
