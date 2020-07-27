<?php

namespace Spryker\Zed\AkeneoPim\Business\Syncer;

use Generated\Shared\Transfer\AkeneoSyncResultTransfer;
use Generated\Shared\Transfer\AkeneoSyncValidateResultTransfer;
use Generated\Shared\Transfer\AkeneoSyncWriteResultTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

abstract class AbstractSyncer
{
    protected $resultHandler;

    /**
     * @param AbstractTransfer $syncConfig
     *
     * @return AkeneoSyncResultTransfer
     */
    public final function sync($syncConfig): AkeneoSyncResultTransfer
    {
        $akeneoEntities = $this->read($syncConfig);

        foreach($akeneoEntities as $akeneoEntity) {
            $validationResult = $this->validate($akeneoEntity, $syncConfig);
            if ($validationResult->getIsSuccess() === false) {
                $this->resultHandler->addError($akeneoEntity, $validationResult, $syncConfig);

                if ($validationResult->getIsTerminate() === true) {
                    break;
                }

                continue;
            }

            $akeneoEntity = $this->translate($akeneoEntity, $syncConfig);
            $sprykerEntity = $this->map($akeneoEntity, $syncConfig);
            $this->write($sprykerEntity, $syncConfig);

            $this->resultHandler->addSuccess($sprykerEntity, $akeneoEntity, $syncConfig);
        }

        return $this->resultHandler->getResults();
    }

    /**
     * Read all "to be processed" akeneo entities
     *
     * @param AbstractTransfer $syncConfig
     *
     * @return array
     */
    protected abstract function read($syncConfig): array;

    /**
     * Validates if the data is eligable for processing for workflow requirements
     *
     * @param array $akeneoEntity
     * @param AbstractTransfer $syncConfig
     *
     * @return AkeneoSyncValidateResultTransfer
     */
    protected abstract function validate(array $akeneoEntity, $syncConfig): AkeneoSyncValidateResultTransfer;

    /**
     * Translates Akeneo values into Spryker values (eg: akeneo stores prices in float major currency units, and spryker stores int minor currency units)
     *
     * @param array $akeneoEntity
     * @param AbstractTransfer $syncConfig
     *
     * @return array
     */
    protected abstract function translate(array $akeneoEntity, $syncConfig): array;

    /**
     * Maps the Akeneo entity with already translated values into Spryker entity.
     *
     * @param array $akeneoEntity
     * @param AbstractTransfer $syncConfig
     *
     * @return array
     */
    protected abstract function map(array $akeneoEntity, $syncConfig): array;

    /**
     * @param array $sprykerEntity
     * @param AbstractTransfer $syncConfig
     *
     * @return AkeneoSyncWriteResultTransfer
     */
    protected abstract function write(array $sprykerEntity, $syncConfig): AkeneoSyncWriteResultTransfer;
}
