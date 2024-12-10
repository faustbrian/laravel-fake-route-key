<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Concerns;

use BaseCodeOy\FakeRouteKey\Strategies\EncrypterStrategy;
use BaseCodeOy\FakeRouteKey\Strategies\OptimusStrategy;
use Illuminate\Support\Facades\App;
use Tests\Fixtures\User;

it('should encode a key using the [OptimusStrategy]', function (): void {
    App::get('config')->set('fake-route-key.strategy', OptimusStrategy::class);
    App::get('config')->set('fake-route-key.configuration.prime', 1_580_030_173);
    App::get('config')->set('fake-route-key.configuration.inverse', 59_260_789);
    App::get('config')->set('fake-route-key.configuration.xor', 1_163_945_558);

    $model = new User(['id' => 1]);

    expect($model->getRouteKey())->toBe('458047115');
});

it('should encode a key using the [EncrypterStrategy]', function (): void {
    App::get('config')->set('fake-route-key.strategy', EncrypterStrategy::class);

    $model = new User(['id' => 1]);

    expect($model->getRouteKey())->toStartWith('eyJ');
});
