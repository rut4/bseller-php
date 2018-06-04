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

namespace BSeller\Api\Handler\Request\Catalog;

use BSeller\Api\Handler\Request\HandlerAbstract;
use BSeller\Api\Handler\Response\HandlerInterface;

class ProductHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/api/itens';

    /**
     * @param string $tipoInterface
     * @param int $maxRegisters
     * @return HandlerInterface
     */
    public function productsUpdated($tipoInterface = null, $maxRegisters = null)
    {
        $params = [];
        if ($tipoInterface) {
            $params['tipoInterface'] = $tipoInterface;
        }

        if ($maxRegisters) {
            $params['maxRegistros'] = $maxRegisters;
        }

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('/massivo', $params));
        return $responseHandler;
    }

    /**
     * @param string $tipoInterface
     * @param int $maxRegisters
     * @return HandlerInterface
     */
    public function products($tipoInterface = null, $maxRegisters = null, $pageNumber = null)
    {
        $params = [];
        if ($tipoInterface) {
            $params['tipoInterface'] = $tipoInterface;
        }

        if ($maxRegisters) {
            $params['limit'] = $maxRegisters;
        }

        if ($pageNumber) {
            $params['page'] = $pageNumber;
        }

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath(null, $params));
        return $responseHandler;
    }

    public function product($codigoItem, $tipoInterface = null)
    {
        $params = [];
        $params['codigoItem'] = $codigoItem;
        if ($tipoInterface) {
            $params['tipoInterface'] = $tipoInterface;
        }
        $responseHandler = $this->service()->get($this->baseUrlPath("/{$codigoItem}", $params));
        return $responseHandler;
    }

    /**
     * @param string $codigoItem
     * @param string $tipoInterface
     * @return HandlerInterface
     */
    public function stock($codigoItem, $tipoInterface = null)
    {
        $params = [];
        if ($tipoInterface) {
            $params['tipoInterface'] = $tipoInterface;
        }

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath("{$codigoItem}/estoque", $params));
        return $responseHandler;
    }

    /**
     * @param $codigoItem
     * @param null $tipoInterface
     * @return HandlerInterface
     */
    public function productSons($codigoItem, $tipoInterface = null) {
        $params = [];
        if ($tipoInterface) {
            $params['tipoInterface'] = $tipoInterface;
        }

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath("/{$codigoItem}/filhos", $params));
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
