<?php

declare(strict_types=1);

namespace PreemStudio\FakeRouteKey\Strategies;

use Carbon\Exceptions\InvalidTypeException;
use Illuminate\Contracts\Config\Repository;
use Jenssegers\Optimus\Optimus;
use PreemStudio\FakeRouteKey\Contracts\Strategy;

final class OptimusStrategy implements Strategy
{
    private readonly Optimus $optimus;

    public function __construct(Repository $config)
    {
        $this->optimus = new Optimus(
            $this->getConfig($config, 'prime'),
            $this->getConfig($config, 'inverse'),
            $this->getConfig($config, 'xor'),
        );
    }

    public function encode(mixed $key): string
    {
        return (string) $this->optimus->encode($key);
    }

    public function decode(mixed $value): string
    {
        return (string) $this->optimus->decode((int) $value);
    }

    private function getConfig(Repository $config, string $key): int
    {
        $value = $config->get("fake-route-key.configuration.{$key}");

        if (\is_int($value)) {
            return $value;
        }

        throw new InvalidTypeException("{$key} must be an integer.");
    }
}
