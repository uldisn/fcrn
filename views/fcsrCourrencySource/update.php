<?php
$this->setPageTitle(
        Yii::t('FcrnModule.crud', 'Fcsr Courrency Source')
        . ' - '
        . Yii::t('FcrnModule.crud_static', 'Update')
        . ': '   
        . $model->getItemLabel()
);    

?>
    <h1>
        
        <?php echo Yii::t('FcrnModule.crud','Fcsr Courrency Source'); ?>
        <small>
            <?php echo Yii::t('FcrnModule.crud_static','Update')?> #<?php echo $model->fcsr_id ?>
        </small>
        
    </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<?php
    $this->renderPartial('_form', array('model' => $model));
?>
