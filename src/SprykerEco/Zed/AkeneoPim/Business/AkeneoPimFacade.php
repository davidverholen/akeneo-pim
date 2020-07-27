<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AkeneoPim\Business;

use Generated\Shared\Transfer\AkeneoCategorySyncConfigTransfer;
use Generated\Shared\Transfer\AkeneoProductConcreteConfigTransfer;
use Generated\Shared\Transfer\AkeneoProductConcreteSyncConfigTransfer;
use Generated\Shared\Transfer\AkeneoSyncResultTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\AkeneoPim\Business\AkeneoPimBusinessFactory getFactory()
 * @method \Spryker\Zed\AkeneoPim\Persistence\AkeneoPimEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\AkeneoPim\Persistence\AkeneoPimRepositoryInterface getRepository()
 */
class AkeneoPimFacade extends AbstractFacade implements AkeneoPimFacadeInterface
{
    /**
     * @param AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfigTransfer
     *
     * @return AkeneoSyncResultTransfer
     */
    public function syncProductConcretes(AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfigTransfer): AkeneoSyncResultTransfer
    {
        $this->getFactory()->createProductConcreteSyncer()->sync($productConcreteSyncConfigTransfer);
    }

    /**
     * @param AkeneoCategorySyncConfigTransfer $categorySyncConfigTransfer
     *
     * @return AkeneoSyncResultTransfer
     */
    public function syncCategories(AkeneoCategorySyncConfigTransfer $categorySyncConfigTransfer): AkeneoSyncResultTransfer
    {
        $this->getFactory()->createProductConcreteSyncer()->sync($categorySyncConfigTransfer);
    }
}
