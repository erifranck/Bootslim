<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;
use JsonApiHelper\Renderer;
use \Firebase\JWT\JWT;
use ICanBoogie\DateTime;

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
      $result = User::create([

        'username' => $request->getParam('email'),
        'password' => md5($request->getParam('password')),
        'lastname' => $request->getParam('lastname'),
        'firstname' => $request->getParam('firstname'),
        'email' => $request->getParam('email'),
        'phone' => $request->getParam('phone'),

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
      $now = new DateTime();
      $future = new DateTime("now +24 hours");
      $server = $request->getServerParams();
      $query = isset($server['PHP_AUTH_USER']) ? $server['PHP_AUTH_USER']: $request->getParam('email');
      $userdata = User::where('username', $query)->first();
      $payload = [
          "iat" => $now->getTimeStamp(),
          "exp" => $future->getTimeStamp(),
          "sub" => $query,
          "data" => $userdata,
      ];
      $secret = "supersecretkeyyoushouldnotcommittogithub";
      $token = JWT::encode($payload, $secret, "HS256");
      $data["status"] = "ok";
      $data["token"] = $token;

      return $response->withStatus(201)
          ->withHeader("Content-Type", "application/json")
          ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
}
