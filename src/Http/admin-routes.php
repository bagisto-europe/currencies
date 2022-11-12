<?php

Route::group([
        'prefix'        => config('app.admin_url') . '/currency',
        'middleware'    => ['web', 'admin']
    ], function () {
        Route::get('/import', 'Bagisto\Currencies\Http\Controllers\Admin\CurrenciesController@index')->defaults('_config', [
            'view' => 'currencies::admin.index',
        ])->name('admin.currencies.import');

        Route::post('/import/save', 'Bagisto\Currencies\Http\Controllers\Admin\CurrenciesController@store')->defaults('_config', [
            'view' => 'currencies::admin.index',
        ])->name('admin.currencies.import.save');
});