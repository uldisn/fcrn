<?php

/**
 * This is the model base class for the table "fcsr_courrency_source".
 *
 * Columns in table "fcsr_courrency_source" available as properties of the model:
 * @property integer $fcsr_id
 * @property string $fcsr_name
 * @property string $fcsr_notes
 *
 * Relations of table "fcsr_courrency_source" available as properties of the model:
 * @property FcrtCurrencyRate[] $fcrtCurrencyRates
 */
abstract class BaseFcsrCourrencySource extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'fcsr_courrency_source';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('fcsr_name', 'required'),
                array('fcsr_notes', 'default', 'setOnEmpty' => true, 'value' => null),
                array('fcsr_name', 'length', 'max' => 50),
                array('fcsr_notes', 'safe'),
                array('fcsr_id, fcsr_name, fcsr_notes', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->fcsr_name;
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
            'fcrtCurrencyRates' => array(self::HAS_MANY, 'FcrtCurrencyRate', 'fcrt_fcsr_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fcsr_id' => Yii::t('FcrnModule.crud', 'FcsrId'),
            'fcsr_name' => Yii::t('FcrnModule.crud', 'Currency source'),
            'fcsr_notes' => Yii::t('FcrnModule.crud', 'Notes'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.fcsr_id', $this->fcsr_id);
        $criteria->compare('t.fcsr_name', $this->fcsr_name, true);
        $criteria->compare('t.fcsr_notes', $this->fcsr_notes, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
