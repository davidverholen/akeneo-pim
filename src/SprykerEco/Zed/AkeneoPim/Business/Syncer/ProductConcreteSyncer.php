<?php


namespace Spryker\Zed\AkeneoPim\Business\Syncer;

use Generated\Shared\Transfer\AkeneoProductConcreteSyncConfigTransfer;
use Generated\Shared\Transfer\AkeneoSyncValidateResultTransfer;
use Generated\Shared\Transfer\AkeneoSyncWriteResultTransfer;

class ProductConcreteSyncer extends AbstractSyncer
{
    /** @var ProductConcreteAkeneoReader */
    protected $reader;

    /** @var ProductConcreteAkeneoValidator */
    protected $validator;

    /** @var ProductConcreteAkeneoTranslator */
    protected $translator;

    /** @var ProductConcreteAkeneMapper */
    protected $mapper;

    /** @var ProductConcreteWriter */
    protected $writer;

    /**
     * @param AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfig
     *
     * @return array
     */
    protected function read($productConcreteSyncConfig): array
    {
        return $this->reader->read($productConcreteSyncConfig->getReadConfig());

        // return [[],[],[]];
    }

    /**
     * @param array $akeneoEntity
     * @param AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfig
     *
     * @return AkeneoSyncValidateResultTransfer
     */
    protected function validate(array $akeneoEntity, $productConcreteSyncConfig): AkeneoSyncValidateResultTransfer
    {
        return $this->validator->validate($akeneoEntity, $productConcreteSyncConfig->getValidateConfig());

        //return (new AkeneoSyncValidateResultTransfer())->setIsSuccess(true);
    }

    /**
     * @param array $akeneoEntity
     * @param AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfig
     *
     * @return array
     */
    protected function translate(array $akeneoEntity, $productConcreteSyncConfig): array
    {
        return $this->translator->translate($akeneoEntity, $productConcreteSyncConfig->getTranslateConfig());

        // return $akeneoEntity;
    }

    /**
     * @param array $akeneoEntity
     * @param AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfig
     *
     * @return array
     */
    protected function map(array $akeneoEntity, $productConcreteSyncConfig): array
    {
        return $this->mapper->map($akeneoEntity, $productConcreteSyncConfig->getMapConfig());

     //   return $akeneoEntity;
    }

    /**
     * @param array $sprykerEntity
     * @param AkeneoProductConcreteSyncConfigTransfer $productConcreteSyncConfig
     *
     * @return AkeneoSyncWriteResultTransfer
     */
    protected function write(array $sprykerEntity, $productConcreteSyncConfig): AkeneoSyncWriteResultTransfer
    {
        return $this->writer->write($sprykerEntity, $productConcreteSyncConfig->getWriteConfig());

        //return (new AkeneoSyncWriteResultTransfer())->setIsSuccess(true);
    }
}
