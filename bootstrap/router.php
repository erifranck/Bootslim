<?php
use JsonApiHelper\Renderer;
$app = new \Slim\App([
  'settings' => [

     'displayErrorDetails' => true,

     'db' => [
       'driver' => 'mysql',

       'host' => DB_HOST,

       'database' => DB_NAME,

       'username' => DB_USER,

       'password' => DB_PASSWORD,

       'charset' => DB_PORT,

       'collation' => 'utf8_unicode_ci',

       'prefix' => '',

     ]
   ],
]);

$jsonApiHelper = new JsonApiHelper\JsonApiHelper($app->getContainer());
$jsonApiHelper->registerResponseResult();
$jsonApiHelper->registerErrorHandlers();

$app->add(new \Slim\Middleware\JwtAuthentication([
    "attribute" => "jwt",
    "path" => "/api", /* or ["/api", "/admin"] */
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

$container = $app -> getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();


$container['db'] = function ($container) use ($capsule) {

    return $capsule;

};

$container['view'] = function ($container) {

  $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [

    'cache' => false,

  ]);

  $view -> addExtension(new \Slim\Views\TwigExtension(

    $container -> router,

    $container -> request -> getUri()

  ));
  $view->addExtension(new Twig_Extension_Debug());

  return $view;
};

$container['AuthController'] = function($container) {

  return new \App\Controllers\AuthController($container);

};
