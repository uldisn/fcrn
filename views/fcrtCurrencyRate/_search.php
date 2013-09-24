<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'fcrt_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcrt_fcsr_id'); ?>
        <?php echo $form->textField($model, 'fcrt_fcsr_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcrt_fcrn_id'); ?>
        <?php echo $form->textField($model, 'fcrt_fcrn_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcrt_to_fcrn_id'); ?>
        <?php echo $form->textField($model, 'fcrt_to_fcrn_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcrt_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'model' => $model,
                                 'attribute' => 'fcrt_date',
                                 'language' =>  substr(Yii::app()->language, 0, strpos(Yii::app()->language, '_')),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );
                    ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fcrt_rate'); ?>
        <?php echo $form->textField($model, 'fcrt_rate'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('FcrnModule.crud_static', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
