<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(function () {
		  
            $("#dvSource li").draggable({  
				revert: "invalid",
                refreshPositions: true,
                drag: function (event, ui) {
                    ui.helper.addClass("draggable");
                },
                stop: function (event, ui) {
                    ui.helper.removeClass("draggable");
                 }
            }); 
			$("#dvDest").droppable({
			
			    drop: function (event, ui) {
				  if ($("#dvDest li").length == 0) {
				     $("#dvDest li").html("");
                    }
					ui.draggable.addClass("dropped");
                    $("#dvDest").append(ui.draggable);
					id_con = new Array();
					$(this).children('li').each(function(index, element) {
						id=$(this).attr('title');
						});
						
						var person = myFunction(); 
						if(person != false && person != undefined && person !== null){
							id_con.push(id);		
							$.post('ajax',{sort_order:id_con,pesrson_n:person}).done(function(data){});	 
						}else{
						 location.reload();
						
						} }
				});
			 $("#dvDestb").droppable({
			
			    drop: function (event, ui) {
				  if ($("#dvDestb li").length == 0) {
				     $("#dvDestb").html("");
                    }  
					ui.draggable.addClass("dropped");
                    $("#dvDestb").append(ui.draggable);

					id_con = new Array();
					$(this).children('li').each(function(index, element) {
						id=$(this).attr('title');});
						
						var person = myFunction(); 
						if(person != false && person != undefined && person !== null){
							id_con.push(id);		
							$.post('ajaxins',{sort_order:id_con,pesrson_n:person}).done(function(data){});	 
						}else{
						 location.reload();
							} 	}
				});
			 $("#dvDestc").droppable({
			   drop: function (event, ui) {
				  if ($("#dvDestc li").length == 0) {
				     $("#dvDestc").html("");
                    }  
					ui.draggable.addClass("dropped");
                    $("#dvDestc").append(ui.draggable);

					id_con = new Array();
					$(this).children('li').each(function(index, element) {
						id=$(this).attr('title');});
						
						var person = myFunction(); 
						if(person != false && person != undefined && person !== null){
							id_con.push(id);		
							$.post('ajaxsas',{sort_order:id_con,pesrson_n:person}).done(function(data){});	 
						}else{
						 location.reload();
							} 	
					}
				});
			});	
        </script>  
	

<script>
function myFunction() {
    var person = prompt("Please enter your Message");
		
		if(person == ""){
			alert("Please Enter A Message");
		return false;
		}else{
		return person;
		}
	
}
</script>



	
<?php  
/* @var $this LeadController */
/* @var $model Lead */

/* $this->breadcrumbs=array(
	'Leads'=>array('index'),
	'Manage',
); */

$this->menu=array(
	//array('label'=>'List Lead', 'url'=>array('index')),
	array('label'=>'Create Lead', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>                              

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:show">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="box-min">
<div class="box-min-1">
<div id="sortable-list" class="hd-b">Raw</div>
<div id="dvSource" class="box-tx">
<?php if (isset($datamodel)){ ?>
<?php foreach ($datamodel as $datamode) { ?>
<li title=<?php echo $datamode['id'];?>>
<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $datamode['id'];?>">
<div class="min-hd"><?php echo strtoupper($datamode['organisation_name']);?></div></a>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $datamode['first_name'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $datamode['phone_1'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $datamode['email_id'];?> "></div></li>
<?php } } ?>
</div>
</div>

<div class="box-min-2">
<div class="hd-b">Interested</div>
<div id="sortable-list" class="box-tx">
<div id="dvDest">
<?php foreach ($insts as $ins) { ?>
<li class="ui-draggable" title=<?php echo $ins['id'];?>>
<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $ins['id'];?>">
<div class="min-hd"><?php echo strtoupper($ins['organisation_name']);?></div></a>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $ins['first_name'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $ins['phone_1'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $ins['email_id'];?> "></div></li>
<?php } ?>      
</div>
</div>
</div>

<div class="box-min-3">
<div class="hd-b">Not Interested</div>
<div id="sortable-list" class="box-tx">
<div id="dvDestb">
<?php if (isset($datamodel)){ ?>
<?php foreach ($instt as $in) { ?>
<li title=<?php echo $in['id'];?>>
<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $in['id'];?>">
<div class="min-hd"><?php echo strtoupper($in['organisation_name']);?></div></a>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $in['first_name'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $in['phone_1'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $in['email_id'];?> "></div></li>
<?php } } ?>
</div>
</div>
</div>

<div class="box-min-4">
<div class="hd-b">Awaiting feedback</div>
<div id="sortable-list" class="box-tx">
<div id="dvDestc">
<?php foreach ($sads as $sas) { ?>
<li title=<?php echo $sas['id'];?>>
<a class="ajax" href="<?php echo Yii::app()->baseUrl;?>/index.php/lead/<?php echo $sas['id'];?>">
<div class="min-hd"><?php echo strtoupper($sas['organisation_name']);?></div></a>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $sas['first_name'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $sas['phone_1'];?> "></div>
<div class="box-in "><input type="text" readonly="true" id="Lead_priority_sub_source" name="Lead[priority_sub_source]" maxlength="255" size="60" value="<?php echo $sas['email_id'];?> "></div></li>
<?php } ?>
</div>
</div>
</div>
</div>
<?php if(isset($_GET['yt0']) =="Search") {  ?>
<?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lead-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	array('header'=>'S.No',
		'value'=>'++$row',
		),
		'first_name',
		'enquiry_date',
		'enquiry_source',
		'phone_1',
		'email_id',
		'reminder_date',
		'message', 
		
		/* 'priority_sub_source',
		'first_name',
		'middle_name',
		'last_name',
		'country',
		'state',
		'city',
		'gender',
		'address',
		'phone_1',
		'phone_2',
		'phone_3',
		'email_id',
		'reminder_date',
		'reminder_time',
		'message', */
		
		 array(
			'class'=>'CButtonColumn',
		),
		),
)); } else{ } ?>
