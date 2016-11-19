<?php
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
		if(!is_array($type)) {
			if(!class_exists($type)) { 
				self::require_php($type);
			}
		} else {
			for($i = 0;$i<count($type);$i++) {
				self::require_php($type[$i]);
			}
		}
    }
	
	// 导入子类库 
	private static function require_php($type) 
	{
		if(!class_exists($type)) { 
			require($type.".php");
			self::push_ProductDataCenter($type);
		}
	}
		
	// 将对象加入数据中心
	private static function push_ProductDataCenter($type) 
	{
		// 实例化对象
		$obj = new $type();
		
		// 如果该对象属于IProduct的子类 / 继承自IProduct
        if(is_subclass_of($obj,"IProduct")) {
			//把创建的对象塞入数据中心
			ProductDataCenter::push($type,$obj);
		}
	}
	
	
}