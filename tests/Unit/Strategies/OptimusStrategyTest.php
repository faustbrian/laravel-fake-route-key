<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Strategies;

use BaseCodeOy\FakeRouteKey\Strategies\OptimusStrategy;
use Illuminate\Contracts\Config\Repository;

beforeEach(function (): void {
    $mock = \Mockery::mock(Repository::class);
    $mock->shouldReceive('get')->with('fake-route-key.configuration.prime')->andReturn(1_580_030_173);
    $mock->shouldReceive('get')->with('fake-route-key.configuration.inverse')->andReturn(59_260_789);
    $mock->shouldReceive('get')->with('fake-route-key.configuration.xor')->andReturn(1_163_945_558);

    $this->faker = new OptimusStrategy($mock);
});

it('should encode a key', function (): void {
    expect($this->faker->encode(20))->toBeString();
});

it('should decode a value', function (): void {
    expect($this->faker->decode($this->faker->encode(20)))->toBe('20');
});
