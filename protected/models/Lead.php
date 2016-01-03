<?php

/**
 * This is the model class for table "{{lead_fields}}".
 *
 * The followings are the available columns in table '{{lead_fields}}':
 * @property integer $id
 * @property integer $usesr_id
 * @property string $enquiry_date
 * @property string $enquiry_source
 * @property string $enquiry_sub_source
 * @property string $priority_source
 * @property string $priority_sub_source
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $gender
 * @property string $address
 * @property integer $phone_1
 * @property integer $phone_2
 * @property integer $phone_3
 * @property string $email_id
 * @property string $reminder_date
 * @property integer $reminder_time
 * @property string $message
 */
class Lead extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{lead_fields}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive usesr inputs.
		return array(
			array('retail,first_name, last_name,  phone_1, radio_staus,email_id', 'required'),  
			array('broker_email,email_id','email'),
	
		
			 array('phone_1,phone_2,broker_phone_no,broker_cell_no', 'length',  'max'=>15),

			//array('phone_1,phone_2,broker_cell_no,min_size,max_size, phone_3,broker_phone_no, sec,', 'numerical', 'integerOnly'=>true),
			array('enquiry_source, high_end, priority_source,organisation_name,uses,  first_name,  last_name, country, state, city, gender, address, email_id, message,repersented_by_broker', 'length', 'max'=>255),
			// The following rule is usesd by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,min_size,linked_usesrname,linked_name,linked_lname,linked_company usesr_id,broker_company,broker_firstname, broker_cell_no,high_end,repersented_by_broker, max_size, retail_broker, enquiry_date, organisation_name, uses,broker_email,retailer_webiste, enquiry_source,broker_lastname,  priority_source, priority_sub_source, first_name, sec last_name, country, state, city, gender, address, phone_1,broker_phone_no, phone_2,retail, phone_3,broker_territory, email_id,min_size,max_size, reminder_date, reminder_time, message,radio_staus','safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usesr_id' => 'usesr',
			'enquiry_date' => 'Lead Date',
			'enquiry_source' => 'Source',
			'enquiry_sub_source' => 'Lead Sub Source',
			'priority_source' => 'Priority ',
			'priority_sub_source' => 'Primary Lead',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'radio_staus' => 'Dispaly Name',
			'country' => 'Country',  	                                                                          
			'linked_usesrname' => "LinkedIn's Profile",
			'linked_name' => "Linked's Name",
			'linked_lname' => "Linked's Lname",
			'linked_company' => "Linked's Comapny",
			'property_id'=>'Select Property',
			'state' => 'State',
			'retailer_webiste' => 'Retailer webiste',			
			'city' => 'City',
			'organisation_name' => 'Organisation/Retailer Name',
			'uses' => 'Use',
			'retail' => 'Organisation/Retailer Name',
			
			'repersented_by_broker'=>'Represented By broker',
			"broker_company"=>"Broker's Company",
			"broker_firstname"=>"Broker's First name",
			"broker_lastname"=>"Broker's Last name",
			"broker_territory"=>"Broker's Territory",
			"broker_phone_no"=>"Broker's Phone Number",
			"broker_cell_no"=>"Broker's Cell Number",
			"broker_email"=>"Broker's Email",		
						
			'high_end' => 'End',
			'min_size' => 'Minimum Size',
			'max_size' => 'Maximum Size',
			'retail_broker' => 'Retailer/broker',
			'sec' => 'sec',
			'gender' => 'Gender',
			'address' => 'Address',
			'phone_1' => 'Cell Number',
			'phone_2' => 'Office Phone',
			'phone_3' => 'Fax',
 			'email_id' => 'Email',
			'reminder_date' => 'Reminder Date',
			'reminder_time' => 'Reminder Time',
			'message' => 'Message',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usescase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('usesr_id',$this->usesr_id);
		$criteria->compare('enquiry_date',$this->enquiry_date,true);
		
	
	
		$criteria->compare('property_id',$this->property_id,true);
		$criteria->compare('retail',$this->retail,true);
		$criteria->compare('retailer_webiste',$this->retailer_webiste,true);
		$criteria->compare('radio_staus',$this->radio_staus,true);

		                                 
		$criteria->compare('enquiry_source',$this->enquiry_source,true);
		$criteria->compare('enquiry_sub_source',$this->enquiry_sub_source,true);
		$criteria->compare('priority_source',$this->priority_source,true);
		$criteria->compare('priority_sub_source',$this->priority_sub_source,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('min_size',$this->min_size,true);
		$criteria->compare('max_size',$this->max_size,true);
		$criteria->compare('retail_broker',$this->retail_broker,true);
		$criteria->compare('broker_company',$this->broker_company,true);
		$criteria->compare('repersented_by_broker',$this->repersented_by_broker,true);
		$criteria->compare('broker_firstname',$this->broker_firstname,true);
		$criteria->compare('broker_lastname',$this->broker_lastname,true);
		$criteria->compare('broker_territory',$this->broker_territory,true);
		$criteria->compare('broker_phone_no',$this->broker_phone_no,true);
		$criteria->compare('broker_cell_no',$this->broker_cell_no,true);
		$criteria->compare('broker_email',$this->broker_email,true);
		
		$criteria->compare('organisation_name',$this->organisation_name,true);
		$criteria->compare('uses',$this->uses,true);
		$criteria->compare('high_end',$this->high_end,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone_1',$this->phone_1);
		$criteria->compare('phone_2',$this->phone_2);
		$criteria->compare('phone_3',$this->phone_3);
		$criteria->compare('email_id',$this->email_id,true);
		$criteria->compare('reminder_date',$this->reminder_date,true);
		$criteria->compare('reminder_time',$this->reminder_time);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('sec',$this->sec,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lead the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
