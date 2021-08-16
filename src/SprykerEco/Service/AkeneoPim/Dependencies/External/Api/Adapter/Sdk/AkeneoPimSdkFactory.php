<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk;

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use Http\Adapter\Guzzle6\Client;
use Http\Client\HttpClient;

class AkeneoPimSdkFactory implements AkeneoPimSdkFactoryInterface
{
    /**
     * @param string $host
     *
     * @return \Akeneo\Pim\ApiClient\AkeneoPimClientBuilder
     */
    public function createAkeneoPimClientBuilder(string $host): AkeneoPimClientBuilder
    {
        return new AkeneoPimClientBuilder($host);
    }

    /**
     * @return \Http\Client\HttpClient
     */
    public function createHttpClient(): HttpClient
    {
        return new Client();
    }
}
