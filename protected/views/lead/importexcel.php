<h1>Import Results</h1>
<?php

ini_set("display_errors",0);
require_once 'excel_reader2.php';
$uploadedStatus = 0;
if ( isset($_POST["submit"]) ) {
if ( isset($_FILES["file"])) {
//if there was an error uploading the file
if ($_FILES["file"]["error"] > 0) {

echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else {
if (file_exists($_FILES["file"]["name"])) {
unlink($_FILES["file"]["name"]);
}
$storagename = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
$uploadedStatus = 1;
}
} else {
echo "No file selected <br />";
}

$data = new Spreadsheet_Excel_Reader($_FILES['file']['name']);

 /* echo "<pre>"; print_r($data->sheets); die; */
  
$html="<table border='1'>";

for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
	{
		
		for($j=1;$j<=count($data->sheets[$i]['cells']);$j++) // loop used to get each row of the sheet
		{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i]['cells'][$j]);$k++) // This loop is created to get data in a table format.
			{
					
				/* $html.="<td>";
				
				$html.=$data->sheets[$i]['cells'][$j][$k];
				
				$html.="</td>"; */
			}
			 /* $data->sheets[$i]['cells'][$j][1]; */
			
				
				

				if(!empty($data->sheets[$i]['cells'][$j][1])){
					$lead_name = mysql_escape_string ($data->sheets[$i]['cells'][$j][1]); 
					}
						else{ $lead_name = ' ';  }
						
				if(empty ($data->sheets[$i]['cells'][$j][5]))
				{?>
				<img src="<?php echo Yii::app()->baseurl;?>/images/cross.png">
				<?php echo $lead_name."are failed to upload first name are required </br>";
				continue;
				}
				else{ ?>
				 
					<img src="<?php echo Yii::app()->baseurl;?>/images/tick.png">
					<?php
				echo $lead_name."are Successfully upload  </br>";
														
				if(!empty($data->sheets[$i]['cells'][$j][2])){
				$email =	mysql_escape_string( $data->sheets[$i]['cells'][$j][2]); }
						else{ $email = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][3])){
				$test1 =	mysql_escape_string ( $data->sheets[$i]['cells'][$j][3]); }
						else{ $test1 = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][4])){
					$test2 =	mysql_escape_string ( $data->sheets[$i]['cells'][$j][4]); }
						else{ $test2 = ' ';  }			
				if(!empty($data->sheets[$i]['cells'][$j][5])){
					$test3 = mysql_escape_string ( $data->sheets[$i]['cells'][$j][5]); }
						else{ $test3 = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][6])){
					$test4 = mysql_escape_string ( $data->sheets[$i]['cells'][$j][6]); }
						else{ $test4 = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][7])){
					$test5 = mysql_escape_string ( $data->sheets[$i]['cells'][$j][7]); }
						else{ $test5 = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][8])){
					$test6 = mysql_escape_string( $data->sheets[$i]['cells'][$j][8]); }
						else{ $test6 = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][9])){
					$test7 = mysql_escape_string( $data->sheets[$i]['cells'][$j][9]); }
						else{ $test7 = ' ';  }
				if(!empty($data->sheets[$i]['cells'][$j][10])){
					$test8 = mysql_escape_string( $data->sheets[$i]['cells'][$j][10]); }
						else{ $test8 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][11])){
					$test9 = mysql_escape_string( $data->sheets[$i]['cells'][$j][11]); }
						else{ $test9 = ' ';  }		
				if(!empty($data->sheets[$i]['cells'][$j][12])){
					$test10 = mysql_escape_string( $data->sheets[$i]['cells'][$j][12]); }
						else{ $test10 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][13])){
					$test11 = mysql_escape_string( $data->sheets[$i]['cells'][$j][13]); }
						else{ $test11 = ' ';  }			
				if(!empty($data->sheets[$i]['cells'][$j][14])){
					$test12 = mysql_escape_string( $data->sheets[$i]['cells'][$j][14]); }
						else{ $test12 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][15])){
					$test13 = mysql_escape_string( $data->sheets[$i]['cells'][$j][15]); }
						else{ $test13 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][16])){
					$test14 = mysql_escape_string( $data->sheets[$i]['cells'][$j][16]); }
						else{ $test14 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][17])){
					$test15 = mysql_escape_string( $data->sheets[$i]['cells'][$j][17]); }
						else{ $test15 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][18])){
					$test16 = mysql_escape_string( $data->sheets[$i]['cells'][$j][18]); }
						else{ $test16 = ' ';  }		
				if(!empty($data->sheets[$i]['cells'][$j][19])){
					$test17 = mysql_escape_string( $data->sheets[$i]['cells'][$j][19]); }
						else{ $test17 = ' ';  }		
				if(!empty($data->sheets[$i]['cells'][$j][20])){
					$test18 = mysql_escape_string ( $data->sheets[$i]['cells'][$j][20]); }
						else{ $test18 = ' ';  }		
				if(!empty($data->sheets[$i]['cells'][$j][21])){
					$test19 = mysql_escape_string( $data->sheets[$i]['cells'][$j][21]); }
						else{ $test19 = ' ';  }		
				if(!empty($data->sheets[$i]['cells'][$j][22])){
					$test20 = mysql_escape_string( $data->sheets[$i]['cells'][$j][22]); }
						else{ $test20 = ' ';  }	
				if(!empty($data->sheets[$i]['cells'][$j][23])){
					$test21 = mysql_escape_string( $data->sheets[$i]['cells'][$j][23]); }
						else{ $test21 = ' ';  }				
					$status = 1;
					$date = date('y-m-d');
		 /* 	$result = Yii::app()->db->createCommand("INSERT INTO `tbl_lead_fields`(`retailer`, `use`, `retailer_webiste`, `tenant _rep`, `first_name`, `last_name`, `phone_1`, `phone_2`, `email_id`, `title`, `high_end`, `min_size`, `max_size`, `state`, `message`, `repersented_by_broker`, `broker_firstname`, `broker_lastname`, `broker_phone_no`, `broker_cell_no`, `broker_email`, `broker_company`, `broker_territory`, `status`) VALUES ('".$name."', '".$email."', '".$test1."', '".$test2."', '".$test3."', '".$test4."', '".$test5."', '".$test6."', '".$test7."', '".$test8."', '".$test9."', '".$test10."', '".$test11."', '".$test12."', '".$test13."', '".$test14."', '".$test15."', '".$test16."', '".$test17."', '".$test18."', '".$test19."', '".$test20."', '".$test21."','".$status."')")->execute();  */
		 
		 $result = Yii::app()->db->createCommand("INSERT INTO `tbl_lead_fields`(`uses`, `retailer_webiste`,`retail`, `tenant _rep`, `first_name`, `last_name`, `phone_1`, `phone_2`, `email_id`, `title`, `high_end`, `min_size`, `max_size`, `state`, `message`, `repersented_by_broker`, `broker_firstname`, `broker_lastname`, `broker_phone_no`, `broker_cell_no`, `broker_email`, `broker_company`, `broker_territory`, `status`,create_at) VALUES ('".$email."', '".$test1."','".$lead_name."', '".$test2."', '".$test3."', '".$test4."', '".$test5."', '".$test6."', '".$test7."', '".$test8."', '".$test9."', '".$test10."', '".$test11."', '".$test12."', '".$test13."', '".$test14."', '".$test15."', '".$test16."', '".$test17."', '".$test18."', '".$test19."', '".$test20."', '".$test21."','".$status."','".$date."')")->execute(); 
			
			
			
			$html.="</tr>";
							}
							}
						}
					}
			/* echo '<script type="text/javascript">'; 
			echo 'alert("Successfully Imported");'; 
			echo 'window.location.href ="admin"';
			echo '</script>';  */
		}  
		

?>
<a class="main-link" href="<?php echo Yii::app()->baseurl;?>/lead/admin">OK</a>