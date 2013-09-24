<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fcsr-courrency-source-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
        ));

        echo $form->errorSummary($model);
    ?>
    
    <div class="row">
        <div class="span7"> <!-- main inputs -->
            <h2>
                <?php echo Yii::t('FcrnModule.crud_static','Data')?>                <small>
                    <?php echo $model->itemLabel ?>
                </small>

            </h2>


            <div class="form-horizontal">

                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <?php
                            ;
                            echo $form->error($model,'fcsr_id')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcsrCourrencySource.fcsr_id') != 'FcsrCourrencySource.fcsr_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fcsr_name') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'fcsr_name', array('size' => 50, 'maxlength' => 50));
                            echo $form->error($model,'fcsr_name')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcsrCourrencySource.fcsr_name') != 'FcsrCourrencySource.fcsr_name')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'fcsr_notes') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textArea($model, 'fcsr_notes', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'fcsr_notes')
                            ?>
                            <span class="help-block">
                                <?php echo ($t = Yii::t('FcrnModule.crud', 'FcsrCourrencySource.fcsr_notes') != 'FcsrCourrencySource.fcsr_notes')?$t:'' ?>
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
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('fcsrCourrencySource/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('FcrnModule.crud_static', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->