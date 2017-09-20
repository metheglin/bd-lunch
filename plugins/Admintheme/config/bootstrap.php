<?php
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

Configure::write('Theme', [
    'title' => 'Admintheme',
    'logo' => [
        'mini' => '<b>G</b>T',
        'large' => '<b>Admintheme</b>Theme'
    ],
    'login' => [
        'show_remember' => true,
        'show_register' => true,
        'show_social' => true
    ]
]);

Plugin::load('BootstrapUI');
