<?php
/**
 * Cinemur warner-vod
 * Copyright (c) 2014 Cinémur S.A. All rights reserved.
 */

namespace li3_themes\template;


class View extends \lithium\template\View {

    public function render($process, array $data = array(), array $options = array())
    {
        $defaults = array(
            'theme' => 'default',
        );
        $options += $defaults;

        return parent::render($process, $data, $options);
    }

} 