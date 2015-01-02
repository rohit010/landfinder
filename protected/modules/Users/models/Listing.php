<?php

/**
 * This is the model class for table "listing".
 *
 * The followings are the available columns in table 'listing':
 * @property integer $list_id
 * @property integer $category_id
 * @property integer $subcategory_id
 * @property integer $property_subcategory_type
 * @property string $property_type
 * @property string $land_location
 * @property string $property_title
 * @property string $property_approved
 * @property string $name
 * @property string $area
 * @property string $area_unit
 * @property string $bathroom
 * @property string $total_floors
 * @property string $bedroom
 * @property integer $state
 * @property integer $city
 * @property string $floor
 * @property string $facing
 * @property string $furnished
 * @property string $age_construction
 * @property string $lease_period
 * @property string $price
 * @property string $rent
 * @property string $rate
 * @property string $description
 * @property string $amenities
 * @property string $image_locator
 * @property string $possession
 * @property string $address
 * @property integer $views
 * @property integer $uid
 * @property integer $status
 * @property integer $posted_date
 * @property integer $aproved_date
 */
class Listing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'listing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_subcategory_type,subcategory_id, property_type, property_title, property_approved, name, area, area_unit, state, city, land_location, uid, status,description', 'required'),
			array('category_id, subcategory_id, property_subcategory_type, state, city, views, uid, status, posted_date, aproved_date', 'numerical', 'integerOnly'=>true),
			array('property_type, area, floor, facing, furnished, lease_period, rent, rate', 'length', 'max'=>30),
			array('land_location', 'length', 'max'=>65),
			array('property_title', 'length', 'max'=>200),
			array('property_approved', 'length', 'max'=>150),
			array('name', 'length', 'max'=>100),
			array('area_unit, possession', 'length', 'max'=>20),
			array('bathroom, total_floors, bedroom', 'length', 'max'=>10),
			array('age_construction, price', 'length', 'max'=>40),
			array('image_locator', 'length', 'max'=>300),
			array('address', 'length', 'max'=>700),
			array('description, amenities', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('list_id, category_id, subcategory_id, property_subcategory_type, property_type, land_location, property_title, property_approved, name, area, area_unit, bathroom, total_floors, bedroom, state, city, floor, facing, furnished, age_construction, lease_period, price, rent, rate, description, amenities, image_locator, possession, address, views, uid, status, posted_date, aproved_date', 'safe', 'on'=>'search'),
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
			'list_id' => 'List',
			'category_id' => 'Category',
			'subcategory_id' => 'Subcategory',
			'property_subcategory_type' => 'Property Subcategory Type',
			'property_type' => 'Property Type',
			'land_location' => 'Land Location',
			'property_title' => 'Property Title',
			'property_approved' => 'Property Approved',
			'name' => 'Name',
			'area' => 'Area',
			'area_unit' => 'Area Unit',
			'bathroom' => 'Bathroom',
			'total_floors' => 'Total Floors',
			'bedroom' => 'Bedroom',
			'state' => 'State',
			'city' => 'City',
			'floor' => 'Floor',
			'facing' => 'Facing',
			'furnished' => 'Furnished',
			'age_construction' => 'Age Construction',
			'lease_period' => 'Lease Period',
			'price' => 'Price',
			'rent' => 'Rent',
			'rate' => 'Rate',
			'description' => 'Description',
			'amenities' => 'Amenities',
			'image_locator' => 'Image Locator',
			'possession' => 'Possession',
			'address' => 'Address',
			'views' => 'Views',
			'uid' => 'Uid',
			'status' => 'Status',
			'posted_date' => 'Posted Date',
			'aproved_date' => 'Aproved Date',
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

		$criteria->compare('list_id',$this->list_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('subcategory_id',$this->subcategory_id);
		$criteria->compare('property_subcategory_type',$this->property_subcategory_type);
		$criteria->compare('property_type',$this->property_type,true);
		$criteria->compare('land_location',$this->land_location,true);
		$criteria->compare('property_title',$this->property_title,true);
		$criteria->compare('property_approved',$this->property_approved,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('area_unit',$this->area_unit,true);
		$criteria->compare('bathroom',$this->bathroom,true);
		$criteria->compare('total_floors',$this->total_floors,true);
		$criteria->compare('bedroom',$this->bedroom,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('city',$this->city);
		$criteria->compare('floor',$this->floor,true);
		$criteria->compare('facing',$this->facing,true);
		$criteria->compare('furnished',$this->furnished,true);
		$criteria->compare('age_construction',$this->age_construction,true);
		$criteria->compare('lease_period',$this->lease_period,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('rent',$this->rent,true);
		$criteria->compare('rate',$this->rate,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amenities',$this->amenities,true);
		$criteria->compare('image_locator',$this->image_locator,true);
		$criteria->compare('possession',$this->possession,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('status',$this->status);
		$criteria->compare('posted_date',$this->posted_date);
		$criteria->compare('aproved_date',$this->aproved_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Listing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
