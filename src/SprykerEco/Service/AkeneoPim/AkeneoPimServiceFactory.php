<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Service\AkeneoPim;

use Spryker\Service\Kernel\AbstractServiceFactory;
use Spryker\Zed\User\UserDependencyProvider;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\AdapterFactory;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\AdapterFactoryInterface;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\WrapperFactory;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\WrapperFactoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @method \SprykerEco\Service\AkeneoPim\AkeneoPimConfig getConfig()
 */
class AkeneoPimServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\AdapterFactoryInterface
     */
    public function createAkeneoPimAdapterFactory(): AdapterFactoryInterface
    {
        return new AdapterFactory(
            $this->getConfig(),
            $this->createWrapperFactory(),
            $this->getSessionClient()
        );
    }

    /**
     * @return \SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\WrapperFactoryInterface
     */
    public function createWrapperFactory(): WrapperFactoryInterface
    {
        return new WrapperFactory();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\SessionInterface
     */
    public function getSessionClient(): SessionInterface
    {
        return $this->getProvidedDependency(AkeneoPimDependencyProvider::CLIENT_SESSION);
    }
}
