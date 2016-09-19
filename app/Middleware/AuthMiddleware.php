<?php
/*
 *--------------------------------------------------------
 *--------------------------------------------------------
 *------Api JWT Token Authentication Middleware-----------
 *--------------------------------------------------------
 *--------------------------------------------------------
 */

use App\Models\User;


$app->add(new \Slim\Middleware\JwtAuthentication([
    "path" => [ "./api/"],
    "attribute" => "jwt",
    "header" => "X-Token",
    "secure" => false,
    "relaxed" => ["http://localhost:8080"],
    "passthrough" => ["./api/auth", "./api/user/register"],
    "secret" => "supersecretkeyyoushouldnotcommittogithub",
    "callback" => function ($request, $response, $arguments) use ($container) {
        $container["jwt"] = $arguments["decoded"];
    },
    "error" => function ($request, $response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));

$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => "/api/auth",
    "secure" => false,
    "relaxed" => ["http://localhost:8080"],
    "authenticator" => function ($arguments) {
        $user = User::where('username', $arguments['email'])->first();
        $pass = ($arguments['password']);
        return  $pass == $user['password'];
    },
    "error" => function ($request, $response, $arguments) {
        $data = [];
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response->write(json_encode($data, JSON_UNESCAPED_SLASHES));
    }
]));
