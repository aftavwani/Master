<?php

/**
 * This is the model class for table "{{priority}}".
 *
 * The followings are the available columns in table '{{priority}}':
 * @property integer $p_id
 * @property string $p_title
 * @property string $p_desc
 * @property string $p_status
 * @property string $p_created
 */
class Priority extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{priority}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_title, p_desc', 'required'),
			array('p_title', 'length', 'max'=>255),
			array('p_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('p_id, p_title, p_desc, p_status, p_created,p_parent', 'safe', 'on'=>'search'),
			array('p_id, p_title, p_desc, p_status, p_created,p_parent', 'safe'),
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
			'p_id' => 'ID',
			'p_title' => 'Sub Priority',
			'p_parent' => 'Parent Priority',
			'p_desc' => 'Description',
			'p_status' => 'Status',
			'p_created' => 'Created',
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

		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('p_title',$this->p_title,true);
		$criteria->compare('p_desc',$this->p_desc,true);
		$criteria->compare('p_status',$this->p_status,true);
		$criteria->compare('p_created',$this->p_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Priority the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getPriorityParent($data)
	{
		if($data->p_parent != 0) {
			$ret = Priority::find(array('condition'=>'p_id='.$data->p_parent));
			return $ret->p_title;
		} else {
			return 'N/A';
		}
	}
}
