<?php
require_once("cls-connection.php");
class User extends Connection
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getUserDetails($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('users',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function getUserAllDetails($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('users u left join countries c on u.country=c.id',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function deleteUsers($condition='',$debug=0)
	{	
		$this->deleteRow("users",$condition,$debug);
	}
	
	public function updateUsers($update_data,$condition='',$debug=0)
	{
		return $this->updateRow("users",$update_data,$condition,$debug);
	}
	
	public function getOwnerDetails($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('users u left join countries c on u.country=c.id left join owners o on u.user_id=o.user_id left join countries c1 on o.school_country=c1.id  ',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function getConsumerDetails($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('users u left join countries c on u.country=c.id left join consumers cn on u.user_id=cn.user_id left join countries c1 on cn.school_country=c1.id  ',$fields,$condition,$order_by,$limit,$debug);
	}
	
	
	public function getAllCoupons($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('coupons c left join users u on c.user_id=u.user_id left join coupon_category cc on c.coupon_category=cc.id',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function getAllCouponReport($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('coupon_report cr left join coupons c on cr.coupon_id=c.coupon_id left join users u on cr.user_id=u.user_id',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function getAllReport($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('coupon_report',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function getUserTransaction($fields='',$condition='',$order_by='',$limit='',$debug=0)
	{
		return $this->getRecords('user_payment_transaction',$fields,$condition,$order_by,$limit,$debug);
	}
	
	public function deleteCoupons($condition='',$debug=0)
	{	
		$this->deleteRow("coupons",$condition,$debug);
	}
	
	public function create_cropped_thumbnail($dir, $image_name, $thumb_width, $thumb_height, $prefix) {
			ini_set('memory_limit', '512M');
			if (!(is_integer($thumb_width) && $thumb_width > 0) && !($thumb_width === "*")) {
			echo "The width is invalid";
			exit(1);
			}
			if (!(is_integer($thumb_height) && $thumb_height > 0) && !($thumb_height === "*")) {
			echo "The height is invalid";
			exit(1);
			}
			$extension = pathinfo($dir.$image_name, PATHINFO_EXTENSION);
			switch ($extension) {
			case "jpg":
			case "jpeg":
			$source_image = imagecreatefromjpeg($dir.$image_name);
			break;
			case "gif":
			$source_image = imagecreatefromgif($dir.$image_name);
			break;
			case "png":
			$source_image = imagecreatefrompng($dir.$image_name);
			break;
			default:
			exit(1);
			break;
			}
			
			$source_width = imageSX($source_image);
			$source_height = imageSY($source_image);
			
			$source_x = 0;
			$source_y = 0;
			
			/*if (($source_width / $source_height) == ($thumb_width / $thumb_height)) {
			$source_x = 0;
			$source_y = 0;
			}

			if (($source_width / $source_height) > ($thumb_width / $thumb_height)) {
			$source_y = 0;
			$temp_width = $source_height * $thumb_width / $thumb_height;
			$source_x = ($source_width - $temp_width) / 2;
			$source_width = $temp_width;
			}
			
			if (($source_width / $source_height) < ($thumb_width / $thumb_height)) {
			$source_x = 0;
			$temp_height = $source_width * $thumb_height / $thumb_width;
			$source_y = ($source_height - $temp_height) / 2;
			$source_height = $temp_height;
			}
			*/
			$target_image = ImageCreateTrueColor($thumb_width, $thumb_height);
			imagecopyresampled($target_image, $source_image, 0, 0, $source_x, $source_y, $thumb_width, $thumb_height, $source_width, $source_height);
			switch ($extension) {
			case "jpg":
			case "jpeg":
			//echo $image_path;exit;
			imagejpeg($target_image, $dir.$prefix."_".$image_name);
			break;
			case "gif":
			imagegif($target_image, $dir.$prefix."_".$image_name);
			break;
			case "png":
			imagepng($target_image, $dir.$prefix."_".$image_name);
			break;
			default:
			exit(1);
			break;
			}
			imagedestroy($target_image);
			imagedestroy($source_image);
}
	
	public function getcountry($fields,$condition,$order_by,$limit,$debug)
	{
		return $this->getRecords('countries',$fields,$condition,$order_by,$limit,$debug);	
	}
	
	public function insertCoupon($insert_data,$debug=0)
	{
		return $this->insertRow('coupons',$insert_data,$debug);
	}
	
	public function updateCoupon($update_data,$condition='',$debug=0)
	{
		return $this->updateRow('coupons',$update_data,$condition,$debug);
	}
	
	public function sendmail($to,$subject,$message)
	{
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: Our Weekly Sale <info@ourweeklysale.com>\n";
		$headers .= "X-Mailer: PHP's mail() Function\n";
		$mail_sent = mail($to, $subject, $message, $headers);
		return $mail_sent;
	}
		
}
?>