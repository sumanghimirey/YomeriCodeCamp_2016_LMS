<?php

class imager {

    /**
     * Set to extention of file
     *
     * @param string $filename file name
     * @return extention
     */
    function getExt($filename) {
        $arr = explode(".", $filename);
        return strtolower($arr[count($arr) - 1]);
    }

    //to upload images
    function UploadImage($temp_name, $ext, $img_name, $uploaddir) {
        if (is_uploaded_file($temp_name)) {
            @move_uploaded_file($temp_name, $uploaddir . $img_name);
        }
        if ($ext == "png" || $ext == "gif" || $ext == "jpeg" || $ext == "jpg") {
            $size = @getimagesize($uploaddir . $img_name);
            $width = $size[0];
            $height = $size[1];
            $type = ($width >= $height) ? "L" : "P";
            return $type;
        } else {
            return false;
        }
    }

    //to create thumbs of image
    function CreateThumb($img_name, $ext, $src_location, $dest_location, $new_w, $new_h) {
        $name = $src_location . $img_name;
        $filename = $dest_location . $img_name;
        switch ($ext) {
            case "jpg" :
                $src_img = @imagecreatefromjpeg($name);
                break;
            case "gif" :
                $src_img = @imagecreatefromgif($name);
                break;
            case "png" :
                $src_img = @imagecreatefrompng($name);
                break;
            default :
                $src_img = @imagecreatefromjpeg($name);
        }

        $old_x = @imagesx($src_img);
        $old_y = @imagesy($src_img);
        $ratio = ($old_x < $old_y) ? $new_h / $old_y : $new_w / $old_x;

        $crop_w = $old_x * $ratio;
        $crop_h = $old_y * $ratio;
        $dst_img = @imagecreatetruecolor($crop_w, $crop_h);
        @imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $crop_w, $crop_h, $old_x, $old_y);
        switch ($ext) {
            case "jpg" :
                @imagejpeg($dst_img, $filename);
                break;
            case "gif" :
                @imagegif($dst_img, $filename);
                break;
            case "png" :
                @imagepng($dst_img, $filename);
                break;
            default :
                @imagejpeg($dst_img, $filename);
        }
        @imagedestroy($dst_img);
        @imagedestroy($src_img);
    }

    //to create fix thumbs of image
    function CreateFixThumb($img_name, $ext, $src_location, $dest_location, $crop_w, $crop_h) {
        $name = $src_location . $img_name;
        $filename = $dest_location . $img_name;
        switch ($ext) {
            case "jpg" :
                $src_img = @imagecreatefromjpeg($name);
                break;
            case "gif" :
                $src_img = @imagecreatefromgif($name);
                break;
            case "png" :
                $src_img = @imagecreatefrompng($name);
                break;
            default :
                $src_img = @imagecreatefromjpeg($name);
        }

        $old_x = @imagesx($src_img);
        $old_y = @imagesy($src_img);
		
        $dst_img = @imagecreatetruecolor($crop_w, $crop_h);
        @imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $crop_w, $crop_h, $old_x, $old_y);
        switch ($ext) {
            case "jpg" :
                @imagejpeg($dst_img, $filename);
                break;
            case "gif" :
                @imagegif($dst_img, $filename);
                break;
            case "png" :
                @imagepng($dst_img, $filename);
                break;
            default :
                @imagejpeg($dst_img, $filename);
        }
        @imagedestroy($dst_img);
        @imagedestroy($src_img);
    }
	
	 //to create crop thumbs of image
    function CreateCrop($img_name, $ext, $src_location, $dest_location, $crop_w, $crop_h) {
        $name = $src_location . $img_name;
        $filename = $dest_location . $img_name;
        switch ($ext) {
            case "jpg" :
                $src_img = @imagecreatefromjpeg($name);
                break;
            case "gif" :
                $src_img = @imagecreatefromgif($name);
                break;
            case "png" :
                $src_img = @imagecreatefrompng($name);
                break;
            default :
                $src_img = @imagecreatefromjpeg($name);
        }

        $old_x = @imagesx($src_img);
        $old_y = @imagesy($src_img);
		$src_x = ($old_x - $crop_w) / 2;			
		$src_y = 0;
		$dst_img = @imagecreatetruecolor($crop_w, $crop_h);
		@imagecopy($dst_img, $src_img, 0, 0, $src_x, $src_y, $crop_w, $crop_h);	
        switch ($ext) {
            case "jpg" :
                @imagejpeg($dst_img, $filename);
                break;
            case "gif" :
                @imagegif($dst_img, $filename);
                break;
            case "png" :
                @imagepng($dst_img, $filename);
                break;
            default :
                @imagejpeg($dst_img, $filename);
        }
        @imagedestroy($dst_img);
        @imagedestroy($src_img);
    }

}

?>