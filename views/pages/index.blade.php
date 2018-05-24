<?php
   use Carbon\Carbon;

    $songs = cache('songs', function($req, $res){
        return dispatch('GET_SONGS', ['limit' => 15])->songs;
    });
?>
@extends('layouts.default')

@section('content')

<h1 class="border-b border-grey-ligther pb-2 mb-4">{{ __('home') }} {{ Carbon::now()->toDayDateTimeString() }} </h1>

@if( $songs )
  <ul>
    @foreach( $songs->nodes as $item )
      <li class="border-b border-grey-lighter py-2"> {{ $item->title }} </li>
    @endforeach
  </ul>
@endif

{{--  
@if( $coupons )
  <ul>
    @foreach( $coupons as $item )
      <li> <b>{{ $item->name }}</b> : {{ $item->value }}% </li>
    @endforeach
  </ul>
@endif  --}}


@endsection