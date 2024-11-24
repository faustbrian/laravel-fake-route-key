<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\FakeRouteKey;

use BaseCodeOy\FakeRouteKey\Contracts\Strategy;
use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton(Strategy::class, function (Application $app): Strategy {
            /** @var Repository */
            $config = $app->get(Repository::class);

            return $app->make($config->get('fake-route-key.strategy'));
        });
    }
}
