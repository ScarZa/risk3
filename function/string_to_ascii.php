<?php
function string_to_ascii($string)
{
    $ascii = NULL;
    $sub_str = str_split($string);
    for ($i = 0; $i < count($sub_str); $i++) 
    { 
    	$ascii .= ord($sub_str[$i]); 
    }
    
    return($ascii);
}
?>