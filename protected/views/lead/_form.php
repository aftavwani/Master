
<?php

/* @var $this LeadController */
/* @var $model Lead */
/* @var $form CActiveForm */
?>



<h1 class="mid_hed">New Leads</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lead-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	                              

	<?php echo $form->errorSummary($model); ?>

	        
    <div class="proper-lft">
	     <div class="txt-log"><?php echo $form->labelEx($model,'enquiry_date'); ?></div>
		 <div class="txt-box"><?php  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'model'=>$model,
			'name'=>'enquiry_date',
			'value'=>$model->enquiry_date,   
			'options'=>array(
			     'minDate'=>0,
					'dateFormat' => 'yy-mm-dd',
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;color:#000;',
			),
		)); ?>
		</div>
		
		<?php //echo $form->error($model,'enquiry_date'); ?>
	</div>
	
	   
<!--	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'property_id'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'property_id', CHtml::listData(PropertyDetails::model()->findAll(), 'id', 'propert_name'), array('empty'=>'--Select Source--'));  ?> 
		<?php //echo $form->error($model,'enquiry_source'); ?></div>
	</div>--->
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'enquiry_source'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'enquiry_source', CHtml::listData(Source::model()->findAll(), 's_tite', 's_tite'), array('empty'=>'--Select Source--'));  ?> 
		<?php //echo $form->error($model,'enquiry_source'); ?></div>
	</div>                                                                                                           
                                                                                                                      
																												
		<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'priority_source'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'priority_source', CHtml::listData(Priority::model()->	findAllByattributes(array('p_parent'=>0,'p_status'=>1)), 'p_id', 'p_title'), array('empty'=>'--Select Priority--'));  ?> </div>
		
		<?php //echo $form->error($model,'priority_source'); ?>
	</div>
  
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'priority_sub_source'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'priority_sub_source',array("Retailer"=>"Retailer","Broker"=>"Broker"), array('empty'=>'--Select Priority--'));  ?> </div>
			<?php //echo $form->error($model,'priority_sub_source'); ?>
	</div>

	<h1 class="mid_hed">Lead Information Details</h1>
	
	
                                

	<div class="proper-lft">
		 <div class="txt-log"><?php echo $form->labelEx($model,'retail'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'retail',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'first_name'); ?>
	</div>	
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'min_size'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'min_size',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>	
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'high_end'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'high_end',array('HighEnd'=>'High End','Nothighend'=>'Not Hign End')); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
   	
	<div class="proper-rft">
		<div class="txt-log"><?php echo $form->labelEx($model,'max_size'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'max_size',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'uses'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'uses',array('Accessories'=>'Accessories','Accessories'=>'Accessories','Apparel - High-end'=>'Apparel - High-end','Apparel - Middle'=>'Apparel - Middle','Apparel - Specialty'=>'Apparel - Specialty','Apparel - Value'=>'Apparel - Value','Arts/Crafts/Fabrics'=>'Arts/Crafts/Fabrics','Auto Parts'=>'Auto Parts','Auto Repair'=>'Auto Repair','Automobiles'=>'Automobiles','Bank'=>'Bank','Beauty Products'=>'Beauty Products','Boating'=>'Boating','Books'=>'Books','Car Rental'=>'Car Rental','Card Shop'=>'Card Shop','Car Wash'=>'Car Wash','Check Cashing'=>'Check Cashing','Childcare'=>'Childcare','Coffee/Tea Shop'=>'Coffee/Tea Shop','Computers'=>'Computers','Consignment'=>'Consignment','Convenience Stores'=>'Convenience Stores','Discount - Big Box'=>'Discount - Big Box','Discount - Smaller Box'=>'Discount - Smaller Box','Dollar Store'=>'Dollar Store','Donation Centers'=>'Donation Centers','Educational (Adult)'=>'Educational (Adult)','Electronics'=>'Electronics','Family Entertainment'=>'Family Entertainment','Fitness - Big Box'=>'Fitness - Big Box','Fitness - Small Box'=>'Fitness - Small Box','Furniture - Big Box'=>'Furniture - Big Box','Furniture - High-end'=>'Furniture - High-end','Furniture - Value'=>'Furniture - Value','Gas - C-store'=>'Gas - C-store','Hair Salon - High-end'=>'Hair Salon - High-end','Hair Salon - Low price'=>'Hair Salon - Low price','Health Store'=>'Health Store','Home Improvement - Big Box'=>'Home Improvement - Big Box','Home Improvement - Small Box'=>'Home Improvement - Small Box','Hotel'=>'Hotel','Houseware'=>'Houseware','Ice Cream/Yogurt Shop/Smoothies'=>'Ice Cream/Yogurt Shop/Smoothies','Jewelry'=>'Jewelry','Laundromat'=>'Laundromat','Liquor Store'=>'Liquor Store','Mattress'=>'Mattress','Medical/Dental/Rehab/Urgent Care'=>'Medical/Dental/Rehab/Urgent Care','Musical Instruments'=>'Musical Instruments','Nail Salon'=>'Nail Salon','Office Supplies'=>'Office Supplies','Optical'=>'Optical','Other'=>'Other','Paper Store'=>'Paper Store','Party Goods'=>'Party Goods','Pet Supplies'=>'Pet Supplies','Pharmacy'=>'Pharmacy','Rent to Own'=>'Rent to Own','Restaurant - QSR'=>'Restaurant - QSR','Restaurant - Sandwich Shop'=>'Restaurant - Sandwich Shop','Restaurant - Sitdown'=>'Restaurant - Sitdown','Shipping'=>'Shipping','Shoes - Highend'=>'Shoes - Highend','Shoes - Value'=>'Shoes - Value','Spa'=>'Spa','Sporting Goods - Big Box'=>'Sporting Goods - Big Box','Sporting Goods - small box'=>'Sporting Goods - small box','Supermarket - Large Format'=>'Supermarket - Large Format','Supermarket - Small Format'=>'Supermarket - Small Format','Technology'=>'Technology','Temporary'=>'Temporary','Theater'=>'Theater','Tires'=>'Tires','Toys'=>'Toys','Wholesale Clubs'=>'Wholesale Clubs','Wireless Store'=>'Wireless Store'),array('empty'=>'--Select--')); ?></div>
		<?php //echo $form->error($model,'first_name'); ?>
	</div>	                                                             
		
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'retail_broker'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'retail_broker',array(''=>'Choose One','retailer'=>'Retailer','broker'=>'Broker')); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
	
	                                     
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'first_name'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'first_name'); ?>
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'address'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'address'); ?>
	</div>


	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'last_name'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'last_name'); ?>
	
	</div>
	
		<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'city'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'city'); ?>
	</div>
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'phone_1'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'phone_1'); ?></div>
		<?php //echo $form->error($model,'phone_1'); ?>
	</div>

	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'state'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'state'); ?>
	</div>
	
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'phone_2'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'phone_2'); ?></div>
		<?php //echo $form->error($model,'phone_2'); ?>
	</div>


	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'country'); ?></div>
		<div class="txt-box"><select name="country">
			<option value="Select">Select Country</option>
			<option value="Afghanistan">Afghanistan</option>
			<option value="Åland Islands">Åland Islands</option>
			<option value="Albania">Albania</option>
			<option value="Algeria">Algeria</option>
			<option value="American Samoa">American Samoa</option>
			<option value="Andorra">Andorra</option>
			<option value="Angola">Angola</option>
			<option value="Anguilla">Anguilla</option>
			<option value="Antarctica">Antarctica</option>
			<option value="Antigua and Barbuda">Antigua and Barbuda</option>
			<option value="Argentina">Argentina</option>
			<option value="Armenia">Armenia</option>
			<option value="Aruba">Aruba</option>
			<option value="Australia">Australia</option>
			<option value="Austria">Austria</option>
			<option value="Azerbaijan">Azerbaijan</option>
			<option value="Bahamas">Bahamas</option>
			<option value="Bahrain">Bahrain</option>
			<option value="Bangladesh">Bangladesh</option>
			<option value="Barbados">Barbados</option>
			<option value="Belarus">Belarus</option>
			<option value="Belgium">Belgium</option>
			<option value="Belize">Belize</option>
			<option value="Benin">Benin</option>
			<option value="Bermuda">Bermuda</option>
			<option value="Bhutan">Bhutan</option>
			<option value="Bolivia">Bolivia</option>
			<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
			<option value="Botswana">Botswana</option>
			<option value="Bouvet Island">Bouvet Island</option>
			<option value="Brazil">Brazil</option>
			<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
			<option value="Brunei Darussalam">Brunei Darussalam</option>
			<option value="Bulgaria">Bulgaria</option>
			<option value="Burkina Faso">Burkina Faso</option>
			<option value="Burundi">Burundi</option>
			<option value="Cambodia">Cambodia</option>
			<option value="Cameroon">Cameroon</option>
			<option value="Canada">Canada</option>
			<option value="Cape Verde">Cape Verde</option>
			<option value="Cayman Islands">Cayman Islands</option>
			<option value="Central African Republic">Central African Republic</option>
			<option value="Chad">Chad</option>
			<option value="Chile">Chile</option>
			<option value="China">China</option>
			<option value="Christmas Island">Christmas Island</option>
			<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
			<option value="Colombia">Colombia</option>
			<option value="Comoros">Comoros</option>
			<option value="Congo">Congo</option>
			<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
			<option value="Cook Islands">Cook Islands</option>
			<option value="Costa Rica">Costa Rica</option>
			<option value="Cote D'ivoire">Cote D'ivoire</option>
			<option value="Croatia">Croatia</option>
			<option value="Cuba">Cuba</option>
			<option value="Cyprus">Cyprus</option>
			<option value="Czech Republic">Czech Republic</option>
			<option value="Denmark">Denmark</option>
			<option value="Djibouti">Djibouti</option>
			<option value="Dominica">Dominica</option>
			<option value="Dominican Republic">Dominican Republic</option>
			<option value="Ecuador">Ecuador</option>
			<option value="Egypt">Egypt</option>
			<option value="El Salvador">El Salvador</option>
			<option value="Equatorial Guinea">Equatorial Guinea</option>
			<option value="Eritrea">Eritrea</option>
			<option value="Estonia">Estonia</option>
			<option value="Ethiopia">Ethiopia</option>
			<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
			<option value="Faroe Islands">Faroe Islands</option>
			<option value="Fiji">Fiji</option>
			<option value="Finland">Finland</option>
			<option value="France">France</option>
			<option value="French Guiana">French Guiana</option>
			<option value="French Polynesia">French Polynesia</option>
			<option value="French Southern Territories">French Southern Territories</option>
			<option value="Gabon">Gabon</option>
			<option value="Gambia">Gambia</option>
			<option value="Georgia">Georgia</option>
			<option value="Germany">Germany</option>
			<option value="Ghana">Ghana</option>
			<option value="Gibraltar">Gibraltar</option>
			<option value="Greece">Greece</option>
			<option value="Greenland">Greenland</option>
			<option value="Grenada">Grenada</option>
			<option value="Guadeloupe">Guadeloupe</option>
			<option value="Guam">Guam</option>
			<option value="Guatemala">Guatemala</option>
			<option value="Guernsey">Guernsey</option>
			<option value="Guinea">Guinea</option>
			<option value="Guinea-bissau">Guinea-bissau</option>
			<option value="Guyana">Guyana</option>
			<option value="Haiti">Haiti</option>
			<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
			<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
			<option value="Honduras">Honduras</option>
			<option value="Hong Kong">Hong Kong</option>
			<option value="Hungary">Hungary</option>
			<option value="Iceland">Iceland</option>
			<option value="India">India</option>
			<option value="Indonesia">Indonesia</option>
			<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
			<option value="Iraq">Iraq</option>
			<option value="Ireland">Ireland</option>
			<option value="Isle of Man">Isle of Man</option>
			<option value="Israel">Israel</option>
			<option value="Italy">Italy</option>
			<option value="Jamaica">Jamaica</option>
			<option value="Japan">Japan</option>
			<option value="Jersey">Jersey</option>
			<option value="Jordan">Jordan</option>
			<option value="Kazakhstan">Kazakhstan</option>
			<option value="Kenya">Kenya</option>
			<option value="Kiribati">Kiribati</option>
			<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
			<option value="Korea, Republic of">Korea, Republic of</option>
			<option value="Kuwait">Kuwait</option>
			<option value="Kyrgyzstan">Kyrgyzstan</option>
			<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
			<option value="Latvia">Latvia</option>
			<option value="Lebanon">Lebanon</option>
			<option value="Lesotho">Lesotho</option>
			<option value="Liberia">Liberia</option>
			<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
			<option value="Liechtenstein">Liechtenstein</option>
			<option value="Lithuania">Lithuania</option>
			<option value="Luxembourg">Luxembourg</option>
			<option value="Macao">Macao</option>
			<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
			<option value="Madagascar">Madagascar</option>
			<option value="Malawi">Malawi</option>
			<option value="Malaysia">Malaysia</option>
			<option value="Maldives">Maldives</option>
			<option value="Mali">Mali</option>
			<option value="Malta">Malta</option>
			<option value="Marshall Islands">Marshall Islands</option>
			<option value="Martinique">Martinique</option>
			<option value="Mauritania">Mauritania</option>
			<option value="Mauritius">Mauritius</option>
			<option value="Mayotte">Mayotte</option>
			<option value="Mexico">Mexico</option>
			<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
			<option value="Moldova, Republic of">Moldova, Republic of</option>
			<option value="Monaco">Monaco</option>
			<option value="Mongolia">Mongolia</option>
			<option value="Montenegro">Montenegro</option>
			<option value="Montserrat">Montserrat</option>
			<option value="Morocco">Morocco</option>
			<option value="Mozambique">Mozambique</option>
			<option value="Myanmar">Myanmar</option>
			<option value="Namibia">Namibia</option>
			<option value="Nauru">Nauru</option>
			<option value="Nepal">Nepal</option>
			<option value="Netherlands">Netherlands</option>
			<option value="Netherlands Antilles">Netherlands Antilles</option>
			<option value="New Caledonia">New Caledonia</option>
			<option value="New Zealand">New Zealand</option>
			<option value="Nicaragua">Nicaragua</option>
			<option value="Niger">Niger</option>
			<option value="Nigeria">Nigeria</option>
			<option value="Niue">Niue</option>
			<option value="Norfolk Island">Norfolk Island</option>
			<option value="Northern Mariana Islands">Northern Mariana Islands</option>
			<option value="Norway">Norway</option>
			<option value="Oman">Oman</option>
			<option value="Pakistan">Pakistan</option>
			<option value="Palau">Palau</option>
			<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
			<option value="Panama">Panama</option>
			<option value="Papua New Guinea">Papua New Guinea</option>
			<option value="Paraguay">Paraguay</option>
			<option value="Peru">Peru</option>
			<option value="Philippines">Philippines</option>
			<option value="Pitcairn">Pitcairn</option>
			<option value="Poland">Poland</option>
			<option value="Portugal">Portugal</option>
			<option value="Puerto Rico">Puerto Rico</option>
			<option value="Qatar">Qatar</option>
			<option value="Reunion">Reunion</option>
			<option value="Romania">Romania</option>
			<option value="Russian Federation">Russian Federation</option>
			<option value="Rwanda">Rwanda</option>
			<option value="Saint Helena">Saint Helena</option>
			<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
			<option value="Saint Lucia">Saint Lucia</option>
			<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
			<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
			<option value="Samoa">Samoa</option>
			<option value="San Marino">San Marino</option>
			<option value="Sao Tome and Principe">Sao Tome and Principe</option>
			<option value="Saudi Arabia">Saudi Arabia</option>
			<option value="Senegal">Senegal</option>
			<option value="Serbia">Serbia</option>
			<option value="Seychelles">Seychelles</option>
			<option value="Sierra Leone">Sierra Leone</option>
			<option value="Singapore">Singapore</option>
			<option value="Slovakia">Slovakia</option>
			<option value="Slovenia">Slovenia</option>
			<option value="Solomon Islands">Solomon Islands</option>
			<option value="Somalia">Somalia</option>
			<option value="South Africa">South Africa</option>
			<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
			<option value="Spain">Spain</option>
			<option value="Sri Lanka">Sri Lanka</option>
			<option value="Sudan">Sudan</option>
			<option value="Suriname">Suriname</option>
			<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
			<option value="Swaziland">Swaziland</option>
			<option value="Sweden">Sweden</option>
			<option value="Switzerland">Switzerland</option>
			<option value="Syrian Arab Republic">Syrian Arab Republic</option>
			<option value="Taiwan, Province of China">Taiwan, Province of China</option>
			<option value="Tajikistan">Tajikistan</option>
			<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
			<option value="Thailand">Thailand</option>
			<option value="Timor-leste">Timor-leste</option>
			<option value="Togo">Togo</option>
			<option value="Tokelau">Tokelau</option>
			<option value="Tonga">Tonga</option>
			<option value="Trinidad and Tobago">Trinidad and Tobago</option>
			<option value="Tunisia">Tunisia</option>
			<option value="Turkey">Turkey</option>
			<option value="Turkmenistan">Turkmenistan</option>
			<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
			<option value="Tuvalu">Tuvalu</option>
			<option value="Uganda">Uganda</option>
			<option value="Ukraine">Ukraine</option>
			<option value="United Arab Emirates">United Arab Emirates</option>
			<option value="United Kingdom">United Kingdom</option>
			<option value="United States">United States</option>
			<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
			<option value="Uruguay">Uruguay</option>
			<option value="Uzbekistan">Uzbekistan</option>
			<option value="Vanuatu">Vanuatu</option>
			<option value="Venezuela">Venezuela</option>
			<option value="Viet Nam">Viet Nam</option>
			<option value="Virgin Islands, British">Virgin Islands, British</option>
			<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
			<option value="Wallis and Futuna">Wallis and Futuna</option>
			<option value="Western Sahara">Western Sahara</option>
			<option value="Yemen">Yemen</option>
			<option value="Zambia">Zambia</option>
			<option value="Zimbabwe">Zimbabwe</option>
		</select></div>
	<?php //echo $form->error($model,'country'); ?>
	</div>
  
  <div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'email_id'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'email_id',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'retailer_webiste'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'retailer_webiste',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'linked_username'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'linked_username',array('size'=>60,'maxlength'=>255)); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'radio_staus'); ?></div>
		<div class="txt-box"><?php echo $form->radioButtonList($model, 'radio_staus', array('1'=>'Broker', '2'=>'Retailer')); ?></div>
		<?php //echo $form->error($model,'email_id'); ?>
	</div>
	
	
	
	<!--<h1 class="mid_hed">Reminders</h1> 
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'reminder_date'); ?></div>
		<div class="txt-box"><?php  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'model'=>$model,
			'name'=>'reminder_date',
			'value'=>$model->reminder_date,   
			'options'=>array(
				'minDate'=>0,
				'dateFormat' => 'yy-mm-dd',
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;color:#000;',
			),
		)); ?></div>
	
		<?php //echo $form->error($model,'reminder_date'); ?>
	</div>

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'reminder_time'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'reminder_time',array(''=>'H','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12',),array('class'=>'sel_id')); ?>
		<?php //echo $form->error($model,'reminder_time'); ?>
		
	
		<?php echo $form->dropDownList($model,'sec',array(''=>'S','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'31','32'=>'32','33'=>'33','34'=>'34','35'=>'35','36'=>'36','37'=>'37','38'=>'38','39'=>'39','40'=>'40','41'=>'41','42'=>'42','43'=>'43','44'=>'44','45'=>'45','46'=>'46','47'=>'47','48'=>'48','49'=>'49','50'=>'50','51'=>'51','52'=>'52','53'=>'53','54'=>'54','55'=>'55','56'=>'56','57'=>'57','58'=>'58','59'=>'59','60'=>'60'),array('class'=>'sel_id')); ?></div>
		<?php //echo $form->error($model,'sec'); ?>
	</div>
    
	<div class="row">
		<div class="txt-log"><?php echo $form->labelEx($model,'message'); ?></div>
		<div class="txt-box"><?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>78)); ?></div>
		<?php //echo $form->error($model,'message'); ?>   
	</div>-->
	
	
	
	<h1 class="mid_hed">Broker Details</h1>
	

	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'repersented_by_broker'); ?></div>
		<div class="txt-box"><?php echo $form->dropDownList($model,'repersented_by_broker',array(''=>'--Select--','yes'=>'Yes','no'=>'No'),array("class"=>"broker_opt")); ?></div>
		<?php //echo $form->error($model,'message'); ?>   
	</div>
<div id="war">
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_company'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_company',array('id'=>'broker_com','size'=>60,'maxlength'=>255)); ?>
		
		</div>
		<?php //echo $form->error($model,'message'); ?>   
		
	</div>
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_firstname'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_firstname',array('id'=>'broker_fn','size'=>60,'maxlength'=>255)); ?></div>
		
		<?php //echo $form->error($model,'message'); ?>  
		
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_lastname'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_lastname',array('id'=>'broker_ln','size'=>60,'maxlength'=>255)); ?></div>
		
		<?php //echo $form->error($model,'message'); ?>   
	</div>
	
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_territory'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_territory',array('id'=>'broker_t','size'=>60,'maxlength'=>255)); ?></div>
	
		<?php //echo $form->error($model,'message'); ?>   
	</div>
	
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_phone_no'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_phone_no',array('id'=>'broker_pn','size'=>60,'maxlength'=>255)); ?></div>
				
		<?php //echo $form->error($model,'message'); ?>   
	</div>
	<div class="proper-lft">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_cell_no'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_cell_no',array('id'=>'broker_cno','size'=>60,'maxlength'=>255)); ?></div>
		
		<?php //echo $form->error($model,'message'); ?>   
	</div>
	<div class="proper-rgt">
		<div class="txt-log"><?php echo $form->labelEx($model,'broker_email'); ?></div>
		<div class="txt-box"><?php echo $form->textField($model,'broker_email',array('id'=>'broker_em','size'=>60,'maxlength'=>255)); ?></div>
	
		<?php //echo $form->error($model,'message'); ?>   
	</div>
	</div>	

	<!--<h1 class="mid_hed">Assign's User</h1>

	<div class="row">                                                                                                                   
	<?php echo $form->checkBoxList($model,'user_id',CHtml::listData(User::model()->findallByattributes(array('superuser'=>2)),'id','username')); ?>
	<?php //echo $form->error($model,'user_id'); ?>
	</div> -->
                   

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'main-buts ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->