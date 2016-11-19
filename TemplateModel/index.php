<?php

// 引入超类
require ("product/ProductFactory.php");

ProductFactory::getProduct(["Books","Dogs"]);
var_export(ProductDataCenter::getList());

var_export(ProductDataCenter::getChild(103));