<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Strategies;

use BaseCodeOy\FakeRouteKey\Strategies\EncrypterStrategy;
use Illuminate\Encryption\Encrypter;

beforeEach(function (): void {
    $this->faker = new EncrypterStrategy(new Encrypter('AAAAAAAAAAAAAAAA'));
});

it('should encode a key', function (): void {
    expect($this->faker->encode(20))->toBeString();
});

it('should decode a value', function (): void {
    expect($this->faker->decode($this->faker->encode(20)))->toBe('20');
});
