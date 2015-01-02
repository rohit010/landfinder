<?php

/**
 * This is the model class for table "properties".
 *
 * The followings are the available columns in table 'properties':
 * @property integer $id
 * @property integer $prop_id
 * @property integer $property_for
 * @property integer $property_condition
 * @property integer $property_type
 * @property integer $property_sub_type
 * @property integer $state
 * @property integer $city
 * @property string $location
 * @property string $name
 * @property string $area
 * @property string $area_unit
 * @property string $sale_price_cores
 * @property string $sale_price_lacks
 * @property string $sale_price_thousands
 * @property string $total_sale_price
 * @property string $sale_price_rate
 * @property integer $property_rate_show_as
 * @property integer $transaction_type
 * @property integer $possession_status
 * @property string $available_from_month
 * @property string $available_from_year
 * @property string $age_of_construction
 * @property string $description
 * @property string $property_image
 * @property string $property_address
 * @property string $pincode
 * @property string $latitude
 * @property string $longitude
 * @property integer $additional_room_puja
 * @property integer $additional_room_study
 * @property integer $additional_room_store
 * @property integer $additional_room_servent
 * @property string $property_facing
 * @property string $additional_work
 * @property integer $type_of_owner
 * @property integer $no_of_units
 * @property string $other_changes
 * @property string $near_by_hospital
 * @property string $near_by_hospital_distance
 * @property string $near_by_mall_market
 * @property string $near_by_mall_market_distance
 * @property string $near_by_atm_bank
 * @property string $near_by_atm_bank_distance
 * @property string $near_by_airport
 * @property string $near_by_airport_distance
 * @property string $near_by_railway_station
 * @property string $near_by_railway_station_distance
 * @property string $near_by_school
 * @property string $near_by_school_distance
 * @property string $near_by_metro_station
 * @property string $near_by_metro_station_distance
 * @property string $landmark
 * @property integer $prop_owner
 * @property integer $created_time
 * @property integer $created_by
 * @property integer $updated_time
 * @property integer $updated_by
 * @property integer $status
 */
class Properties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'properties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_for, property_condition, property_type, property_sub_type, state, city, location, name, sale_price_cores, sale_price_lacks, sale_price_thousands, property_rate_show_as, transaction_type, possession_status', 'required'),
			array('prop_id, property_for, property_condition, property_type, property_sub_type, state, city, property_rate_show_as, transaction_type, possession_status, additional_room_puja, additional_room_study, additional_room_store, additional_room_servent, type_of_owner, no_of_units, prop_owner, created_time, created_by, updated_time, updated_by, status', 'numerical', 'integerOnly'=>true),
			array('location, name, description, additional_work, other_changes, near_by_hospital, near_by_mall_market, near_by_atm_bank, near_by_airport, near_by_railway_station, near_by_school, near_by_metro_station, landmark', 'length', 'max'=>512),
			array('area, property_facing, near_by_hospital_distance, near_by_mall_market_distance, near_by_atm_bank_distance, near_by_airport_distance, near_by_railway_station_distance, near_by_school_distance, near_by_metro_station_distance', 'length', 'max'=>64),
			array('property_image, latitude, longitude', 'length', 'max'=>256),
			array('sale_price_cores, sale_price_lacks, sale_price_thousands, total_sale_price, sale_price_rate, available_from_month, available_from_year, pincode', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, prop_id, property_for, property_condition, property_type, property_sub_type, state, city, location, name, area, area_unit, sale_price_cores, sale_price_lacks, sale_price_thousands, total_sale_price, sale_price_rate, property_rate_show_as, transaction_type, possession_status, available_from_month, available_from_year, age_of_construction, description, property_image, property_address, pincode, latitude, longitude, additional_room_puja, additional_room_study, additional_room_store, additional_room_servent, property_facing, additional_work, type_of_owner, no_of_units, other_changes, near_by_hospital, near_by_hospital_distance, near_by_mall_market, near_by_mall_market_distance, near_by_atm_bank, near_by_atm_bank_distance, near_by_airport, near_by_airport_distance, near_by_railway_station, near_by_railway_station_distance, near_by_school, near_by_school_distance, near_by_metro_station, near_by_metro_station_distance, landmark, prop_owner, created_time, created_by, updated_time, updated_by, status', 'safe', 'on'=>'search'),
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
			'prop_id' => 'Prop',
			'property_for' => 'Property For',
			'property_condition' => 'Property Condition',
			'property_type' => 'Property Type',
			'property_sub_type' => 'Property Sub Type',
			'state' => 'State',
			'city' => 'City',
			'location' => 'Location',
			'name' => 'Name',
			'area' => 'Area',
			'area_unit' => 'Area Unit',
			'sale_price_cores' => 'Sale Price Cores',
			'sale_price_lacks' => 'Sale Price Lacks',
			'sale_price_thousands' => 'Sale Price Thousands',
			'total_sale_price' => 'Total Sale Price',
			'sale_price_rate' => 'Sale Price Rate',
			'property_rate_show_as' => 'Property Rate Show As',
			'transaction_type' => 'Transaction Type',
			'possession_status' => 'Possession Status',
			'available_from_month' => 'Available From Month',
			'available_from_year' => 'Available From Year',
			'age_of_construction' => 'Age Of Construction',
			'description' => 'Description',
			'property_image' => 'Property Image',
			'property_address' => 'Property Address',
			'pincode' => 'Pincode',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'additional_room_puja' => 'Additional Room Puja',
			'additional_room_study' => 'Additional Room Study',
			'additional_room_store' => 'Additional Room Store',
			'additional_room_servent' => 'Additional Room Servent',
			'property_facing' => 'Property Facing',
			'additional_work' => 'Additional Work',
			'type_of_owner' => 'Type Of Owner',
			'no_of_units' => 'No Of Units',
			'other_changes' => 'Other Changes',
			'near_by_hospital' => 'Near By Hospital',
			'near_by_hospital_distance' => 'Near By Hospital Distance',
			'near_by_mall_market' => 'Near By Mall Market',
			'near_by_mall_market_distance' => 'Near By Mall Market Distance',
			'near_by_atm_bank' => 'Near By Atm Bank',
			'near_by_atm_bank_distance' => 'Near By Atm Bank Distance',
			'near_by_airport' => 'Near By Airport',
			'near_by_airport_distance' => 'Near By Airport Distance',
			'near_by_railway_station' => 'Near By Railway Station',
			'near_by_railway_station_distance' => 'Near By Railway Station Distance',
			'near_by_school' => 'Near By School',
			'near_by_school_distance' => 'Near By School Distance',
			'near_by_metro_station' => 'Near By Metro Station',
			'near_by_metro_station_distance' => 'Near By Metro Station Distance',
			'landmark' => 'Landmark',
			'prop_owner' => 'Prop Owner',
			'created_time' => 'Created Time',
			'created_by' => 'Created By',
			'updated_time' => 'Updated Time',
			'updated_by' => 'Updated By',
			'status' => 'Status',
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
		$criteria->compare('prop_id',$this->prop_id);
		$criteria->compare('property_for',$this->property_for);
		$criteria->compare('property_condition',$this->property_condition);
		$criteria->compare('property_type',$this->property_type);
		$criteria->compare('property_sub_type',$this->property_sub_type);
		$criteria->compare('state',$this->state);
		$criteria->compare('city',$this->city);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('area_unit',$this->area_unit,true);
		$criteria->compare('sale_price_cores',$this->sale_price_cores,true);
		$criteria->compare('sale_price_lacks',$this->sale_price_lacks,true);
		$criteria->compare('sale_price_thousands',$this->sale_price_thousands,true);
		$criteria->compare('total_sale_price',$this->total_sale_price,true);
		$criteria->compare('sale_price_rate',$this->sale_price_rate,true);
		$criteria->compare('property_rate_show_as',$this->property_rate_show_as);
		$criteria->compare('transaction_type',$this->transaction_type);
		$criteria->compare('possession_status',$this->possession_status);
		$criteria->compare('available_from_month',$this->available_from_month,true);
		$criteria->compare('available_from_year',$this->available_from_year,true);
		$criteria->compare('age_of_construction',$this->age_of_construction,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('property_image',$this->property_image,true);
		$criteria->compare('property_address',$this->property_address,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('additional_room_puja',$this->additional_room_puja);
		$criteria->compare('additional_room_study',$this->additional_room_study);
		$criteria->compare('additional_room_store',$this->additional_room_store);
		$criteria->compare('additional_room_servent',$this->additional_room_servent);
		$criteria->compare('property_facing',$this->property_facing,true);
		$criteria->compare('additional_work',$this->additional_work,true);
		$criteria->compare('type_of_owner',$this->type_of_owner);
		$criteria->compare('no_of_units',$this->no_of_units);
		$criteria->compare('other_changes',$this->other_changes,true);
		$criteria->compare('near_by_hospital',$this->near_by_hospital,true);
		$criteria->compare('near_by_hospital_distance',$this->near_by_hospital_distance,true);
		$criteria->compare('near_by_mall_market',$this->near_by_mall_market,true);
		$criteria->compare('near_by_mall_market_distance',$this->near_by_mall_market_distance,true);
		$criteria->compare('near_by_atm_bank',$this->near_by_atm_bank,true);
		$criteria->compare('near_by_atm_bank_distance',$this->near_by_atm_bank_distance,true);
		$criteria->compare('near_by_airport',$this->near_by_airport,true);
		$criteria->compare('near_by_airport_distance',$this->near_by_airport_distance,true);
		$criteria->compare('near_by_railway_station',$this->near_by_railway_station,true);
		$criteria->compare('near_by_railway_station_distance',$this->near_by_railway_station_distance,true);
		$criteria->compare('near_by_school',$this->near_by_school,true);
		$criteria->compare('near_by_school_distance',$this->near_by_school_distance,true);
		$criteria->compare('near_by_metro_station',$this->near_by_metro_station,true);
		$criteria->compare('near_by_metro_station_distance',$this->near_by_metro_station_distance,true);
		$criteria->compare('landmark',$this->landmark,true);
		$criteria->compare('prop_owner',$this->prop_owner);
		$criteria->compare('created_time',$this->created_time);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_time',$this->updated_time);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Properties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
