<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $uid
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $mobile_no
 * @property string $address
 * @property string $user_logo
 * @property integer $status
 * @property string $user_type
 * @property integer $created_time
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, password, address,email, status, user_type, created_time', 'required'),
			array('status, created_time', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email', 'length', 'max'=>60),
			array('password', 'length', 'max'=>32),
			array('email', 'unique'),
			array('mobile_no', 'length', 'max'=>10),
			array('address', 'length', 'max'=>120),
// 			array('user_logo', 'file', 'types'=>'jpg,png,gif', 'maxSize'=>1024, 'tooLarge'=>'File has to be smaller than 1MB'),
			array('user_type', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, first_name, last_name, email, password, mobile_no, address, user_logo, status, user_type, created_time', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'mobile_no' => 'Mobile No',
			'address' => 'Address',
			'user_logo' => 'User Logo',
			'status' => 'Status',
			'user_type' => 'User Type',
			'created_time' => 'Created Time',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('user_logo',$this->user_logo,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('created_time',$this->created_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
