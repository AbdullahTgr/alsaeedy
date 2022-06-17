<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

    
    // Channels
    Route::apiResource('channels', 'ChannelsApiController');

    // Videos
    Route::apiResource('videos', 'VideosApiController');


    
});
