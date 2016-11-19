<?php
// 引入超类
require ("product/ProductFactory.php");

ProductFactory::getProduct(["Books","Dogs"]);
var_export(ProductDataCenter::getList());


//ProductDataCenter::remove("Books");
//var_export(ProductDataCenter::getList()); 