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

       'charset' => 'utf8',

       'collation' => 'utf8_unicode_ci',

       'prefix' => '',

     ]
   ],
]);

/*
* -----------------------
* --------CORS-----------
* -----------------------
*/

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$jsonApiHelper = new JsonApiHelper\JsonApiHelper($app->getContainer());
$jsonApiHelper->registerResponseResult();
$jsonApiHelper->registerErrorHandlers();

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

$container['uid'] = function ($container){
    return new EndyJasmi\Cuid;
};

$container['validator'] = function ($container) {

  return new App\Validation\Validatior;

};
