<?php

declare(strict_types=1);

namespace Tests\Unit\Strategies;

use BaseCodeOy\FakeRouteKey\Strategies\OptimusStrategy;
use Illuminate\Contracts\Config\Repository;
use Mockery;

beforeEach(function (): void {
    $config = Mockery::mock(Repository::class);
    $config->shouldReceive('get')->with('fake-route-key.configuration.prime')->andReturn(1580030173);
    $config->shouldReceive('get')->with('fake-route-key.configuration.inverse')->andReturn(59260789);
    $config->shouldReceive('get')->with('fake-route-key.configuration.xor')->andReturn(1163945558);

    $this->faker = new OptimusStrategy($config);
});

it('should encode a key', function (): void {
    expect($this->faker->encode(20))->toBeString();
});

it('should decode a value', function (): void {
    expect($this->faker->decode($this->faker->encode(20)))->toBe('20');
});
