<?php


class FcrnCurrencyController extends Controller
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
                'roles' => array(ROLE_ADMIN),
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

    public function actionView($fcrn_id)
    {
        $model = $this->loadModel($fcrn_id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new FcrnCurrency;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'fcrn-currency-form');

        if (isset($_POST['FcrnCurrency'])) {
            $model->attributes = $_POST['FcrnCurrency'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('admin', 'fcrn_id' => $model->fcrn_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('fcrn_id', $e->getMessage());
            }
        } elseif (isset($_GET['FcrnCurrency'])) {
            $model->attributes = $_GET['FcrnCurrency'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($fcrn_id)
    {
        $model = $this->loadModel($fcrn_id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'fcrn-currency-form');

        if (isset($_POST['FcrnCurrency'])) {
            $model->attributes = $_POST['FcrnCurrency'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('admin', 'fcrn_id' => $model->fcrn_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('fcrn_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('FcrnCurrency'); // classname of model to be updated
        $es->update();
    }

    public function actionDelete($fcrn_id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($fcrn_id)->delete();
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

    public function actionAdmin()
    {
        $model = new FcrnCurrency('search');
        $scopes = $model->scopes();
        if (isset($scopes[$this->scope])) {
            $model->{$this->scope}();
        }
        $model->unsetAttributes();

        if (isset($_GET['FcrnCurrency'])) {
            $model->attributes = $_GET['FcrnCurrency'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $m = FcrnCurrency::model();
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fcrn-currency-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
