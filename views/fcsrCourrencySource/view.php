<?php
    $this->setPageTitle(
        Yii::t('FcrnModule.crud', 'Fcsr Courrency Source')
        . ' - '
        . Yii::t('FcrnModule.crud_static', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('FcrnModule.crud','Fcsr Courrency Sources')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('FcrnModule.crud_static', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('FcrnModule.crud','Fcsr Courrency Source')?>
    <small><?php echo Yii::t('FcrnModule.crud_static','View')?> #<?php echo $model->fcsr_id ?></small>
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
                        'name' => 'fcsr_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fcsr_id',
                                'url' => $this->createUrl('/fcrn/fcsrCourrencySource/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fcsr_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fcsr_name',
                                'url' => $this->createUrl('/fcrn/fcsrCourrencySource/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'fcsr_notes',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'fcsr_notes',
                                'url' => $this->createUrl('/fcrn/fcsrCourrencySource/editableSaver'),
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