<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fcrt-currency-rate-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span7"> <!-- main inputs -->
             <div class="form-horizontal">

                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <?php
                            ;
                            echo $form->error($model,'fcrt_id')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcrtCurrencyRate.fcrt_id') != 'FcrtCurrencyRate.fcrt_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fcrt_to_fcrn_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'fcrtToFcrn',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'fcrt_to_fcrn_id')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcrtCurrencyRate.fcrt_to_fcrn_id') != 'FcrtCurrencyRate.fcrt_to_fcrn_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fcrt_date') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',
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
                    ;
                            echo $form->error($model,'fcrt_date')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcrtCurrencyRate.fcrt_date') != 'FcrtCurrencyRate.fcrt_date')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fcrt_rate') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fcrt_rate');
                            echo $form->error($model,'fcrt_rate')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcrtCurrencyRate.fcrt_rate') != 'FcrtCurrencyRate.fcrt_rate')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- main inputs -->

        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('FcrnModule.crud_static','Fields with <span class="required">*</span> are required.');?>
    </p>

    <div class="form-actions">
        
        <?php
            echo CHtml::Button(
            Yii::t('FcrnModule.crud_static', 'Cancel'), array(
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('fcrtCurrencyRate/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FcrnModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->