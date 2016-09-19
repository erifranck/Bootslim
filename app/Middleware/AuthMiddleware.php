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
    "environment" => "HTTP_X_TOKEN",
    "attribute" => "jwt",
    "header" => "X-Token",
    "passthrough" => ["./api/auth"],
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
    "path" => "./api/auth",
    "authenticator" => function ($arguments) {
        $user = User::where('username', $arguments['user'])->first();
        $pass = md5($user->password);
        return  $pass === $arguments['password'];
    },
    "error" => function ($request, $response, $arguments) {
        $data = [];
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response->write(json_encode($data, JSON_UNESCAPED_SLASHES));
    }
]));
