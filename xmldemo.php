<?php
header("Content-type:text/html;charset=UTF-8"); 
//加载xml文件
$xml=simplexml_load_file("user.xml");
//方法一:遍历xml文件中的所有user元素
foreach ($xml->user as $user) {
	echo $user->id."<br>";
	echo $user->name."<br>";
	echo $user->scode."<br>";
}
echo "方法二"."<br>";
//方法二:遍历xml文件中的所有user元素
foreach ($xml->children() as $user) {
	echo $user->id."<br>";
	echo $user->name."<br>";
	echo $user->scode."<br>";
	
}
//xml数据的查询,基于xpath方式
echo "xml数据的查询:"."<br>";
//在xml文件中找scode元素
foreach ($xml->xpath('/custom/user/scode') as $scode) {
	echo $scode."<br>";
}
echo "动态创建xml"."<br>";
//创建xml文件
//创建dom文档
$dom=new DomDocument();
//创建新元素
$custom=$dom->createElement('custom');
//将元素加入文档树中
$dom->appendchild($custom);
//创建新元素
$user=$dom->createElement('user');
//将元素加入文档树中
$custom->appendchild($user);
//创建新元素
$id=$dom->createElement('id');
$name=$dom->createElement('name');
$scode=$dom->createElement('scode');
//将元素加入文档树中
$user->appendchild($id);
$user->appendchild($name);
$user->appendchild($scode);
//创建值节点
$id_value=$dom->createTextNode('u003');
$name_value=$dom->createTextNode('zhang');
$scode_value=$dom->createTextNode('78');
//将值节点加入到相应的元素中
$id->appendchild($id_value);
$name->appendchild($name_value);
$scode->appendchild($scode_value);
$file=fopen("new_user.xml", "w");
//生成xml
$newxml=$dom->saveXML();
//将xml写入文件中
fwrite($file, $newxml);
fclose($file);
//加载新的xml文件
$new=simplexml_load_file("new_user.xml");
//输出标准化的xml
echo $new->asXML();

 ?>