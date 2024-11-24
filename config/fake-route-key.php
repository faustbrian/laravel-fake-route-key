<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Route Key Faker Strategy
    |--------------------------------------------------------------------------
    |
    | This option controls the implementation of the route key faker that will
    | be used by the package. This class should implement the `RouteKeyFaker`
    | interface and should be able to encode and decode the route key.
    |
    */
    'strategy' => BaseCodeOy\FakeRouteKey\Strategies\OptimusStrategy::class,
];
