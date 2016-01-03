<?php

/**
 * This is the model class for table "{{source}}".
 *
 * The followings are the available columns in table '{{source}}':
 * @property integer $s_id
 * @property string $s_tite
 * @property string $s_desc
 * @property string $s_created
 * @property string $s_modified
 */
class Source extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{source}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_tite, s_desc', 'required'),
			array('s_tite', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('s_id, s_tite, s_desc', 'safe', 'on'=>'search'),
			array('s_id, s_tite, s_desc', 'safe'),
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
			's_id' => 'S',
			's_tite' => 'Title',
			's_desc' => 'Description',
			's_created' => 'S Created',
			's_modified' => 'S Modified',
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

		$criteria->compare('s_id',$this->s_id);
		$criteria->compare('s_tite',$this->s_tite,true);
		$criteria->compare('s_desc',$this->s_desc,true);
		$criteria->compare('s_created',$this->s_created,true);
		$criteria->compare('s_modified',$this->s_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Source the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
