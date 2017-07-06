<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CsvView' => $baseDir . '/vendor/friendsofcake/cakephp-csvview/',
        'DataTables' => $baseDir . '/vendor/ypnos-web/cakephp-datatables/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];