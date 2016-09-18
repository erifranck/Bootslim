<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;
use JsonApiHelper\Renderer;

class AuthController extends Controller
{
    public function index($request, $response)
    {
      $user = User::where('id', 1)->get();
      $this->app->result->data = $user;

      return $this->view->render($response, 'Auth/login.twig');
    }

    public function create($request, $response)
    {
      $result = User::Create([

        'username' => $resquest->getParams('email'),
        'password' => $request->getParams('password'),
        'lastname' => $resquest->getParams('lastname'),
        'firstname' => $resquest->getParams('firstname'),
        'email' => $request->getParams('email'),
        'phone' => $request->getParams('phone'),

      ]);
      $this->app->result->data = $result;
      $this->app->result->render($response, 200);
    }
    public function update($request, $response)
    {
      User::where('id','variable' )([

        'name' => 'variable',
        'password' => 'variable',
        'email' => 'variable',
        'phone' => 'variable',
        'address' => 'variable',

      ]);

    }
    public function logout($request, $response)
    {
      User::where('id','variable' )([

        'name' => 'variable',
        'password' => 'variable',
        'email' => 'variable',
        'phone' => 'variable',
        'address' => 'variable',

      ]);

    }
    public function signIn($request,$response, $args)
    {
      $this->app->result->data = [
        'saludo' => 'bienvenido a mi api'
      ];
      $this->app->result->render($response, 200);
    }
}
