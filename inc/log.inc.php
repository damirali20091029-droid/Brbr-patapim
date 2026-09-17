<?php
$dt = time();
$page = $_SERVER['REQUEST_URI'] ?? '';
$ref = $_SERVER['HTTP_REFERER'] ?? '';
$path = "$dt|$page|$ref\r\n";

$logDir = 'log';
if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

file_put_contents($logDir . '/' . PATH_LOG, $path, FILE_APPEND);