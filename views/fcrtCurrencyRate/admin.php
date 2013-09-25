<?php
$this->setPageTitle(
    Yii::t('FcrnModule.crud', 'Currency Rates')
    . ' - '
    . Yii::t('FcrnModule.crud_static', 'Manage')
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'fcrt-currency-rate-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>
    <h1>
        <?php echo Yii::t('FcrnModule.crud', 'Currency Rates'); ?>
    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fcrt-currency-rate-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{pager}{summary}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
//            array(
//                'class' => 'CLinkColumn',
//                'header' => '',
//                'labelExpression' => '$data->itemLabel',
//                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fcrt_id" => $data["fcrt_id"]))'
//            ),
//            array(
//                'class' => 'editable.EditableColumn',
//                'name' => 'fcrt_id',
//                'editable' => array(
//                    'url' => $this->createUrl('/fcrn/fcrtCurrencyRate/editableSaver'),
//                    //'placement' => 'right',
//                )
//            ),
            array(
                'name' => 'fcrt_fcsr_id',
                'value' => 'CHtml::value($data, \'fcrtFcsr.itemLabel\')',
                'filter' => CHtml::listData(FcsrCourrencySource::model()->findAll(array('limit' => 1000)), 'fcsr_id', 'itemLabel'),
            ),
            array(
                'name' => 'fcrt_fcrn_id',
                'value' => 'CHtml::value($data, \'fcrtFcrn.itemLabel\')',
                'filter' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),
            ),
            array(
                'name' => 'fcrt_to_fcrn_id',
                'value' => 'CHtml::value($data, \'fcrtToFcrn.itemLabel\')',
                'filter' => CHtml::listData(FcrnCurrency::model()->findAll(array('limit' => 1000)), 'fcrn_id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fcrt_date',
                'editable' => array(
                    'url' => $this->createUrl('/fcrn/fcrtCurrencyRate/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fcrt_rate',
                'editable' => array(
                    'url' => $this->createUrl('/fcrn/fcrtCurrencyRate/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("currency.admin")'),
                    'delete' => array('visible' => 'FALSE'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fcrt_id" => $data->fcrt_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fcrt_id" => $data->fcrt_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fcrt_id" => $data->fcrt_id))',
            ),
        )
    )
);
?>