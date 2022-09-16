<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Service\AkeneoPim;

use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use Spryker\Service\Kernel\AbstractServiceFactory;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\AdapterFactory;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\AdapterFactoryInterface;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk\AkeneoPimSdkFactory;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk\AkeneoPimSdkFactoryInterface;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\WrapperFactory;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\WrapperFactoryInterface;

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
        return new AdapterFactory($this->getConfig(), $this->createWrapperFactory());
    }

    /**
     * @return \SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\WrapperFactoryInterface
     */
    public function createWrapperFactory(): WrapperFactoryInterface
    {
        return new WrapperFactory();
    }

    /**
     * @return \Akeneo\Pim\ApiClient\AkeneoPimClientInterface
     */
    public function createAkeneoPimClient(): AkeneoPimClientInterface
    {
        return $this->createAkeneoPimSdkFactory()->createAkeneoPimClient($this->getConfig());
    }

    /**
     * @return \SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk\AkeneoPimSdkFactoryInterface
     */
    public function createAkeneoPimSdkFactory(): AkeneoPimSdkFactoryInterface
    {
        return new AkeneoPimSdkFactory();
    }
}
