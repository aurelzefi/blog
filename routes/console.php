<?php

use App\Jobs\FetchExternalPosts;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('external-posts:fetch', function () {
    dispatch(new FetchExternalPosts());

    $this->info('External posts have been fetched successfully.');
})->purpose('Fetch external posts');
