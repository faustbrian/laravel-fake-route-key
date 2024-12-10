<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\FakeRouteKey\Strategies;

use BaseCodeOy\FakeRouteKey\Contracts\Strategy;
use Illuminate\Contracts\Encryption\Encrypter;

final readonly class EncrypterStrategy implements Strategy
{
    public function __construct(
        private Encrypter $encrypter,
    ) {
        //
    }

    #[\Override()]
    public function encode(mixed $key): string
    {
        return $this->encrypter->encrypt($key);
    }

    #[\Override()]
    public function decode(mixed $value): string
    {
        return (string) $this->encrypter->decrypt($value);
    }
}
