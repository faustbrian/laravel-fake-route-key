<?php

declare(strict_types=1);

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
    'strategy' => PreemStudio\FakeRouteKey\Strategies\OptimusStrategy::class,
];
