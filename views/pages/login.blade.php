<?php

    if( $req->onSubmit() )
    {
        $r = dispatch('LOGIN', $req->all());

        if( !$r->hasErrors() )
        {
            $res->auth->authenticate( $r->getSessionToken );
            $res->redirect('home');
        }

        if( $r->hasError('default') )
        {
            $res->alert( $r->getError('default'), 'danger' );
        }

    }

?>
@extends('layouts.default')

@section('content')

    <h1 class="border-b border-grey-ligther pb-2 mb-4">{{ __('login') }} </h1>


    <div class="w-full lg:w-1/2">
        <form method="post" class="validate">

            <div class="mb-4">
                <label class="mb-2 block">Email address</label>
                <input name="email" type="email" class="w-full border rounded py-2 px-3 text-grey-darker appearance-none {{ $req->isValid('email') }}" value="{{ $req->old('email') }}" required placeholder="Enter email">
                @if( $error = $req->getError('email') ) <label class="error"> {{ $error }} </label> @endif
            </div>

            <div class="mb-4">
                <label class="mb-2 block">Password</label>
                <input name="password" type="password" class="w-full border rounded py-2 px-3 text-grey-darker appearance-none {{ $req->isValid('password') }}" value="{{ $req->old('password') }}" required placeholder="Enter password">
                @if( $error = $req->getError('password') ) <label class="invalid-feedback"> {{ $error }} </label> @endif
            </div>

            <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-3 px-6 rounded">Login</button>
        </form>
    </div>

@endsection