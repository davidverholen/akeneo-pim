<?php


namespace Spryker\Zed\AkeneoPim\Business\Syncer;

use Generated\Shared\Transfer\AkeneoCategorySyncConfigTransfer;
use Generated\Shared\Transfer\AkeneoSyncValidateResultTransfer;
use Generated\Shared\Transfer\AkeneoSyncWriteResultTransfer;

class CategorySyncer extends AbstractSyncer
{
    /**
     * @param AkeneoCategorySyncConfigTransfer $categorySyncConfig
     *
     * @return array
     */
    protected function read($categorySyncConfig): array
    {
        return [
            [],[],[],
        ];
    }

    /**
     * @param array $akeneoEntity
     * @param AkeneoCategorySyncConfigTransfer $categorySyncConfig
     *
     * @return AkeneoSyncValidateResultTransfer
     */
    protected function validate(array $akeneoEntity, $categorySyncConfig): AkeneoSyncValidateResultTransfer
    {
        return (new AkeneoSyncValidateResultTransfer())->setIsSuccess(true);
    }

    /**
     * @param array $akeneoEntity
     * @param AkeneoCategorySyncConfigTransfer $categorySyncConfig
     *
     * @return array
     */
    protected function translate(array $akeneoEntity, $categorySyncConfig): array
    {
        return $akeneoEntity;
    }

    /**
     * @param array $akeneoEntity
     * @param AkeneoCategorySyncConfigTransfer $categorySyncConfig
     *
     * @return array
     */
    protected function map(array $akeneoEntity, $categorySyncConfig): array
    {
        return $akeneoEntity;
    }

    /**
     * @param array $sprykerEntity
     * @param AkeneoCategorySyncConfigTransfer $categorySyncConfig
     *
     * @return AkeneoSyncWriteResultTransfer
     */
    protected function write(array $sprykerEntity, $categorySyncConfig): AkeneoSyncWriteResultTransfer
    {
        return (new AkeneoSyncWriteResultTransfer())->setIsSuccess(true);
    }
}
