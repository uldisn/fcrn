<?php

/**
 * This is the model base class for the table "fcrn_currency".
 *
 * Columns in table "fcrn_currency" available as properties of the model:
 * @property integer $fcrn_id
 * @property string $fcrn_code
 *
 * Relations of table "fcrn_currency" available as properties of the model:
 * @property FcrtCurrencyRate[] $fcrtCurrencyRates
 */
abstract class BaseFcrnCurrency extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'fcrn_currency';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('fcrn_code', 'required'),
                array('fcrn_code', 'length', 'max' => 3),
                array('fcrn_id, fcrn_code', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->fcrn_code;
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
            'fcrtCurrencyRates' => array(self::HAS_MANY, 'FcrtCurrencyRate', 'fcrt_fcrn_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fcrn_id' => Yii::t('FcrnModule.crud', 'FcrnId'),
            'fcrn_code' => Yii::t('FcrnModule.crud', 'Currency code'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.fcrn_id', $this->fcrn_id);
        $criteria->compare('t.fcrn_code', $this->fcrn_code, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
