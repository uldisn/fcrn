<?php
$this->setPageTitle(
    Yii::t('FcrnModule.crud', 'Fcsr Courrency Sources')
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
            'fcsr-courrency-source-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>
    <h1>

        <?php echo Yii::t('FcrnModule.crud', 'Fcsr Courrency Sources'); ?>
        <small><?php echo Yii::t('FcrnModule.crud_static', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'fcsr-courrency-source-grid',
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
//                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("fcsr_id" => $data["fcsr_id"]))'
//            ),
//            array(
//                'class' => 'editable.EditableColumn',
//                'name' => 'fcsr_id',
//                'editable' => array(
//                    'url' => $this->createUrl('/fcrn/fcsrCourrencySource/editableSaver'),
//                    //'placement' => 'right',
//                )
//            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'fcsr_name',
                'editable' => array(
                    'url' => $this->createUrl('/fcrn/fcsrCourrencySource/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'fcsr_notes',

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'FALSE'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("admin")'),
                    'delete' => array('visible' => 'FALSE'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("fcsr_id" => $data->fcsr_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("fcsr_id" => $data->fcsr_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fcsr_id" => $data->fcsr_id))',
            ),
        )
    )
);
?>