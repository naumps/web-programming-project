<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'laravel/cashier' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Cashier\\CashierServiceProvider',
    ),
  ),
  'laravel/scout' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Scout\\ScoutServiceProvider',
    ),
  ),
  'laravel/socialite' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ),
    'aliases' => 
    array (
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'pragmarx/google2fa-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'PragmaRX\\Google2FALaravel\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Google2FA' => 'PragmaRX\\Google2FALaravel\\Facade',
    ),
  ),
  'srmklive/authy' => 
  array (
    'providers' => 
    array (
      0 => 'Srmklive\\Authy\\Providers\\AuthyServiceProvider',
    ),
    'aliases' => 
    array (
      'Authy' => 'Srmklive\\Authy\\Facades\\Authy',
    ),
  ),
);