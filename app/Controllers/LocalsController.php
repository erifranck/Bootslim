<?php
namespace App\Controllers;

use App\Models\Locals;
use Slim\Views\Twig as View;
use JsonApiHelper\Renderer;

class LocalsController extends Controller
{
    public function index($request, $response)
    {
      $user = Locals::get();
      $this->app->result->data = $user;

      $this->view->render($response, 'home.twig');

    }

    public function getLocals($request, $response)
    {
      $user = Locals::get();
      $this->app->result->data = $user;

      $this->app->result->render($response, 200);

    }

    public function create($request, $response)
    {
      $uid = $this->app->uid->slug();
      Locals::Create([

        'name' => $request->getParam('name'),
        'address' => $request->getParam('address'),
        'phone' => $request->getParam('phone'),
        'status' => $request->getParam('status'),
        'slug' => $uid,

      ]);

    }
}
