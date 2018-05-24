<?php

// GraphQL
$headers = [];

if( $app->auth->check() )
{
    $headers['Authorization'] = $app->auth->user()->token;
}

$app->withGraphQL('http://lumen-graphql.test/graphql', $headers);

// Api
$app->withApi('https://triplelights.com/api/');

// Facebook
$app->withFacebook();