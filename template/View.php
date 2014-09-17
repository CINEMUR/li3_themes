<?php
/**
 * Cinemur warner-vod
 * Copyright (c) 2014 Cinémur S.A. All rights reserved.
 */

namespace li3_themes\template;


class View extends \lithium\template\View {

    protected $_steps = array(
        'theme' => array('path' => 'theme'),
        'template' => array('path' => 'template', 'capture' => array('context' => 'content')),
        'layout' => array(
            'path' => 'layout', 'conditions' => 'layout', 'multi' => true, 'capture' => array(
                'context' => 'content'
            )
        ),
        'element' => array('path' => 'element')
    );

    public function render($process, array $data = array(), array $options = array())
    {
        $defaults = array(
            'type' => 'html',
            'theme' => 'default',
            'layout' => null,
            'template' => null,
            'context' => array(),
            'paths' => array(),
            'data' => array()
        );
        $options += $defaults;

        $data += $options['data'];
        $paths = $options['paths'];
        unset($options['data'], $options['paths']);
        $params = array_filter($options, function ($val) {
            return $val && is_string($val);
        });
        $result = null;

        foreach ($this->_process($process, $params) as $name => $step) {
            if (isset($paths[$name]) && $paths[$name] === false) {
                continue;
            }
            if (!$this->_conditions($step, $params, $data, $options)) {
                continue;
            }
            if ($step['multi'] && isset($options[$name])) {
                foreach ((array)$options[$name] as $value) {
                    $params[$name] = $value;
                    $result = $this->_step($step, $params, $data, $options);
                }
                continue;
            }
            $result = $this->_step((array)$step, $params, $data, $options);
        }
        return $result;
    }

} 