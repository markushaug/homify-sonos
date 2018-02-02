<?php

Route::group(['middleware' => 'web', 'prefix' => 'sonos', 'namespace' => 'Modules\Sonos\Http\Controllers'], function()
{
    Route::get('/', 'SonosController@index');
});
