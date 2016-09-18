<?php

namespace App\Middleware;

/**
 * Class Middleware
 * @author yourname
 */
class Middleware
{
  protected $container;

  public function __construct($container)
  {
    return $this->container = $container;
  }
}
