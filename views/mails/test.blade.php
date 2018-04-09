@extends('layouts.mail')

@section('content')

    <b>TEST content</b>
    <hr />
    {!! array_to_table( $item ) !!}

@endsection