<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
