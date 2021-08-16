<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk;

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use Http\Adapter\Guzzle6\Client;
use Http\Client\HttpClient;
use SprykerEco\Service\AkeneoPim\AkeneoPimConfig;

interface AkeneoPimSdkFactoryInterface
{
    /**
     * @param string $host
     *
     * @return \Akeneo\Pim\ApiClient\AkeneoPimClientBuilder
     */
    public function createAkeneoPimClientBuilder(string $host): AkeneoPimClientBuilder;

    /**
     * @return \Http\Client\HttpClient
     */
    public function createHttpClient(): HttpClient;
}
