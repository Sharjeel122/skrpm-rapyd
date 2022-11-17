<?php
use skrpm\rapyd\Controller\SkRapydController;

Route::get('/rpm/rapyd', function(){
    return RPM::getCreds();
});


Route::prefix('RPM')->group(function () {
    Route::get('/rapyd-response', [SkRapydController::class, 'skRapydResponse']);
});
