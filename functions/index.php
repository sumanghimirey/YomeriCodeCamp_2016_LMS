<?php

function redirect($url) {
    $url = str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url);
    if (!ob_get_contents() && !headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo "<script>window.location='$url';</script>";
    }
    fn_flush();
    exit;
}

function fn_flush() {
    if (function_exists('ob_flush')) {
        @ob_flush();
    }
    flush();
}

function clean($str) {
     $str = html_entity_decode(stripslashes($str));
    return $str;
}

function limitWords($str, $max) {
   $str = explode(' ', $str);
    if (count($str) > $max) {
        $s = implode(' ', array_slice($str, 0, $max));
        $string = $s . "...";
        return html_entity_decode(stripslashes($string));
    } else {
        $s = implode(' ', array_slice($str, 0, $max));
        return html_entity_decode(stripslashes($s));
    }
}

function limitString($data, $size, $elipse = true){
    $data = html_entity_decode(stripslashes($data));          
    if(mb_strlen($data, 'utf-8') > $size){
        $result = mb_substr($data,0,mb_strpos($data,' ',$size,'utf-8'),'utf-8');
		if(mb_strlen($result, 'utf-8') <= 0){
			$result = mb_substr($data,0,$size,'utf-8');
			$result = mb_substr($result, 0, mb_strrpos($result, ' ','utf-8'),'utf-8');         
        }
        if($elipse) {
            $result .= " ...";
        }
    } else {
    	$result = $data;
    }
    return $result; 
}

function makeNiceName($str) {
    $str = trim($str);
    $str = preg_replace('/[^(A-z0-9)|\s|\-]/', "-", $str, -1);
    $str = preg_replace('/[\W|\s|\-]/', "-", $str, -1);
    $str = preg_replace('/(-)+/', "-", $str, -1);
    $str = rtrim($str, "-");
    $str = strtolower($str);
    $str = substr($str, 0, 40);
    return $str;
}

function checkNicename($table_name, $field_name, $nice_name) {
    $sql = "select * from $table_name where $field_name = '$nice_name'";
    $res = mysql_query($sql);
    if (mysql_num_rows($res) > 0) {
        return true;
    } else {
        return false;
    }
}


function getNicename($table_name, $field_name, $nice_name) {
	$nice_name = makeNiceName($nice_name);
	$sql = "select count(*) as total from $table_name where $field_name like '$nice_name%'";
	$res = mysql_query($sql);
	$ras = mysql_fetch_array($res);
	$name = ($ras['total'] == 0) ? $nice_name : $nice_name."-".$ras['total'];
	return $name ;
}


function send_email($to, $sub, $msg, $from) {
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $from . "\n";
    if (mail($to, $sub, $msg, $headers))
        return true;
    else
        return false;
}


function email_attachment($to_email, $subject, $msg, $file_location, $from = "", $default_filetype = 'application/zip') {
    $from = (!empty($from)) ? $from : "info@searchnepal.net";
    $fileatt = $file_location;
    if (function_exists(mime_content_type)) {
        $fileatttype = mime_content_type($file_location);
    } else {
        $fileatttype = $default_filetype;
    }
    $fileattname = basename($file_location);
    //prepare attachment
    $file = fopen($fileatt, 'rb');
    $data = fread($file, filesize($fileatt));
    fclose($file);
    $data = chunk_split(base64_encode($data));
    //create mime boundary
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    //create email  section
    $message = "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-type: text/html; charset=us-ascii\n" .
            "Content-Transfer-Encoding: 7bit\n\n" .
            stripslashes($msg) . "\n\n";
    //create attachment section
    $message .= "--{$mime_boundary}\n" .
            "Content-Type: {$fileatttype};\n" .
            " name=\"{$fileattname}\"\n" .
            "Content-Disposition: attachment;\n" .
            " filename=\"{$fileattname}\"\n" .
            "Content-Transfer-Encoding: base64\n\n" .
            $data . "\n\n" .
            "--{$mime_boundary}--\n";
    $headers = "From: $from" . "\n";
    $headers .= "Reply-To: $from" . "\n";
    $headers .= "X-Mailer: Edmonds Commerce Email Attachment Function" . "\n";
    $headers .= "Date: " . date("r") . "\n";
    $headers .= "MIME-Version: 1.0\n" .
            "Content-Type: multipart/mixed;\n" .
            " boundary=\"{$mime_boundary}\"";
    if (mail($to_email, $subject, $message, $headers, '-f ' . $from))
        return true;
    else
        return false;
}

function setMessage($message, $status = '1') {
    $_SESSION['message'] = array();
    $_SESSION['message']['text'] = $message;
    if ($status == 1 || $status == 0 || $status == -1)
        $_SESSION['message']['status'] = $status;
    else
        $_SESSION['message']['status'] = 0;
}

function showMessage() {
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        $message = $_SESSION['message']['text'];
        $message_status = $_SESSION['message']['status'];
    }
    else
        $message = "";
    if ($message != "") {
        if ($message_status == 1)
            echo'<div class="notification n-success">';
        elseif ($message_status == -1)
            echo'<div class="notification n-error">';
        else
            echo'<div class="notification n-information">';
        echo $message;
        echo '</div>';
    }
}

function deleteMessage() {
    $_SESSION['message'] = array();
    unset($_SESSION['message']);
}

function delete_directory($dirname) {
    $dir_handle = "";
    if (is_dir($dirname))
        $dir_handle = @opendir($dirname);
    if ($dir_handle != "") {
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    @unlink($dirname . "/" . $file);
                else
                    delete_directory($dirname . '/' . $file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
    }
}

//Download images from remote server
function getImage($url,$path) { 
    $in =    fopen($url, "rb");
    $out=   fopen($path, "wb");
    while ($chunk = fread($in,8192)) {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

function getDatesBetween2Dates($format, $startTime, $endTime) {
	$day = 86400;
	$startTime = strtotime($startTime);
	$endTime = strtotime($endTime);
	$numDays = round(($endTime - $startTime) / $day) + 1;
	$days = array();
	for ($i = 0; $i < $numDays; $i++) {
		$days[] = date($format, ($startTime + ($i * $day)));
	}
	return $days;
}

function youtube($url) {
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches);
    return (isset($matches[1])) ? $matches[1] : '';

}

function record_sort($records, $field, $reverse=false) {
	$hash = array();
    foreach($records as $record) {
        $hash[$record[$field]] = $record;
    }
    ($reverse)? krsort($hash) : ksort($hash);
    $records = array();
    foreach($hash as $record) {
        $records []= $record;
    }
    return $records;
}

function getAddress($lat,$lng) {
	$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
	$json = @file_get_contents($url);
	$data=json_decode($json);
	$status = $data->status;
	if($status=="OK")
		return $data->results[0]->formatted_address;
	else
		return false;
}

function get_lat_long($address) {
    $address = str_replace(" ", "+", $address);
    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false");
    $json = json_decode($json);
    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	$lat_long = array("lat"=>$lat, "long"=>$long);
    return $lat_long;
}

function getDistanceTime($point1, $point2) {
	$point1 = urlencode($point1);
	$point2 = urlencode($point2);
	$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$point1&destinations=$point2&language=en-EN&sensor=false");
	$data = json_decode($data);
	$time = 0;
	$distance = 0;
	foreach($data->rows[0]->elements as $road) {
		$time += $road->duration->value;
		$distance += $road->distance->value;
	}
	$dis_time = array("distance"=>$distance, "time"=>$time);
	return $dis_time;
}

function get_driving_information($start, $finish, $raw = false)
{
	if(strcmp($start, $finish) == 0) {
		$time = 0;
		if($raw) {
			$time .= ' seconds';
		}
		return array('distance' => 0, 'time' => $time);
	}
 
	$start  = urlencode($start);
	$finish = urlencode($finish);
 
	$distance   = 'unknown';
	$time		= 'unknown';
 
	$url = 'http://maps.googleapis.com/maps/api/directions/xml?origin='.$start.'&destination='.$finish.'&sensor=false';
	if($data = file_get_contents($url)) {
		$xml = new SimpleXMLElement($data);
		if(isset($xml->route->leg->duration->value) AND (int)$xml->route->leg->duration->value > 0) {
			if($raw) {
				$distance = (string)$xml->route->leg->distance->text;
				$time	  = (string)$xml->route->leg->duration->text;
			} else {
				$distance = (int)$xml->route->leg->distance->value / 1000 / 1.609344; 
				$time	  = (int)$xml->route->leg->duration->value;
			}
		} else {
			throw new Exception('Could not find that route');
		}
		return array('distance' => round($distance,2), 'time' => $time);
	} else {
		throw new Exception('Could not resolve URL');
	}
}

function secondsToTime($inputSeconds) {
	$secondsInAMinute = 60;
    $secondsInAnHour  = 60 * $secondsInAMinute;
    $secondsInADay    = 24 * $secondsInAnHour;

    // extract days
    $days = floor($inputSeconds / $secondsInADay);

    // extract hours
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    // extract minutes
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    // extract the remaining seconds
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    // return the final array
    $obj = array(
        'd' => (int) $days,
        'h' => (int) $hours,
        'm' => (int) $minutes,
        's' => (int) $seconds,
    );
    return $obj;
}



function calDistance($inLatitude,$inLongitude,$outLatitude,$outLongitude, $unit) {
	if(empty($inLatitude) || empty($inLongitude) ||empty($outLatitude) ||empty($outLongitude))
            return 0;
        $url = "http://maps.googleapis.com/maps/api/directions/json?origin=$inLatitude,$inLongitude&destination=$outLatitude,$outLongitude&sensor=false";
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $url);
        $jsonResponse = curl_exec($c);
        curl_close($c);

        $dataset = json_decode($jsonResponse);
        if(!$dataset)
            return 0;
        if(!isset($dataset->routes[0]->legs[0]->distance->value))
            return 0;
        $distance = $dataset->routes[0]->legs[0]->distance->value;
		if ($unit == "K") {
        	return round(($distance/1000),2);    		//kilometer
		} else if($unit == "M") {
			return round(($distance*0.000621371),2);  //miles
		} else {
			return round($distance,2);  			//meter
		}
}
?>