<?php if(isset($_POST['dvSource']) && !empty($_POST['dvSource']))  {
		alert('hello');
		$ids = $_POST['dvSource'];
		foreach($ids as $index=>$id) {
		$id = (int) $id;
		if($id != '') {
			$query = 'UPDATE `tbl_users` SET `status` = '.($index + 1).' WHERE `id` = '.$id;
			$result = mysql_query($query) or die(mysql_error().': '.$query);
		}
		}exit;
	} ?>