<?php

    $res->seo->set('title', 'Contact2 Page');
        
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

    <h1 class="border-b border-grey-ligther pb-2 mb-4">{{ __('contact') }} </h1>


    <div class="w-full lg:w-1/2">
        <form method="post" class="validate">

            <div class="mb-4">
                <label class="mb-2 block">Name</label>
                <input name="name" type="text" class="w-full border rounded py-2 px-3 text-grey-darker appearance-none {{ $req->hasError('name', 'error') }}" value="{{ $req->old('name') }}" required placeholder="Enter name">
                @if( $error = $req->getError('name') ) <label class="error"> {{ $error }} </label> @endif
            </div>

            <div class="mb-4">
                <label class="mb-2 block">Email address</label>
                <input name="email" type="email" class="w-full border rounded py-2 px-3 text-grey-darker appearance-none {{ $req->hasError('email', 'error') }}" value="{{ $req->old('email') }}" required placeholder="Enter email">
                @if( $error = $req->getError('email') ) <label class="error"> {{ $error }} </label> @endif
            </div>

            <div class="mb-4">
                <label class="mb-2 block">Message</label>
                <textarea name="message" class="w-full border rounded py-2 px-2 text-grey-darker appearance-none" placeholder="Enter the message" required rows="5">{{ $req->old('message') }}</textarea>
            </div>

            <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-3 px-6 rounded">Submit</button>
        </form>
    </div>

@endsection