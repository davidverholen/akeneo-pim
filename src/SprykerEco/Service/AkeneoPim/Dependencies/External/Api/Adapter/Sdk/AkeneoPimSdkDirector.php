<?php

namespace SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk;

use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use SprykerEco\Service\AkeneoPim\AkeneoPimConfig;

class AkeneoPimSdkDirector implements AkeneoPimSdkDirectorInterface
{
    /**
     * @var \SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter\Sdk\AkeneoPimSdkFactoryInterface
     */
    protected $akeneoPimSdkFactory;

    public function __construct(
        AkeneoPimSdkFactoryInterface $akeneoPimSdkFactory
    ) {
        $this->akeneoPimSdkFactory = $akeneoPimSdkFactory;
    }

    /**
     * @param \SprykerEco\Service\AkeneoPim\AkeneoPimConfig $config
     *
     * @return \Akeneo\Pim\ApiClient\AkeneoPimClientInterface
     */
    public function createAkeneoPimClient(AkeneoPimConfig $config): AkeneoPimClientInterface
    {
        $akeneoPimClientBuilder = $this->akeneoPimSdkFactory->createAkeneoPimClientBuilder($config->getHost());

        $akeneoPimClientBuilder->setHttpClient(
            $this->akeneoPimSdkFactory->createHttpClient()
        );

        $akeneoPimClient = $akeneoPimClientBuilder->buildAuthenticatedByPassword(
            $config->getClientId(),
            $config->getClientSecret(),
            $config->getUsername(),
            $config->getPassword()
        );

        return $akeneoPimClient;
    }
}
