<?php

use lithium\action\Dispatcher;
use lithium\net\http\Media;

Dispatcher::applyFilter('_callable', function ($self, $params, $chain) {

    $next = $chain->next($self, $params, $chain);

    Media::type('default', null, array(
        'theme' => 'default',
        'view' => 'li3_themes\template\View',
        'paths' => array(
            'layout' => '{:library}/webroot/themes/{:theme}/views/layouts/{:layout}.{:type}.php',
            'template' => '{:library}/webroot/themes/{:theme}/views/{:controller}/{:template}.{:type}.php',
            'element' => '{:library}/webroot/themes/{:theme}/views/views/elements/{:template}.{:type}.php'
        ),
        'webroot' => '{:library}/webroot/themes/{:theme}'
    ));

    Media::assets('js', array(
        'paths' => array('{:base}/themes/{:theme}/js/{:path}' => array('base', 'theme', 'path')),
        'theme' => 'default'
    ));

    Media::assets('css', array(
        'paths' => array('{:base}/themes/{:theme}/css/{:path}' => array('base', 'theme', 'path')),
        'theme' => 'default'
    ));


    return $next;
});

