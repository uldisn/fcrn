<?php
$this->setPageTitle(
        Yii::t('FcrnModule.crud', 'Currency')
        . ' - '
        . Yii::t('FcrnModule.crud_static', 'Update')
        . ': '   
        . $model->getItemLabel()
);    
?>
    <h1>
        
        <?php echo Yii::t('FcrnModule.crud','Currency'); ?>
        <small>
            <?php echo Yii::t('FcrnModule.crud_static','Update')?>
        </small>
        
    </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<?php
    $this->renderPartial('_form', array('model' => $model));
?>
