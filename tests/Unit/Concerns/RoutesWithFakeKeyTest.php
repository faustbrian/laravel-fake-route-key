<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BombenProdukt\FakeRouteKey\Strategies\EncrypterStrategy;
use BombenProdukt\FakeRouteKey\Strategies\OptimusStrategy;
use Illuminate\Support\Facades\App;
use Tests\Fixtures\User;

it('should encode a key using the [OptimusStrategy]', function (): void {
    App::get('config')->set('fake-route-key.strategy', OptimusStrategy::class);
    App::get('config')->set('fake-route-key.configuration.prime', 1580030173);
    App::get('config')->set('fake-route-key.configuration.inverse', 59260789);
    App::get('config')->set('fake-route-key.configuration.xor', 1163945558);

    $model = new User(['id' => 1]);

    expect($model->getRouteKey())->toBe('458047115');
});

it('should encode a key using the [EncrypterStrategy]', function (): void {
    App::get('config')->set('fake-route-key.strategy', EncrypterStrategy::class);

    $model = new User(['id' => 1]);

    expect($model->getRouteKey())->toStartWith('eyJ');
});
