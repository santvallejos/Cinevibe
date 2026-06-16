<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\TemporaryReservation;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Elimina reservas temporales de butacas expiradas cada minuto
Schedule::call(function () {
    TemporaryReservation::expired()->delete();
})->everyMinute()->name('clean-expired-seat-reservations')->withoutOverlapping();
