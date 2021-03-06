<?php

/**
 * This is the model class for table "tipofacturacion".
 *
 * The followings are the available columns in table 'tipofacturacion':
 * @property string $codtipofac
 * @property string $tipofacturacion
 * @property string $creadoel
 * @property string $modificadopor
 * @property string $modificadoel
 * @property string $creadopor
 */
class Tipofacturacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tipofacturacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->params['prefijo'].'tipofacturacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('codtipofac', 'required'),
			array('codtipofac', 'length', 'max'=>2),
			array('codtipofac', 'length', 'min'=>2),
			array('codtipofac', 'required'),
			array('codtipofac', 'unique'),
			array('codtipofac', 'match', 'pattern'=>Yii::app()->params['mascaradocs'],'message'=>'El codigo  no es el correcto, El c debe comenzar por 2 DIGITOS  > 0 y los caracteres deben ser numericos'),

			array('tipofacturacion', 'length', 'max'=>35),
			array('tipofacturacion', 'required'),
			array('creadoel, modificadoel', 'length', 'max'=>20),
			array('modificadopor, creadopor', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('codtipofac, tipofacturacion, creadoel, modificadopor, modificadoel, creadopor', 'safe', 'on'=>'search'),
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

	
	
	public $maximovalor;
	//public $conservarvalor=0; //Opcionpa reaverificar si se quedan lo valores predfindos en sesiones 
	public function beforeSave() {
							if ($this->isNewRecord) {
									
									    $this->creadopor=Yii::app()->user->name;
										// $this->creadoel=Yii::app()->user->name;
									   // $this->codtipofac=Numeromaximo::numero($this->model(),'codtipofac','maximovalor',2);
										//$this->cod_estado='01';
											//$this->c_salida='1';
									} else
									{
										
										//$this->ultimares=" ".strtoupper(trim($this->usuario=Yii::app()->user->name))." ".date("H:i")." :".$this->ultimares;
									}
									return parent::beforeSave();
				}
	
	
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codtipofac' => 'Codigo',
			'tipofacturacion' => 'Tipofacturacion',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codtipofac',$this->codtipofac,true);
		$criteria->compare('tipofacturacion',$this->tipofacturacion,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}