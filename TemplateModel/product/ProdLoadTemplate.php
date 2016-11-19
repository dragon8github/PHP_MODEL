<?php

/**
 * 模板类
 * ProdLoadTemplate
 * 专门处理加载数据行为的
 */
abstract class ProdLoadTemplate 
{
    function loadData($id,$type)
    {
		// 通用方法，内部实现，不需要子类实现
        $this->abstract_common();
		// 虚拟方法，需要子类个性化实现
        $this->abstract_func1($id);
		// 虚拟方法，需要子类个性化实现
        $this->abstract_func2($id);
		
		// 创建一个空对象
		$obj=(object)array();
		//假设这是从数据库取内容
		$arr=["prod_id"=>103,"prod_name"=>"黑客技术从入门到入狱"];
		// 遍历数组，并且填充进对象中
		foreach($arr as $k=>$v) {
			$obj->$k=$v;
		}
		// 返回对象
		return $obj;
    }
	
	// 虚拟方法，需要子类个性化实现
    abstract function abstract_func1($id);
	// 虚拟方法，需要子类个性化实现
    abstract function abstract_func2($id);
	// 通用的方法，不需要子类具体实现，而且也不是 abstract 类
    function abstract_common()
	{
        echo "通用设置方法<hr/>";
    }
}