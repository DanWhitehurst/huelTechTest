<?php

class ControllerOrderAverage {
    
    protected $customerId;
    private $apiUrl;
    
    public function __construct()
    {
        if ($this->customerId) {
            $this->apiUrl = 'https://technical-be-8186861.myshopify.com/admin/customers/' . $this->customerId . '/orders.json';
        } else {
            $this->apiUrl = 'https://technical-be-8186861.myshopify.com/admin/orders.json';
        }
    }
    
    public function getAverageOrderPrice()
    {
//        $aData = $this->connectToShopifyAPI();
        
        $aData = $this->buildData(); //using this for dummy data as can't connect to shopifyApi
        
        $numberOfOrders = count($aData['orders']);
        $totalOfOrders = 0;
        foreach ($aData['orders'] as $order) {
            $totalOfOrders += intval($order['total_price']);
        }
        return $totalOfOrders/$numberOfOrders;
    }
    
    public function buildData()
    {
        $aData = [];
        $aData['orders'] = [];
        //first dummy order
        $aData['orders'][0]['id'] = '847797157991';
        $aData['orders'][0]['number'] = '151';
        $aData['orders'][0]['created_at'] = '2019-02-04T15:13:01-05:00';
        $aData['orders'][0]['token'] = 'cc3a42965f2f3d3f32a5ef6d2a00a3f9';
        $aData['orders'][0]['gateway'] = 'manual';
        $aData['orders'][0]['total_price'] = '62.00';
        $aData['orders'][0]['subtotal_price'] = '62.00';
        //second dummy order
        $aData['orders'][1]['user_id'] = '26343047272';
        $aData['orders'][1]['number'] = '152';
        $aData['orders'][1]['created_at'] = '2019-02-04T15:13:01-06:00';
        $aData['orders'][1]['token'] = 'cc3a42965f2f3d3f32a5ef6d2a00a3f8';
        $aData['orders'][1]['gateway'] = 'manual';
        $aData['orders'][1]['total_price'] = '50.00';
        $aData['orders'][1]['subtotal_price'] = '50.00';
        $aData['orders'][1]['user_id'] = '26343047271';
        
        return $aData;
    }
    
    public function getApiData()
    {
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        $apiData = curl_exec($ch);
    
        curl_close($ch);
        
        return $apiData;
    }
    
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }
}