<?php

use lithium\action\Dispatcher;

use lithium\net\http\Media;


Dispatcher::applyFilter('_callable', function ($self, $params, $chain) {

    $next = $chain->next($self, $params, $chain);

    Media::type('default', null, array(
        'view' => 'li3_themes\template\View',
        'paths' => array(
            'layout' => '{:library}/themes/{:theme}/views/layouts/{:layout}.{:type}.php',
            'template' => '{:library}/themes/{:theme}/views/{:controller}/{:template}.{:type}.php',
            'element' => '{:library}/themes/{:theme}/views/views/elements/{:template}.{:type}.php'
        ),
        'webroot' => '{:library}/themes/{:theme}'
    ));

    return $next;
});

