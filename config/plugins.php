<?php

// GraphQL
$headers = [];

if( $app->auth->check() )
{
    $headers['Authorization'] = $app->auth->user()->token;
}

$graphql = graphql('http://music-api.travelience.com/graphql', $headers);
$app->set('graphql', $graphql);

// Api
$api = api('https://triplelights.com/api/');
$app->set('api', $api);

// Facebook
$app->set('facebook', facebook());