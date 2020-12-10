<?php  
//key value from Json
function kvfj($json, $key)
{
	if($json == null){
		return false;
	}
	else{
		$json = json_decode($json, true);
		if(array_key_exists($key, $json)){
			return $json[$key];
		}
		else{
			return false;
		}
	}
}