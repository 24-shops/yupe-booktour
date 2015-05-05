<?php

/**
 * This is the model class for table "{{booktour_application_users}}".
 *
 * The followings are the available columns in table '{{booktour_application_users}}':
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $mail
 * @property string $phone
 * @property string $date_of_birth
 * @property string $date_reservation
 * @property integer $quantity
 * @property integer $dates_id
 */
class ApplicationUsers extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{booktour_application_users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surname, name, patronymic, mail, phone, date_of_birth, date_reservation', 'required'),
			array('quantity, dates_id', 'numerical', 'integerOnly'=>true),
			array('surname, name, patronymic, mail, phone', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, surname, name, patronymic, mail, phone, date_of_birth, date_reservation, quantity, dates_id', 'safe', 'on'=>'search'),
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
			'surname' => 'Surname',
			'name' => 'Name',
			'patronymic' => 'Patronymic',
			'mail' => 'Mail',
			'phone' => 'Phone',
			'date_of_birth' => 'Date Of Birth',
			'date_reservation' => 'Date Reservation',
			'quantity' => 'Quantity',
			'dates_id' => 'Dates',
		);
	}	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeDescriptions()
	{
		return array(
			'id' => 'ID',
			'surname' => 'Surname',
			'name' => 'Name',
			'patronymic' => 'Patronymic',
			'mail' => 'Mail',
			'phone' => 'Phone',
			'date_of_birth' => 'Date Of Birth',
			'date_reservation' => 'Date Reservation',
			'quantity' => 'Quantity',
			'dates_id' => 'Dates',
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
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('patronymic',$this->patronymic,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('date_reservation',$this->date_reservation,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('dates_id',$this->dates_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApplicationUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
