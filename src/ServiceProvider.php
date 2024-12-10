<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\FakeRouteKey;

use BaseCodeOy\Crate\Package\AbstractServiceProvider;
use BaseCodeOy\FakeRouteKey\Contracts\Strategy;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

final class ServiceProvider extends AbstractServiceProvider
{
    #[\Override()]
    public function packageRegistered(): void
    {
        $this->app->singleton(Strategy::class, function (Application $application): Strategy {
            /** @var Repository */
            $config = $application->get(Repository::class);

            return $application->make($config->get('fake-route-key.strategy'));
        });
    }
}
