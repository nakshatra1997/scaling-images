<?php
header('Content-type:image/jpeg');
if(isset($_GET['image']))
{
	$image=$_GET['image'];  	// create an array with value 0 and 1 which corresponds to width and height of image
	$image_size=getimagesize($image);
	$image_width=$image_size[0];  
	$image_height=$image_size[1];
	$new_size=($image_width + $image_height)/($image_width*($image_height/45));
	$new_width=$image_width*$new_size;    // scaling down the dimensions
	$new_height=$image_height*$new_size;
	$new_image=imagecreatetruecolor($new_width,$new_height); //producing an image with new dimensions
	//now we need to load in the original image
    $old_image=imagecreatefromjpeg($image);
	imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);  //we are resizing the old image into the canvas of new image
    imagejpeg($new_image);
}
?>