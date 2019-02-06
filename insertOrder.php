<?php
require_once ('config.php');
require_once('controller/controllerOrderInsert.php');
require_once('controller/controllerDb.php');
require_once('model/modelOrders.php');

$oOrderInsert = new ControllerOrderInsert();
$aOrder = $oOrderInsert->insertNewOrder();

foreach ($aOrder as $key=>$value) {
    echo $key . ': ' . $value . ' </br>';
}