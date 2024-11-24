<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\FakeRouteKey\Contracts;

interface Strategy
{
    public function encode(mixed $key): string;

    public function decode(mixed $value): string;
}
