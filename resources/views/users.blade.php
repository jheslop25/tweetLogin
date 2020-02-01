@extends('layouts.app')
@php
    function checkFollowing($userToCheck, $follows){
        foreach($follows as $follow){
            if($follow->followed == $userToCheck){
                return true;
            }
        }
        return false;
    }
    function isUser($userToCheck, $authUser){
        if($userToCheck == $authUser){
            return true;
        }
        return false;
    }
@endphp
@section('content')
{{-- @php
    var_dump($users);
@endphp --}}
@guest
<p>please login</p>
@else
this is a list of tweeter users:
@foreach ($users as $user)
<h3>{{$user->name}}</h3>
<form action="/user/tweets" method="post">
    @csrf
<button type="submit" name="userTweets" value="{{$user->name}}">See Tweets by {{$user->name}}</button>
</form>
@if(checkFollowing($user->name, $follows))
<p>you are already following this tweeter</p>
@elseif(isUser($user->name, Auth::user()->name))
<p>you can't follow yourself. sorry. circles</p>
@else
<form action="/follow" method="post">
    @csrf
<button type="submit" name="follow" value="{{$user->name}}">Follow {{$user->name}}</button>
</form>
@endif
@endforeach

@endguest

@endsection
