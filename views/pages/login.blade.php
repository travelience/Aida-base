<?php

    if( $req->onSubmit() )
    {
        $r = dispatch('LOGIN', $req->all());

        if( !$r->hasErrors() )
        {
            $res->auth->authenticate( $r->getSessionToken );
            $res->redirect('home');
        }

        $req->setErrors( $r->errors() );

        if( $r->hasError('default') )
        {
            $res->alert( $r->getError('default'), 'danger' );
        }

    }

?>
@extends('layouts.default')

@section('content')

    <h1>Login</h1>
    <hr />

    <div class="col-md-5">
        <form method="post" class="validate">

            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control {{ $req->isValid('email') }}" value="{{ $req->old('email') }}" required placeholder="Enter email">
                @if( $error = $req->getError('email') ) <div class="invalid-feedback"> {{ $error }} </div> @endif
            </div>

            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control {{ $req->isValid('password') }}" value="{{ $req->old('password') }}" required placeholder="Enter password">
                @if( $error = $req->getError('password') ) <div class="invalid-feedback"> {{ $error }} </div> @endif
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

@endsection