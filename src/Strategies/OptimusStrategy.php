<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\FakeRouteKey\Strategies;

use BaseCodeOy\FakeRouteKey\Contracts\Strategy;
use Carbon\Exceptions\InvalidTypeException;
use Illuminate\Contracts\Config\Repository;
use Jenssegers\Optimus\Optimus;

final readonly class OptimusStrategy implements Strategy
{
    private Optimus $optimus;

    public function __construct(Repository $configRepository)
    {
        $this->optimus = new Optimus(
            $this->getConfig($configRepository, 'prime'),
            $this->getConfig($configRepository, 'inverse'),
            $this->getConfig($configRepository, 'xor'),
        );
    }

    #[\Override()]
    public function encode(mixed $key): string
    {
        return (string) $this->optimus->encode($key);
    }

    #[\Override()]
    public function decode(mixed $value): string
    {
        return (string) $this->optimus->decode((int) $value);
    }

    private function getConfig(Repository $configRepository, string $key): int
    {
        $value = $configRepository->get('fake-route-key.configuration.'.$key);

        if (\is_int($value)) {
            return $value;
        }

        throw new InvalidTypeException($key.' must be an integer.');
    }
}
