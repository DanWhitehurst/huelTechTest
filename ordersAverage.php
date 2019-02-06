<?php

require_once('controller/controllerOrderAverage.php');

$oOrders = new ControllerOrderAverage();

if (isset($_REQUEST['customerId'])) {
    $customerId = intval($_REQUEST['customerId']);
    $oOrders->setCustomerId($customerId);
}

$averageOrderCost = $oOrders->getAverageOrderPrice();

echo 'Average order total: ' . $averageOrderCost;