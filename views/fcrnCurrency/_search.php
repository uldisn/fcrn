<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'fcrn_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcrn_code'); ?>
        <?php echo $form->textField($model, 'fcrn_code', array('size' => 3, 'maxlength' => 3)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FcrnModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
