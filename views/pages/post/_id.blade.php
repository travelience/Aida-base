<?php
    $songs = $graphql->response('GetSongs', ['limit' => 5]);
?>
@extends('layouts.default')

@section('content')

<h1>POST: {{ $req->params['id'] }}</h1>
<hr />
  @if( $songs )
  <ul>
    @foreach( $songs->songs->nodes as $item )
      <li> {{ $item->title }} </li>
    @endforeach
  </ul>
  @endif

@endsection