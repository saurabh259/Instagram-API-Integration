<?php

/**
 * Instagram PHP implementation
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

session_start();

if (!isset($_SESSION['AccessToken'])) {
	header('Location: redirect.php?op=getauth');
	die();
}
else {
	
	///Welcome message to the user links to all other files
	//echo "Well Come ".$_SESSION['FullName']."<br> Your Profile Picture:<img src='".$_SESSION['Thumbnail']."'>";
	
	include_once 'header.php';
	include_once 'leftmenu.php';
?>
	
	
	<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
        	<br><h2>YOUR POSTS!</h2><br>
    <?php    
            function processURL($url)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
        ));
 
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
 

    $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.$_SESSION['AccessToken'].'&count=1234';
 	
    $all_result  = processURL($url);
    $decoded_results = json_decode($all_result, true);
 
//      echo '<pre>';
//      print_r($decoded_results);
//       exit;
 
    //Now parse through the $results array to display your results... 
    foreach($decoded_results['data'] as $item){
        $image_link = $item['images']['thumbnail']['url'];
        echo '<img src="'.$image_link.'" />';
    }
}
       ?>  
<p>&nbsp;</p>
        </div>
	
	
	

