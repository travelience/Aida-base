<?php

    $res->seo->set('title', 'Contact Page');
        
    if( $req->onSubmit() )
    {
        
        $req->validate([
            'name' => 'required|min:10',
            'email' => 'required|email'
        ]);

        if( !$req->hasErrors() )
        {
            $item = $req->all();

            $res->mail->subject('Planetyze: Content');
            $res->mail->to( $req->get('email') );
            $res->mail->template('mails.test', compact('item') );
            $sent = $res->mail->send();

        }
    }

?>
@extends('layouts.default')

@section('content')

    <h1>Contact</h1>
    <hr />

    <div class="w-50">
        <form method="post" class="validate">

            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control {{ $req->hasError('name', 'error') }}" value="{{ $req->old('name') }}" required placeholder="Enter name">
                @if( $error = $req->getError('name') ) <div class="invalid-feedback"> {{ $error }} </div> @endif
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control {{ $req->hasError('email', 'error') }}" value="{{ $req->old('email') }}" required placeholder="Enter email">
                @if( $error = $req->getError('email') ) <div class="invalid-feedback"> {{ $error }} </div> @endif
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control" placeholder="Enter the message" required rows="5">{{ $req->old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection