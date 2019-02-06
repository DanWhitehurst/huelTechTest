<?php

class ControllerOrderInsert {
    
    public function __construct()
    {
    }
    
    public function insertNewOrder()
    {
        $aOrderData = $this->buildData(); //using this for dummy data
        
        $oModelOrders = new ModelOrders();
        $aOrder = $oModelOrders->insertNewOrder($aOrderData);
        
        return $aOrder;
    }
    
    public function buildData()
    {
        $aData = [];
        $aData['name'] = '#1001';
        $aData['email'] = 'Danial.Rohan@developer-tools.shopifyapps.com';
        $aData['financialStatus'] = 'paid';
        $aData['paid at'] = '30/01/2019 12:35';
        $aData['fulfillmentStatus'] = 'fulfilled';
        $aData['currency'] = 'DBP';
        $aData['subtotal'] = '30';
        $aData['shipping'] = '0';
        $aData['taxes'] = '0';
        $aData['total'] = '30';
        $aData['discountcode'] = '';
        $aData['discountAmount'] = '0';
        $aData['shippingMethod'] = '';
        $aData['createdAt'] = '30/01/2019 12:35';
        
        return $aData;
    }
}