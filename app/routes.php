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

$app->post('/api/auth',  'AuthController:signIn');

$app->post('/api/logout', 'AuthController:logout');

// request

$app->get('/api/user/{id}', 'AuthController:getUsers');

$app->post('/api/user/create', 'AuthController:create');

$app->put('/api/user/update/{id}', 'AuthController:update');

$app->delete('/api/user/delete/{id}', 'AuthController:delete');


/*
* -----------------------
* -----------------------
* ---Admin CMS Routes ---
* -----------------------
* -----------------------
*/


/*
* -----------------------
* -----------------------
* ---Shoping Querys -----
* -----------------------
* -----------------------
*/


