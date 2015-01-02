<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $uid
 * @property string $full_name
 * @property string $company_name
 * @property string $email
 * @property string $password
 * @property string $country_code
 * @property string $mobile_no
 * @property string $area_code
 * @property integer $phone_no
 * @property string $address
 * @property integer $city_id
 * @property string $company_logo
 * @property string $website_url
 * @property string $about_user
 * @property integer $operating_from
 * @property integer $status
 * @property integer $listing_flag
 * @property integer $priority
 * @property string $user_type
 * @property integer $created_by
 * @property integer $created_time
 * @property integer $updated_by
 * @property integer $update_time
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

//			array('website_url', 'url'),
			
			array('address', 'length', 'max'=>500),
			array('company_logo, website_url', 'length', 'max'=>256),
			array('user_type', 'length', 'max'=>3),
			
			array('full_name, password, mobile_no, email, address, city_id, status, user_type, created_by, created_time', 'required'),
			array('phone_no, city_id, operating_from, status, listing_flag, priority, created_by, created_time, updated_by, update_time', 'numerical', 'integerOnly'=>true),
			array('full_name, email', 'length', 'max'=>60),
			array('company_name', 'length', 'max'=>512),
			array('password', 'length', 'max'=>32),
			array('country_code, area_code', 'length', 'max'=>11),
			array('mobile_no', 'length', 'max'=>10),
			array('email', 'email'),
			array('email', 'unique'),
			array('address', 'length', 'max'=>500),
			array('company_logo, website_url', 'length', 'max'=>256),
			array('user_type', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, full_name, company_name, email, password, country_code, mobile_no, area_code, phone_no, address, city_id, company_logo, website_url, about_user, operating_from, status, listing_flag, priority, user_type, created_by, created_time, updated_by, update_time', 'safe', 'on'=>'search'),
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
			'full_name' => 'Full Name',
			'company_name' => 'Company Name',
			'email' => 'Email',
			'password' => 'Password',
			'country_code' => 'Country Code',
			'mobile_no' => 'Mobile No',
			'area_code' => 'Area Code',
			'phone_no' => 'Phone No',
			'address' => 'Address',
			'city_id' => 'City',
			'company_logo' => 'Company Logo',
			'website_url' => 'Website Url',
			'about_user' => 'About User',
			'operating_from' => 'Operating From',
			'status' => 'Status',
			'listing_flag' => 'Listing Flag',
			'priority' => 'Priority',
			'user_type' => 'User Type',
			'created_by' => 'Created By',
			'created_time' => 'Created Time',
			'updated_by' => 'Updated By',
			'update_time' => 'Update Time',
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
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('area_code',$this->area_code,true);
		$criteria->compare('phone_no',$this->phone_no);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('company_logo',$this->company_logo,true);
		$criteria->compare('website_url',$this->website_url,true);
		$criteria->compare('about_user',$this->about_user,true);
		$criteria->compare('operating_from',$this->operating_from);
		$criteria->compare('status',$this->status);
		$criteria->compare('listing_flag',$this->listing_flag);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_time',$this->created_time);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('update_time',$this->update_time);

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
