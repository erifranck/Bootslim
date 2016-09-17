<?php

namespace App\Controllers;

class Controller
{
  protected $view;
  protected $app;
  public function __construct($container)
  {
    $this->view = $container->view;
    $this->app = $container;
  }
}
