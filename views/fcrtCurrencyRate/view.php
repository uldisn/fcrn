<?php
    $this->setPageTitle(
        Yii::t('FcrnModule.crud', 'Fcrt Currency Rate')
        . ' - '
        . Yii::t('FcrnModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FcrnModule.crud','Fcrt Currency Rates')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FcrnModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FcrnModule.crud','Fcrt Currency Rate')?>
    <small><?php echo Yii::t('FcrnModule.crud_static','View')?> #<?php echo $model->fcrt_id ?></small>
    </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>


<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('FcrnModule.crud_static','Data')?>            <small>
                <?php echo $model->itemLabel?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'fcrt_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fcrt_id',
                                'url' => $this->createUrl('/fcrn/fcrtCurrencyRate/editableSaver'),
                            ),
                            true
                        )
                    ),
        array(
            'name' => 'fcrt_fcsr_id',
            'value' => ($model->fcrtFcsr !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fcrtFcsr->itemLabel,
                            array('/fcrn/fcsrCourrencySource/view','fcsr_id' => $model->fcrtFcsr->fcsr_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/fcrn/fcsrCourrencySource/update','fcsr_id' => $model->fcrtFcsr->fcsr_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
        array(
            'name' => 'fcrt_fcrn_id',
            'value' => ($model->fcrtFcrn !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fcrtFcrn->itemLabel,
                            array('/fcrn/fcrnCurrency/view','fcrn_id' => $model->fcrtFcrn->fcrn_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/fcrn/fcrnCurrency/update','fcrn_id' => $model->fcrtFcrn->fcrn_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
        array(
            'name' => 'fcrt_to_fcrn_id',
            'value' => ($model->fcrtToFcrn !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->fcrtToFcrn->itemLabel,
                            array('/fcrn/fcrnCurrency/view','fcrn_id' => $model->fcrtToFcrn->fcrn_id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/fcrn/fcrnCurrency/update','fcrn_id' => $model->fcrtToFcrn->fcrn_id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'fcrt_date',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fcrt_date',
                                'url' => $this->createUrl('/fcrn/fcrtCurrencyRate/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fcrt_rate',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fcrt_rate',
                                'url' => $this->createUrl('/fcrn/fcrtCurrencyRate/editableSaver'),
                            ),
                            true
                        )
                    ),
           ),
        )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>    </div>
</div>