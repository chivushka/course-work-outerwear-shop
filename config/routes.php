<?php

use ishop\Router;

Router::add('^product/(?P<alias>[a-z0-9-]+)/?$',['controller'=> 'Product', 'action' => 'view']);
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$',['controller'=> 'Category', 'action' => 'view']);

//default routes
Router::add('^admin$',['controller'=> 'Main', 'action' => 'index',
    'prefix' =>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',
    ['prefix' =>'admin']);

#правило для главной страницы, перенаправляет в файл index
Router::add('^$',['controller'=> 'Main', 'action' => 'index']);
#правило для других страниц, перенаправляет в нужный контроллер и действие
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
