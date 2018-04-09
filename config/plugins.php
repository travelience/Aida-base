<?php

// GraphQL
$headers = [];

if( $app->auth->check() )
{
    $headers['Authorization'] = $app->auth->user()->token;
}

$app->withGraphQL('http://music-api.travelience.com/graphql', $headers);

// Api
$app->withApi('https://triplelights.com/api/');

// Facebook
$app->withFacebook();