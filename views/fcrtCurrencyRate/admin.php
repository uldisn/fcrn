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
<?php
$aFcsr = array();
foreach ($mFcsr as $m) {
    $aFcsr[] = array(
        'label'   => Yii::t('app', $m->fcsr_name . ' ' . $m->fcsrBaseFcrn->fcrn_code),
        'url'     => Yii::app()->controller->createUrl(
                'admin',
                array(
                    'fcrt_fcsr_id'=>$m->fcsr_id,
                    'fcrt_fcrn_id'=>$m->fcsr_base_fcrn_id,
                    'fcrt_date'=>$fcrt_date,
                    )
                ),
        'active'  => ($fcrt_fcsr_id == $m->fcsr_id)        
    );
}
        
$this->widget(
    'TbMenu',
    array(
         'type'  => 'tabs',
         'items' => $aFcsr,
        ));

//date fiels
$this->renderPartial('_form_fcrt_date', array('fcrt_date' => $fcrt_date));

$aUrlParam = array(
    'fcrt_fcsr_id' => $fcrt_fcsr_id,
    'fcrt_fcrn_id' => $fcrt_fcrn_id,
    'fcrt_date'=>$fcrt_date,    
        );
$this->widget("bootstrap.widgets.TbButton", array(
    "label"=>Yii::t("FcrnModule.crud_static","Create"),
    "icon"=>"icon-plus",
    "url"=>Yii::app()->controller->createUrl("create",$aUrlParam),
    "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.Create")
));

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
                'updateButtonUrl' => 'Yii::app()->controller->createUrl(
                                                            "update", 
                                                            array(
                                                                "fcrt_id" => $data->fcrt_id,
                                                                "fcrt_fcrn_id" => $data->fcrt_fcrn_id,
                                                                "fcrt_date"=>$data->fcrt_date,
                                                                ))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("fcrt_id" => $data->fcrt_id))',
            ),
        )
    )
);