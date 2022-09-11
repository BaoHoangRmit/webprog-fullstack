<?php 

include_once 'product-file-control.php';

function check_product_name($p1) {
    $product_name_pattern = "/^([a-zA-Z0-9 !@#$%^&*]+){10,20}$/";
    if (preg_match($product_name_pattern, strval($p1))) {
        return 1;
    } else return 0;
}

function check_product_price($p1) {
    // product_price_pattern = "/^[+]?\d+([.]\d+)?$/";
    $product_price_pattern = "/^[+]?\d+\.([0-9][0-9])$/";
    if (preg_match($product_price_pattern, strval($p1))) {
        return 1;
    } else return 0;
}

function check_product_desc($p1) {
    // $product_desc_pattern = "/^([a-zA-Z0-9 !@#$%^&*]+){1,500}$/";
    $product_desc_pattern = "/^([a-zA-Z0-9 :,.\-\?\(\)!@#$%^&*]+){5,500}$/";
    if (preg_match($product_desc_pattern, strval($p1))) {
        return 1;
    } else return 0;
}

?>