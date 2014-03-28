<?php  
/*
 * ResolveData是一个解析数据类
 * Author：pan <panxuzhengxuxin@gmail.com> 
 * Env: php5.5.0
 */
 class ResolveData{
	
	public function __construct()
	{

	}
	//创建json
	public function create_json($json){
		return json_encode($json);
	}
	//解析json
	public function resolve_json($json){
		return json_decode($json,true);
	}

 } 
//实例
/* 
 *$resolve=new ResolveData();
 *$json=array('id'=>"u001",'name'=>"pan",'scode'=>99);
 *$js=$resolve->create_json($json);
 *echo $js;
 *echo "<br>";
 *var_dump($resolve->resolve_json($js));
 */
 ?>