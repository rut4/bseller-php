<?php

/**
 * BIT Tools Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  BSeller
 * @package   BSeller
 *
 * @copyright Copyright (c) 2018 B2W Digital - BIT Tools Platform. .
 *
 * @author    Julio Reis <julio.reis@b2wdigital.com>
 */

namespace BSeller\Api\Handler\Request\Catalog\Product;

use BSeller\Api\Handler\Request\HandlerAbstract;
use BSeller\Api\Handler\Response\HandlerInterface;

class StockHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/api/itens';

    /**
     * @param null $tipoInterface
     * @param null $maxRegisters
     * @return HandlerInterface
     */
    public function stocksUpdated($tipoInterface = null, $maxRegisters = null)
    {
        $params = [];
        if ($tipoInterface) {
            $params['tipoInterface'] = $tipoInterface;
        }

        if ($maxRegisters) {
            $params['maxRegistros'] = $maxRegisters;
        }

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('/estoque/massivo', $params));
        return $responseHandler;
    }

    /**
     * @param string $productCode
     * @param string $tipoInterface
     * @return HandlerInterface
     */
    public function stock($productCode, $tipoInterface)
    {
        $params = [];
        $params['tipoInterface'] = $tipoInterface;

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath("{$productCode}/estoque", $params));
        return $responseHandler;
    }

    /**
     * @return Variation
     */
    public function entityInterface()
    {
        return null;
    }
}
