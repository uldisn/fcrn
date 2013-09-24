<?php
$this->setPageTitle(
    Yii::t('FcrnModule.crud', 'Fcsr Courrency Source')
    . ' - '
    . Yii::t('FcrnModule.crud_static', 'Create')
);

?>
    <h1>
        <?php echo Yii::t('FcrnModule.crud', 'Fcsr Courrency Source'); ?>
        <small><?php echo Yii::t('FcrnModule.crud_static', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>