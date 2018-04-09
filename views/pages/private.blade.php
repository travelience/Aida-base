<?php
    $songs = dispatch('GET_MY_SONGS');
?>
@extends('layouts.default')

@section('content')

    <h1>Private</h1>
    <hr />

    @if( $songs )
    <ul>
        @foreach( $songs->Viewer->songs as $item )
        <li> {{ $item->title }} </li>
        @endforeach
    </ul>
    @endif

@endsection