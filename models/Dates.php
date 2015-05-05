<?php

/**
 * This is the model class for table "{{booktour_dates}}".
 *
 * The followings are the available columns in table '{{booktour_dates}}':
 * @property integer $id
 * @property string $date_reservation
 * @property string $opening_booking
 * @property string $closing_booking
 * @property integer $maximum_quantity
 * @property integer $status
 */
class Dates extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{booktour_dates}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maximum_quantity, status', 'numerical', 'integerOnly'=>true),
			array('date_reservation, opening_booking, closing_booking', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_reservation, opening_booking, closing_booking, maximum_quantity, status', 'safe', 'on'=>'search'),
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
			'id'               => Yii::t('BooktourModule.booktour', 'ID'),
			'date_reservation' => Yii::t('BooktourModule.booktour', 'Date Reservation'),
			'opening_booking'  => Yii::t('BooktourModule.booktour', 'Opening Booking'),
			'closing_booking'  => Yii::t('BooktourModule.booktour', 'Closing Booking'),
			'maximum_quantity' => Yii::t('BooktourModule.booktour', 'Maximum Quantity'),
			'status'           => Yii::t('BooktourModule.booktour', 'Status'),
		);
	}	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeDescriptions()
	{
		return array(
			'id'               => Yii::t('BooktourModule.booktour', 'ID'),
			'date_reservation' => Yii::t('BooktourModule.booktour', 'Выберите дату и время, которую вы хотите открыть для бронирования'),
			'opening_booking'  => Yii::t('BooktourModule.booktour', 'Выберите дату и время начала открытия бранирования для пользователей'),
			'closing_booking'  => Yii::t('BooktourModule.booktour', 'Выберите дату и время окончания бранирования для пользователей'),
			'maximum_quantity' => Yii::t('BooktourModule.booktour', 'Введите максимальное количество человек, которые могут пойти на экскурсию'),
			'status'           => Yii::t('BooktourModule.booktour', 'Выберите статус даты бронирования'),
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
		$criteria->compare('date_reservation',$this->date_reservation,true);
		$criteria->compare('opening_booking',$this->opening_booking,true);
		$criteria->compare('closing_booking',$this->closing_booking,true);
		$criteria->compare('maximum_quantity',$this->maximum_quantity);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
