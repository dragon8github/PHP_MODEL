<?php

// 引入虚拟类,require的子类如（book/dogs等）需要使用
require('ProdLoadTemplate.php');

// 引入接口，在is_subclass_of判断的时候需要使用
require("IProduct.php");

// 数据中心
require("ProductDataCenter.php");

/**
 * 商品工厂类
 */
class ProductFactory
{
    public static function getProduct($type)
    {
		// 判断传入的是否为一个数组类型
		if(is_string($type)) {
			if(!class_exists($type)) { 
				self::require_php($type);
			}
		// 判断传入的是否是一个字符串类型	
		} elseif(is_array($type)) {
			for($i = 0;$i<count($type);$i++) {
				self::require_php($type[$i]);
			}
		}
    }
	
	// 推入数据中心
	private static function require_php($type) 
	{
		if(!class_exists($type)) { 		
		    // 导入文件
			require($type.".php");
			// 实例化对象
			$obj = new $type();
			// 如果该对象属于IProduct的子类 / 继承自IProduct
			if(is_subclass_of($obj,"IProduct")) {
				//把创建的对象塞入数据中心
				ProductDataCenter::push($type,$obj);
			}
		}
	}
}