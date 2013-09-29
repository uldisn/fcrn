<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        /**
         * @tutorial http://www.cniska.net/yii-bootstrap/#tbActiveForm
         */
        $form=$this->beginWidget('TbActiveForm', array(
            'id' => 'fcrt-currency-rate-form',
//            'enableAjaxValidation' => true,
//            'enableClientValidation' => true,
        ));
    ?>
    
    <div class="row">
        <div class="span7"> <!-- main inputs -->
             <div class="form-horizontal">

                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo Yii::t('FcrnModule.crud', 'Date') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            /**
                             * @tutorial http://www.yiiframework.com/doc/api/1.1/CJuiWidget
                             * @tutorial http://jqueryui.com/datepicker/
                             */
                            $this->widget('zii.widgets.jui.CJuiDatePicker',
                         array(
                                 'name' => 'fcrt_date',
                                 //'attribute' => 'fcrt_date',
                                 'language' =>  strstr(Yii::app()->language.'_','_',true),
                                 'htmlOptions' => array('size' => 10),
                                 'options' => array(
                                     'showButtonPanel' => true,
                                     'changeYear' => true,
                                     'changeYear' => true,
                                     'dateFormat' => 'yy-mm-dd',
                                     ),
                                 )
                             );


                            echo CHtml::submitButton(Yii::t('FcrnModule.crud', 'Set'), array(
                                           'class' => 'btn btn-primary'
                                       ));                                    
                            ?>

                        </div>
                    </div>
                
                
            </div>
        </div>
        
        <?php
           
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->