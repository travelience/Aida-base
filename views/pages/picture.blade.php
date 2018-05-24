<?php
        
    if( $req->onSubmit() )
    {

        $posts = $res->graphql->response('UploadUserPhoto', $variables=['photo' => $req->file('name')]);

        // $posts = $res->graphql->response('GetUsers');

        dd( $posts );


    }

?>
@extends('layouts.default')

@section('content')

    <h1>Picture</h1>
    <hr />

    <div class="w-50">
        <form method="post" class="validate" enctype="multipart/form-data">

            <div class="form-group">
                <label>Picture</label>
                <input name="name" type="file" name="picture">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection