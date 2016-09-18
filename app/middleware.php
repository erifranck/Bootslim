<?php
/*
 *--------------------------------------------------------
 *--------------------------------------------------------
 *------Api JWT Token Authentication Middleware-----------
 *--------------------------------------------------------
 *--------------------------------------------------------
 */

/*
$app->add(new \Slim\Middleware\JwtAuthentication([
    "attribute" => "jwt",
    "path" => "/api",
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
*/

