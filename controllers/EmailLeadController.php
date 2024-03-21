<?php

class EmailLeadController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'propertydetail','leaddetail','emailleadexport'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new EmailLead;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EmailLead'])) {
            $model->attributes = $_POST['EmailLead'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_email_lead));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EmailLead'])) {
            $model->attributes = $_POST['EmailLead'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_email_lead));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('EmailLead');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EmailLead('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EmailLead']))
            $model->attributes = $_GET['EmailLead'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EmailLead the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EmailLead::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param EmailLead $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'email-lead-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPropertydetail() {
        $pid = Tools::getValue('id_property');
        $token = Tools::getAdminToken();
        $pdetail = Property::model()->findByPk($pid);
        if ($pdetail->property_type == 'premium'):
            $this->redirect(Tools::getBaseUrl() . 'property/view/id/' . $pid . '?token=' . $token);
        elseif ($pdetail->property_type == 'general'):
            $this->redirect(Tools::getBaseUrl() . 'property/view/general/id/' . $pid . '?token=' . $token);
        elseif ($pdetail->property_type == 'classified'):
            $this->redirect(Tools::getBaseUrl() . 'property/view/classified/id/' . $pid . '?token=' . $token);
        endif;
    }

    public function actionLeaddetail() {
        $lid = Tools::getValue('leadid');
        $ldetail = EmailLead::model()->findByPk($lid);

        $this->layout = '//layouts/ajaxlayout';
        $this->render('leaddetail', array(
            'model' => $ldetail,
        ));
    }
    
    public function actionEmailleadexport()
    {   
        $criteria = new CDbCriteria;
        $criteria->distinct=true;
        $criteria->select='created_at,id_email_lead,name,email';
        $criteria->condition='id_email_lead!=0';
        $criteria->order='id_email_lead desc';
        $criteria->limit=$_GET['limit'];
        $criteria->offset=$_GET['offset'];
        
        $emailLeadData = EmailLead::model()->findAll($criteria);
//        foreach($emailLeadData as $l)
//        {
//            echo $l->name.' '.$l->email."<br>";
//        }    
        $this->renderPartial('emailleadexport',array('emailLeadData'=>$emailLeadData));
    }  
    
    
    
}

