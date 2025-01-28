<?php
$router->map('GET', '/users', 'UserController@index');
$router->map('POST', '/users', 'UserController@store');
$router->map('GET', '/users/[i:id]', 'UserController@show');
$router->map('PUT', '/users/[i:id]', 'UserController@update');
$router->map('DELETE', '/users/[i:id]', 'UserController@destroy');
