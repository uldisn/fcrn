<?php

/**
 * This is the model base class for the table "fcrt_currency_rate".
 *
 * Columns in table "fcrt_currency_rate" available as properties of the model:
 * @property string $fcrt_id
 * @property integer $fcrt_fcsr_id
 * @property integer $fcrt_fcrn_id
 * @property integer $fcrt_to_fcrn_id
 * @property string $fcrt_date
 * @property double $fcrt_rate
 *
 * Relations of table "fcrt_currency_rate" available as properties of the model:
 * @property FcrnCurrency $fcrtToFcrn
 * @property FcrnCurrency $fcrtFcrn
 * @property FcsrCourrencySource $fcrtFcsr
 */
abstract class BaseFcrtCurrencyRate extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'fcrt_currency_rate';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('fcrt_fcsr_id, fcrt_fcrn_id, fcrt_to_fcrn_id, fcrt_date, fcrt_rate', 'required'),
                array('fcrt_fcsr_id, fcrt_fcrn_id, fcrt_to_fcrn_id', 'numerical', 'integerOnly' => true),
                array('fcrt_rate', 'numerical'),
                array('fcrt_id, fcrt_fcsr_id, fcrt_fcrn_id, fcrt_to_fcrn_id, fcrt_date, fcrt_rate', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->fcrt_date;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => 'GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'fcrtToFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'fcrt_to_fcrn_id'),
            'fcrtFcrn' => array(self::BELONGS_TO, 'FcrnCurrency', 'fcrt_fcrn_id'),
            'fcrtFcsr' => array(self::BELONGS_TO, 'FcsrCourrencySource', 'fcrt_fcsr_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fcrt_id' => Yii::t('FcrnModule.crud', 'Fcrt'),
            'fcrt_fcsr_id' => Yii::t('FcrnModule.crud', 'Fcrt Fcsr'),
            'fcrt_fcrn_id' => Yii::t('FcrnModule.crud', 'Fcrt Fcrn'),
            'fcrt_to_fcrn_id' => Yii::t('FcrnModule.crud', 'Fcrt To Fcrn'),
            'fcrt_date' => Yii::t('FcrnModule.crud', 'Fcrt Date'),
            'fcrt_rate' => Yii::t('FcrnModule.crud', 'Fcrt Rate'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.fcrt_id', $this->fcrt_id, true);
        $criteria->compare('t.fcrt_fcsr_id', $this->fcrt_fcsr_id);
        $criteria->compare('t.fcrt_fcrn_id', $this->fcrt_fcrn_id);
        $criteria->compare('t.fcrt_to_fcrn_id', $this->fcrt_to_fcrn_id);
        $criteria->compare('t.fcrt_date', $this->fcrt_date, true);
        $criteria->compare('t.fcrt_rate', $this->fcrt_rate);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
