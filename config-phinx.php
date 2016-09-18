<?php
require 'config.php';
return [
  'paths' => [
    'migrations' => 'migrations'
  ],
  'migration_base_class' => '\App\Migrations\Migration',
  'environments' => [
    'default_database' => 'dev',
    'dev' => [
      'adapter' => 'mysql',
      'host' => DB_HOST,
      'name' => DB_NAME,
      'user' => DB_USER,
      'pass' => DB_PASSWORD,
      'port' => DB_PORT
    ]
  ]
];
