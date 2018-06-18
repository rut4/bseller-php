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

namespace BSeller\Api\Handler\Request\Sales;

use BSeller\Api\Handler\Request\HandlerAbstract;
use BSeller\Api\Handler\Response\HandlerInterface;

class DeliveryHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/api/entregas';


    /**
     * @return HandlerInterface
     */
    public function deliveries($unidadeNegocio, $maxRegistros = null)
    {
        $params = [];
        $params['unidadeNegocio'] = $unidadeNegocio;
        if ($maxRegistros) {
            $params['maxRegistros'] = $maxRegistros;
        }

        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('/massivo', $params));
        return $responseHandler;
    }

    /**
     * @return HandlerInterface
     */
    public function delivery($deliveryId)
    {
        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath("/{$deliveryId}"));
        return $responseHandler;
    }

    /**
     * @return null
     */
    public function entityInterface()
    {
        return null;
    }
}
