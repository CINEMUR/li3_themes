<?php

use lithium\core\Libraries;

$path = Libraries::get(true, 'path') . '/webroot/themes/default';
if (!is_dir($path)) {
    mkdir($path);
    rename(Libraries::get(true, 'path') . '/views', $path . '/views');
}

$existing = Libraries::paths('helper');
Libraries::paths(array('helper' => array_merge(array(
    '{:library}\extensions\helper\{:class}\{:name}',
    '{:library}\template\helper\{:class}\{:name}' => array('libraries' => 'li3_themes')
), (array)$existing)));

require __DIR__ . '/bootstrap/media.php';

require __DIR__ . '/bootstrap/errors.php';