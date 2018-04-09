<?php


$app->get('/with-post', ['name' => 'with-post'], function($req, $res) use ($app){
    dd('GET');
});

$app->post('/with-post', [], function($req, $app){
    dd('POST');
});

$app->get('/logout', ['name' => 'logout'], function($req, $res){
    $res->auth->logout();
    $res->redirect('home');
});

$app->get('/private', ['name' => 'private', 'middlewares' => ['auth']]);