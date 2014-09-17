<?php

use lithium\core\Libraries;

$path = Libraries::get(true, 'path') . '/themes/default';
if (!is_dir($path)) {
    mkdir($path);
    rename(Libraries::get(true, 'path') . '/views', $path . '/views');
}

require __DIR__ . '/bootstrap/media.php';