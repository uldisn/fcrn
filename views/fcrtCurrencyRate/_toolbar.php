
<div class="btn-toolbar">
    <div class="btn-group">
        <?php
                   switch($this->action->id) {
                       case "create":
                           $this->widget("bootstrap.widgets.TbButton", array(
                               "label"=>Yii::t("FcrnModule.crud_static","Manage"),
                        "icon"=>"icon-list-alt",
                        "url"=>array("admin"),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.View")
                    ));
                    break;
                case "admin":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Create"),
                        "icon"=>"icon-plus",
                        "url"=>array("create"),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.Create")
                    ));
                    break;
                case "view":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Manage"),
                        "icon"=>"icon-list-alt",
                        "url"=>array("admin"),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.View")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Update"),
                        "icon"=>"icon-edit",
                        "url"=>array("update","fcrt_id"=>$model->{$model->tableSchema->primaryKey}),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.Update")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Create"),
                        "icon"=>"icon-plus",
                        "url"=>array("create"),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.Create")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Delete"),
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","fcrt_id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                            "confirm"=>Yii::t("FcrnModule.crud_static","Do you want to delete this item?")
                        ),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.Delete")
                    ));
                    break;
                case "update":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Manage"),
                        "icon"=>"icon-list-alt",
                        "url"=>array("admin"),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.View")
                    ));
//                    $this->widget("bootstrap.widgets.TbButton", array(
//                        "label"=>Yii::t("FcrnModule.crud_static","View"),
//                        "icon"=>"icon-eye-open",
//                        "url"=>array("view","fcrt_id"=>$model->{$model->tableSchema->primaryKey}),
//                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.View")
//                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("FcrnModule.crud_static","Delete"),
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","fcrt_id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                            "confirm"=>Yii::t("FcrnModule.crud_static","Do you want to delete this item?")
                        ),
                        "visible"=>Yii::app()->user->checkAccess("Fcrn.FcrtCurrencyRate.Delete")
                    ));
                    break;
            }
        ?>    </div>


    <?php if($this->action->id == 'admin'): ?>    <div class="btn-group">
        
        <?php
            $this->widget(
                   "bootstrap.widgets.TbButton",
                   array(
                       "label"=>Yii::t("FcrnModule.crud_static","Search"),
                "icon"=>"icon-search",
                "htmlOptions"=>array("class"=>"search-button")
               )
           );
        ?>
            </div>
    <?php endif; ?>
    <?php if($this->action->id == 'admin' || $this->action->id == 'view'): ?>            <div class="btn-group">
            <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                   'buttons' => array(
                           array('label'=>Yii::t('FcrnModule.crud_static','Relations'), 'icon'=>'icon-random', 'items'=>array(array('icon' => 'circle-arrow-left','label' => 'FcrtToFcrn', 'url' =>array('/fcrn/fcrnCurrency/admin')),array('icon' => 'circle-arrow-left','label' => 'FcrtFcrn', 'url' =>array('/fcrn/fcrnCurrency/admin')),array('icon' => 'circle-arrow-left','label' => 'FcrtFcsr', 'url' =>array('/fcrn/fcsrCourrencySource/admin')),
            )
          ),
        ),
    ));
?>        </div>

    
    <?php endif; ?></div>

<?php if($this->action->id == 'admin'): ?><div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array('model' => $model,)); ?>
</div>
<?php endif; ?>