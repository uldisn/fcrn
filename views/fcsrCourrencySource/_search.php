<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'fcsr_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcsr_name'); ?>
        <?php echo $form->textField($model, 'fcsr_name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcsr_notes'); ?>
        <?php echo $form->textArea($model, 'fcsr_notes', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcsr_base_fcrn_id'); ?>
        <?php echo $form->textField($model, 'fcsr_base_fcrn_id'); ?>
    </div>    

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FcrnModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
