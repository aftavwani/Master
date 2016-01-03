<h1 class="mid_hed">Export Leads</h1>
<form method="POST" name="lead_filter">
<select class="lim_sel" name = "limit">
<option value="100">100</option>
<option value="200">200</option>
<option value="300">300</option>
<option value="400">400</option>
<option value="500">500</option>
<option value="1000">1000</option>
</select>
<input type="submit" class="main-but" name="Filter" value="filter">
</form>

<?php 

if(isset($_POST['Filter'])=='filter'){
	Yii::app()->Session['datepick'] = $_POST['limit'];
	
	$lead = Lead::Model()->findAllByAttributes(array(),array(
    'order' => 'id desc',
    'limit' => Yii::app()->Session['datepick'],
  
)); 
}
else {

	$lead = Lead::Model()->findAll(); 

}
 ?>


		<span class="excel">
			<a href="<?php echo Yii::app()->baseurl;?>/lead/generateExcel"><span style="color: #333333;font-size:17px;font-weight:bold;font: bold 11px Arial;background-color: #EEEEEE;padding: 2px 6px 2px 6px;border-top: 1px solid #CCCCCC;border-right: 1px solid #333333;border-bottom: 1px solid #333333;border-left: 1px solid #CCCCCC;">Save as Excel</span></a></span>
<table class="tab">
	<tr>   
		<th>S.NO</th>
		<th>Name</th>
			
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone No</th>
		<th>Email Id</th>
		<th>Title</th>
		<th>High End</th>
		<th>Min Size</th>
		<th>Max Size</th>	    
	</tr> 
	<?php $k=1; foreach ($lead as $data) {?>
	<tr>
		<td> <?php echo  $k++; ?></td>
		<td><?php echo $data['retail']; ?></td>
	
		<td><?php echo $data['first_name']; ?></td>
		<td><?php echo $data['last_name']; ?></td>
		<td><?php echo $data['phone_1']; ?></td>
		<td><?php echo $data['email_id']; ?></td>
		<td><?php echo $data['title']; ?></td>
		<td><?php echo $data['high_end']; ?></td>
		<td><?php echo $data['min_size']; ?></td>
		<td><?php echo $data['max_size']; ?></td>	
	</tr>
	<?php } ?>
</table>