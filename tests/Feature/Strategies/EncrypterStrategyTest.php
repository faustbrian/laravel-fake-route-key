<?php

declare(strict_types=1);

namespace Tests\Feature\Strategies;

use BaseCodeOy\FakeRouteKey\Strategies\EncrypterStrategy;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Tests\Fixtures\User;

it('should resolve a route model binding', function (): void {
    App::get('config')->set('fake-route-key.strategy', EncrypterStrategy::class);

    Route::model('user', User::class);
    Route::get('/users/{user}', fn (User $user): User => $user)
        ->middleware(SubstituteBindings::class)
        ->name('user');

    $model = User::create(['name' => 'EncrypterStrategy']);

    $this
        ->getJson(route('user', $model, false))
        ->assertOk()
        ->assertJson($model->toArray());
});
