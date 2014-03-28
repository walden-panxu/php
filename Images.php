<?php 
/**
 *  Images类是一个图片处理类
 *  @author pan <panxuzhengxuxin@gmail.com> 
 *  @package application.controllers 
 *  @since 1.0 
 */
class Images 
{
	
	
	/**
	 * 缩放图片
	 * @param $source原图片
	 * @param $newfile新图片
	 * @param $pre缩放比例
	 */
	public function thumn($source,$pre,$newfile)
	{
	    //获取图片尺寸
		list($s_w,$s_h)=getimagesize($source);
		//生成新的图片尺寸
		$new_w=$s_w*$pre;
		$new_h=$s_h*$pre;

		//创建新的图像
		$new_f=imagecreatetruecolor($new_w, $new_h);
		//用资源图片创建图像
		$sour_f=imagecreatefromjpeg($source);
		//拷贝资源图片到新图像
		imagecopyresampled($new_f, $sour_f, 0, 0, 0, 0, $new_w, $new_h, $s_w, $s_h);
		//输出图片到浏览器
		imagejpeg($new_f,$newfile);

	    imagedestroy($new_f);
	    imagedestroy($sour_f);
	} 
}
 ?>