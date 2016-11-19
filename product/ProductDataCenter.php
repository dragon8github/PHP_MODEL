<?php

/**
 * 数据中心
 */
class ProductDataCenter
{
	 // 核心数据集
	 public static $objectList=[];
	 
	 // 塞入
	 public static function push($k,$v)
	 {
		 self::$objectList[$k]=$v;
	 }
	 
	 // 删除
	 public static function remove($k)
	 {
		unset(self::$objectList[$k]);		
	 }
	 
	 // 未定义静态函数异常捕捉器
	 public static function __callStatic($name, $arguments)
	 {
		$return=[];
		
		foreach(self::$objectList as $obj) {
			
			if(method_exists($obj,$name)) {
				
				$ret = $obj->$name($arguments);
				
				if($ret) {
					
					array_push($return,$ret);
					
				}
			}
		}
		return $return;
	 }
}