<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Psr\\Http\\Server\\' => array($vendorDir . '/psr/http-server-handler/src', $vendorDir . '/psr/http-server-middleware/src'),
    'Psr\\Http\\Message\\' => array($vendorDir . '/psr/http-factory/src', $vendorDir . '/psr/http-message/src'),
    'Nyholm\\Psr7\\' => array($vendorDir . '/nyholm/psr7/src'),
    'Nyholm\\Psr7Server\\' => array($vendorDir . '/nyholm/psr7-server/src'),
    'Library_ETE\\' => array($baseDir . '/src'),
    'Http\\Message\\' => array($vendorDir . '/php-http/message-factory/src'),
);
