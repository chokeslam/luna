<?php

namespace Lyrasoft\Luna\User;

use Windwalker\DI\Container;
use Windwalker\DI\ServiceProviderInterface;

/**
 * The UserProvider class.
 *
 * @since  2.0.0
 */
class UserProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container->prepareSharedObject(UserService::class);
    }
}
