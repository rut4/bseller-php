<?php
/**
 * BIT Tools Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  BSeller
 * @package   BSeller
 *
 * @copyright Copyright (c) 2018 B2W Digital - BIT Tools Platform.
 *
 * @author    Julio Reis <julio.reis@b2wdigital.com>
 */

include __DIR__ . '/../../api.php';

/** @var BSeller\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

/**
 * APPROVE PAYMENT
 * @var BSeller\Api\Handler\Response\HandlerInterface $response
 */
$orderId = '5658979804';
$transactionDate = '2018-05-04T13:10:44.000Z';
$bankCode = '123';
$agencyCode = '12349';
$accountNumber = '123456789';

$response = $requestHandler->approvePayment(
    $orderId,
    $transactionDate,
    $bankCode,
    $agencyCode,
    $accountNumber
);
var_dump($response->toArray());
exit;