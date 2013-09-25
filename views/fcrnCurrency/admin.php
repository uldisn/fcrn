<?php
$this->setPageTitle(
    Yii::t('FcrnModule.crud', 'Currencies')
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
            'fcrn-currency-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

    <h1>

        <?php echo Yii::t('FcrnModule.crud', 'Currencies'); ?>
        <small><?php echo Yii::t('FcrnModule.crud_static', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fcrn-currency-grid',
        'dataProvider' => $model->search(),
        //'filter' => $model,
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
//                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fcrn_id" => $data["fcrn_id"]))'
//            ),
//            array(
//                'class' => 'editable.EditableColumn',
//                'name' => 'fcrn_id',
//                'editable' => array(
//                    'url' => $this->createUrl('/fcrn/fcrnCurrency/editableSaver'),
//                    //'placement' => 'right',
//                )
//            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fcrn_code',
//                'editable' => array(
//                    'url' => $this->createUrl('/fcrn/fcrnCurrency/editableSaver'),
//                    //'placement' => 'right',
//                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("admin")'),
                    'delete' => array('visible' => 'FALSE'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fcrn_id" => $data->fcrn_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fcrn_id" => $data->fcrn_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fcrn_id" => $data->fcrn_id))',
            ),
        )
    )
);
?>