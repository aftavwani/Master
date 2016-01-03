<?php

 
/**
 * This is the model class for table "{{propery_details}}".
 *
 * The followings are the available columns in table '{{propery_details}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $status
 * @property string $price
 * @property string $price_tag
 * @property string $file
 * @property string $mls
 * @property string $category
 * @property string $property_type
 * @property string $style
 * @property string $street_address
 * @property string $unit
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $propert_title
 * @property string $description
 */
class PropertyDetails extends CActiveRecord
{
   public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{propery_details}}';
	}
                      
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status,propert_name,owner_email_id, nnn_charges,price, property_type, street_address,   state,property_owner, city,owner_cell_no,owner_phone,owner_last_name,owner_first_name',  'required'),
	
			 array('status, price,propert_name,owner_first_name,owner_email_id, nnn_charges,property_owner,  property_type,  street_address,country', 'length', 'max'=>255),
			 array('owner_email_id','email'),
			 array('owner_cell_no', 'length', 'min'=>10, 'max'=>15),
			 array('owner_cell_no', 'numerical', 'integerOnly'=>true),
			 array('image', 'file','allowEmpty'=>true,'on'=>'update'),
			
			// The following rule is used by search().  
			// @todo Please remove those attributes that should not be searched.
			array('id,image,owner_first_name owner,user_id,nnn_charges, status, propert_name,price,  file, mls, category, property_type, style,owner_last_name, street_address,owner_phone,owner_cell_no, unit,owner_email_id, country,assign_user, state, city,property_owner, propert_title,slug', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',     
			'propert_name' => 'Property Name',
			'status' => 'Status',
			'price' => 'Price',
			'property_type' => 'Property Type',
			'street_address' => 'Street Address',
			'unit' => 'Unit',
			'property_owner' => 'Select Property Owner',
			'country' => 'Country',
			'state' => 'State',
			'city' => 'City',
			'image' => 'Property Image',
			'nnn_charges' => 'NNN-Charges',
			     
			'assign_user'=>'List Of Staff',
			'slug' => 'Slug', 			
			'owner_first_name' => 'First Name',
			'owner_last_name' => 'Last Name',
			'owner_phone' => 'Phone Number',
			'owner_cell_no' => 'Cell Number',
			'owner_email_id' => 'Email Id',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('propert_name',$this->propert_name);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('property_type',$this->property_type,true);
		$criteria->compare('street_address',$this->street_address,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('nnn_charges',$this->nnn_charges,true);
		
		$criteria->compare('assign_user',$this->assign_user,true);		
		$criteria->compare('owner_first_name',$this->owner_first_name,true);
		$criteria->compare('owner_phone',$this->owner_phone,true);
		$criteria->compare('owner_cell_no',$this->owner_cell_no,true);
		$criteria->compare('owner_email_id',$this->owner_email_id,true);		
		$criteria->compare('country',$this->country,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('property_owner',$this->property_owner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProperyDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
