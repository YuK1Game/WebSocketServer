#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->singleton(
    YuK1\LaravelBrefWebsockets\Core\KernelInterface::class,
    YuK1\LaravelBrefWebsockets\Core\Kernel::class
);

$kernel = $app->make(YuK1\LaravelBrefWebsockets\Core\KernelInterface::class);
// return $kernel->handle();