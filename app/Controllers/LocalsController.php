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
      $uid = $this->uid->slug();
      Locals::Create([

        'name' => $resquest->getParams('name'),
        'address' => $request->getParams('address'),
        'phone' => $resquest->getParams('phone'),
        'status' => $resquest->getParams('status'),
        'slug' => $uid,

      ]);

    }
}
