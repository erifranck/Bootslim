<?php

/*
* -----------------------
* -----------------------
* -----Login Routes------
* -----------------------
* -----------------------
*/

//login view
$app->get('/login', 'AuthController:index');
$app->get('/signUp', 'AuthController:getCreate');

//login ajax

$app->get('/api/auth',  'AuthController:signIn');

$app->post('/api/logout', 'AuthController:logout');

// request

$app->post('/api/user/register', 'AuthController:create');

$app->put('/api/user/update/{id}', 'AuthController:update');

/*
* -----------------------
* -----------------------
* ---Admin CMS Routes ---
* -----------------------
* -----------------------
*/

$app->post('/api/locals/create', 'LocalsController:create');
$app->patch('/api/locals/update', 'LocalsController:update');


/*
* -----------------------
* -----------------------
* ---Shoping Querys -----
* -----------------------
* -----------------------
*/

$app->get('/api/locals', 'LocalsController:getLocals');
$app->get('/', 'LocalsController:index');
