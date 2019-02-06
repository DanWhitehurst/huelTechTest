<?php

class ModelOrders {
    private $db;
    
    public function __construct()
    {
        $oDb = new ControllerDb();
        $this->db = $oDb->connect();
    }
    
    public function insertNewOrder($orderData)
    {
        $sql = "
            INSERT INTO Orders (
                Name
                , Email
                , FinanicalStatus
                , PaidAt
                , FulfillmentStatus
                , Currency
                , SubTotal
                , Shipping
                , Taxes
                , Total
                , DiscountCode
                , DiscountAmount
                , ShippingMethod
                , CreatedAt
            ) VALUES (
                '" . $this->db->real_escape_string($orderData['name']) ."'
                ,'" . $this->db->real_escape_string($orderData['email']) ."'
                ,'" . $this->db->real_escape_string($orderData['financialStatus']) ."'
                ,'" . $this->db->real_escape_string($orderData['paid at']) ."'
                ,'" . $this->db->real_escape_string($orderData['fulfillmentStatus']) ."'
                ,'" . $this->db->real_escape_string($orderData['currency']) ."'
                ," . intval($orderData['subtotal']) ."
                ," . intval($orderData['shipping']) ."
                ," . intval($orderData['taxes']) ."
                ," . intval($orderData['total']) ."
                ,'" . $this->db->real_escape_string($orderData['discountCode']) ."'
                ," . intval($orderData['discount amount']) ."
                ,'" . $this->db->real_escape_string($orderData['shippingMethod']) ."'
                ,'" . $this->db->real_escape_string($orderData['createdAt']) ."'
            )";
    
        try {
            $this->db->query($sql);
            $aOrder = $this->selectLatestOrder();
            mysqli_close($this->db);
            return $aOrder;
        } catch (exception $exc) {
            error_log('Failed to insert new order: ' . $exc);
            return false;
        }
    }
    
    public function selectLatestOrder()
    {
        $sql = "
          SELECT
            OrderId
            , Name
            , Email
            , FinanicalStatus
            , PaidAt
            , FulfillmentStatus
            , Currency
            , SubTotal
            , Shipping
            , Taxes
            , Total
            , DiscountCode
            , DiscountAmount
            , ShippingMethod
            , CreatedAt
            FROM
              Orders
            ORDER BY
              OrderId DESC
            LIMIT 1";
        try {
            $results = $this->db->query($sql);
            $data = $results->fetch_assoc();
            
            return $data;
        } catch (exception $exc) {
            error_log('Failed to retrieve latest order: ' . $exc);
            return false;
        }
    }
}