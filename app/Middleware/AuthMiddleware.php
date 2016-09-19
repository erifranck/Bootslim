<?php
/*
 *--------------------------------------------------------
 *--------------------------------------------------------
 *------Api JWT Token Authentication Middleware-----------
 *--------------------------------------------------------
 *--------------------------------------------------------
 */

$app->add(new \Slim\Middleware\JwtAuthentication([
    "path" => [ "./api/"],
    "environment" => "HTTP_X_TOKEN",
    "attribute" => "jwt",
    "header" => "X-Token",
    "passthrough" => [],
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
    "users" => [
        "root" => "t00r",
        "somebody" => "passw0rd"
    ],
    "callback" => function ($request, $response, $arguments) {
        print_r($arguments);
    }
]));
