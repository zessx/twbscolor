<?php

define('BASE', '/twbscolor/');

$versions   = array_slice(scandir(__DIR__ .'/templates'), 2);
usort($versions, 'version_compare');
$curVersion = '4.0.0';
