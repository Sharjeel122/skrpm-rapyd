<?php
use skrpm\rapyd\Controller\SkRapydController;

Route::prefix('RPM')->group(function () {
    Route::get('/rapyd-response', [SkRapydController::class, 'skRapydResponse']);
});
