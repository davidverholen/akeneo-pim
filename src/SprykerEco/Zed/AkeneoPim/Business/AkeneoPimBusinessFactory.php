<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AkeneoPim\Business;

use Spryker\Zed\AkeneoPim\Business\Syncer\CategorySyncer;
use Spryker\Zed\AkeneoPim\Business\Syncer\ProductConcreteSyncer;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Spryker\Zed\AkeneoPim\Persistence\AkeneoPimEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\AkeneoPim\Persistence\AkeneoPimRepositoryInterface getRepository()
 * @method \Spryker\Zed\AkeneoPim\AkeneoPimConfig getConfig()
 */
class AkeneoPimBusinessFactory extends AbstractBusinessFactory
{
    public function createProductConcreteSyncer(): ProductConcreteSyncer
    {
        return new ProductConcreteSyncer();
    }

    public function createCategorySyncer(): CategorySyncer
    {
        return new CategorySyncer();
    }
}
