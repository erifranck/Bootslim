<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;
use JsonApiHelper\Renderer;

class AuthController extends Controller
{
    public function index($request, $response)
    {

      return $this->view->render($response, 'Auth/login.twig');

    }

    public function create($request, $response)
    {
      User::Create([

        'username' => $resquest->getParams('username'),
        'password' => $request->getParams('password'),
        'fullname' => $resquest->getParams('fullname'),
        'email' => $request->getParams('email'),
        'phone' => $request->getParams('phone'),
        'address' => $request->getParams('address'),

      ]);

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
    public function delete($request, $response)
    {
      User::where('id','variable' )([

        'name' => 'variable',
        'password' => 'variable',
        'email' => 'variable',
        'phone' => 'variable',
        'address' => 'variable',

      ]);

    }
}
