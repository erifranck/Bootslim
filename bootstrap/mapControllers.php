<?php

$container['AuthController'] = function($container) {

  return new \App\Controllers\AuthController($container);

};

$container['LocalsController'] = function($container) {

  return new \App\Controllers\LocalsController($container);

};
