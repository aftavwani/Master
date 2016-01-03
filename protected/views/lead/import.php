<div class="lead_box">
<table width="600" class="ads">
<form action="<?php echo Yii::app()->baseurl;?>/lead/importexcel" method="post" enctype="multipart/form-data">

<td width="50%" style="font:bold 12px tahoma, arial, sans-serif; text-align:right; border-bottom:1px solid #eee; padding:5px 10px 5px 0px; border-right:1px solid #eee;">Select file</td>
<td width="50%" style="border-bottom:1px solid #eee; padding:5px;"><input type="file" name="file"  id="file" Required /></td>
</tr>
<tr>
<td style="font:bold 12px tahoma, arial, sans-serif; text-align:right; padding:5px 10px 5px 0px; border-right:1px solid #eee;">Submit</td>
<td width="50%" style=" padding:5px;"><input type="submit" value ="Import" name="submit" /></td>
</tr>
</table>
</div>