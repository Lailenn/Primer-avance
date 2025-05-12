<?php

Route::get('/objetos', function () {
    return \App\Models\Objeto::all();
});
