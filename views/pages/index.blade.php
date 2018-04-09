<?php

   use Carbon\Carbon;

    $songs = cache('songs', function($req, $res){
        return dispatch('GET_SONGS', ['limit' => 15])->songs;
    });

    // $coupons = $res->db->table('coupons')->orderBY('id','DESC')->get();

    // $res->db->table('coupons')->insert([
    //   'name' => 'TEST',
    //   'value' => 10,
    //   'organization_id' => 0,
    //   'bookings' => 0,
    //   'limit' => 0,
    //   'created_at' => date('Y-m-d H:i:s'),
    //   'updated_at' => date('Y-m-d H:i:s')
    // ]);

?>
@extends('layouts.default')

@section('content')

<h1>{{ __('home') }} {{ Carbon::now()->toDayDateTimeString() }} </h1>
<hr />

@if( $songs )
  <ul>
    @foreach( $songs->nodes as $item )
      <li> {{ $item->title }} </li>
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