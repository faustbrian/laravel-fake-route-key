<?php

declare(strict_types=1);

namespace Tests\Unit\Strategies;

use BombenProdukt\FakeRouteKey\Strategies\EncrypterStrategy;
use Illuminate\Encryption\Encrypter;

beforeEach(function (): void {
    $this->faker = (new EncrypterStrategy(new Encrypter('AAAAAAAAAAAAAAAA')));
});

it('should encode a key', function (): void {
    expect($this->faker->encode(20))->toBeString();
});

it('should decode a value', function (): void {
    expect($this->faker->decode($this->faker->encode(20)))->toBe('20');
});
