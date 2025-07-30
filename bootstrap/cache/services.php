<?php return array (
  'providers' => 
  array (
    0 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    1 => 'Laravel\\Breeze\\BreezeServiceProvider',
    2 => 'Laravel\\Pail\\PailServiceProvider',
    3 => 'Laravel\\Sail\\SailServiceProvider',
    4 => 'Laravel\\Tinker\\TinkerServiceProvider',
    5 => 'Carbon\\Laravel\\ServiceProvider',
    6 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    7 => 'Termwind\\Laravel\\TermwindServiceProvider',
    8 => 'App\\Providers\\MidtransServiceProvider',
    9 => 'App\\Providers\\AppServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    1 => 'Laravel\\Pail\\PailServiceProvider',
    2 => 'Carbon\\Laravel\\ServiceProvider',
    3 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    4 => 'Termwind\\Laravel\\TermwindServiceProvider',
    5 => 'App\\Providers\\MidtransServiceProvider',
    6 => 'App\\Providers\\AppServiceProvider',
  ),
  'deferred' => 
  array (
    'Laravel\\Breeze\\Console\\InstallCommand' => 'Laravel\\Breeze\\BreezeServiceProvider',
    'Laravel\\Sail\\Console\\InstallCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'Laravel\\Sail\\Console\\PublishCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'command.tinker' => 'Laravel\\Tinker\\TinkerServiceProvider',
  ),
  'when' => 
  array (
    'Laravel\\Breeze\\BreezeServiceProvider' => 
    array (
    ),
    'Laravel\\Sail\\SailServiceProvider' => 
    array (
    ),
    'Laravel\\Tinker\\TinkerServiceProvider' => 
    array (
    ),
  ),
);