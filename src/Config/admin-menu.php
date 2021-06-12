<?php

return [
    [
        'key'   => 'settings.currencies.list',
        'name'  => 'admin::app.layouts.currencies',
        'route' => 'admin.currencies.index',
        'sort'  => 2
    ], [
        'key'   => 'settings.currencies.import',
        'name'  => 'currencies::app.import',
        'route' => 'admin.currencies.import',
        'sort'  => 3
    ]
];