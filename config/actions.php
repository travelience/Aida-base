<?php

function GET_SONGS( $req, $res, $payload )
{
    return $res->graphql->response('GetSongs', $payload);
}

function LOGIN( $req, $res, $payload )
{
    return $res->graphql->response('Login', $payload);
}

function GET_MY_SONGS( $req, $res, $payload )
{
    return $res->graphql->response('MySongs');
}