<?php

declare(strict_types=1);

namespace Tests\Feature\Strategies;

use BombenProdukt\FakeRouteKey\Strategies\OptimusStrategy;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Tests\Fixtures\User;

it('should resolve a route model binding', function (): void {
    App::get('config')->set('fake-route-key.strategy', OptimusStrategy::class);
    App::get('config')->set('fake-route-key.configuration.prime', 1580030173);
    App::get('config')->set('fake-route-key.configuration.inverse', 59260789);
    App::get('config')->set('fake-route-key.configuration.xor', 1163945558);

    Route::model('user', User::class);
    Route::get('/users/{user}', fn (User $user): User => $user)
        ->middleware(SubstituteBindings::class)
        ->name('user');

    $model = User::create(['name' => 'OptimusStrategy']);

    $this
        ->getJson(route('user', $model, false))
        ->assertOk()
        ->assertJson($model->toArray());
});
