<?php


class FcrtCurrencyRateController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";
    public $scope = "crud";

public function filters()
{
return array(
'accessControl',
);
}

public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('create', 'editableSaver', 'update', 'delete','admin', 'view'),
                'roles' => array(ROLE_CURRENCY_EDITOR),
            ),
            array(
                'allow',
                'actions' => array('admin', 'view'),
                'roles' => array(ROLE_USER),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionView($fcrt_id)
    {
        $model = $this->loadModel($fcrt_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate($fcrt_fcsr_id,$fcrt_fcrn_id)
    {
        $model = new FcrtCurrencyRate;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'fcrt-currency-rate-form');

        if (isset($_POST['FcrtCurrencyRate'])) {
            $model->attributes = $_POST['FcrtCurrencyRate'];
            $model->setAttribute('fcrt_fcsr_id', $fcrt_fcsr_id);
            $model->setAttribute('fcrt_fcrn_id', $fcrt_fcrn_id);
            
            
            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array(
                                            'admin', 
                                            'fcrt_fcsr_id' => $model->fcrt_fcsr_id,
                                            'fcrt_fcrn_id' => $model->fcrt_fcrn_id,
                                ));
                    }
                }
            } catch (Exception $e) {
                $model->addError('fcrt_id', $e->getMessage());
            }
        } elseif (isset($_GET['FcrtCurrencyRate'])) {
            $model->attributes = $_GET['FcrtCurrencyRate'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($fcrt_id)
    {
        $model = $this->loadModel($fcrt_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'fcrt-currency-rate-form');

        if (isset($_POST['FcrtCurrencyRate'])) {
            $model->attributes = $_POST['FcrtCurrencyRate'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('admin', 'fcrt_fcsr_id' => $model->fcrt_fcsr_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('fcrt_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('FcrtCurrencyRate'); // classname of model to be updated
        $es->update();
    }

    public function actionDelete($fcrt_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($fcrt_id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        } else {
            throw new CHttpException(400, Yii::t('FcrnModule.crud_static', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionAdmin($fcrt_fcsr_id = FALSE,$fcrt_fcrn_id = FALSE)
    {
        //currency source
        $mFcsr = FcsrCourrencySource::model()->findAll();
        if(!$fcrt_fcsr_id){
            $fcrt_fcsr_id = $mFcsr[0]->fcsr_id;
            $fcrt_fcrn_id = $mFcsr[0]->fcsr_base_fcrn_id;
            $fcrt_date = date('Y.d.m');
        }
        
//        if (isset($_POST['fcrt_date'])) {
//            $fcrt_date = $_POST['fcrt_date'];
//        }
//        if(!$fcrt_date){
//            $fcrt_date = date("Y-m-d");
//        }
        $model = new FcrtCurrencyRate('search');
        
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }

        //get submited filter parmeters and add additional param
        $model->unsetAttributes();
        $aAtributes = array();
        if (isset($_GET['FcrtCurrencyRate'])) {
            $aAtributes = $_GET['FcrtCurrencyRate'];
        }
        $aAtributes['fcrt_fcsr_id'] = $fcrt_fcsr_id;
        $model->attributes = $aAtributes;
        
        $this->render(
                'admin', 
                array(
                    'model' => $model,
                    'fcrt_fcsr_id'=>$fcrt_fcsr_id,
                    'fcrt_fcrn_id'=>$fcrt_fcrn_id,
                    //'fcrt_date'=>$fcrt_date,
                    //'mFcsr' => $mFcsr,
                )
                );
    }

    public function loadModel($id)
    {
        $m = FcrtCurrencyRate::model();
        // apply scope, if available
        $scopes = $m->scopes();
        if (isset($scopes[$this->scope])) {
            $m->{$this->scope}();
        }
        $model = $m->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('FcrnModule.crud_static', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fcrt-currency-rate-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    
    
}
