<?php

namespace SprykerEco\Service\AkeneoPim;

use Spryker\Service\Kernel\AbstractBundleDependencyProvider;
use Spryker\Service\Kernel\Container;

class AkeneoPimDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_SESSION = 'CLIENT_SESSION';

    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return \Spryker\Service\Kernel\Container
     */
    public function provideServiceDependencies(Container $container)
    {
        $container = $this->addSession($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addSession(\Spryker\Zed\Kernel\Container $container)
    {
        $container->set(static::CLIENT_SESSION, function (Container $container) {
            return $container->getLocator()->session()->client();
        });

        return $container;
    }
}
