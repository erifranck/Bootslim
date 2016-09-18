<?php
namespace App\Controllers;

use App\Models\Locals;
use Slim\Views\Twig as View;
use JsonApiHelper\Renderer;

class LocalsController extends Controller
{
    public function index($request, $response)
    {
      $user = User::find(1) ->get();
      $this->app->result->data = $user;

      $this->app->result->render($response, 200);

    }

}
