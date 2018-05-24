<?php

$app->router->middleware('auth', function($req, $res){
        
    if( is_route('private') && !$res->auth->check() )
    {
        $res->alert('No access', 'danger');
        $res->redirect('home');
    }

});

// $app->use( function($req, $res){
//     dd('hola');
// });

$app->on('error', function($req, $res){
    echo "HAS ERROR";
});