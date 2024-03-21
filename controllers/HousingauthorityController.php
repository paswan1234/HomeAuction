<?php

class HousingauthorityController extends Controller {

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
                'actions' => array('admin', 'delete'),
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
        $model = new Housingauthority;
        $imgModel = new TblHousingauthorityimage;
        $dateModel = new Housingauthorityopenclosedate;
        $uploadpath = "uploaded/haimage";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        if (isset($_POST['Housingauthority'])) {

            $model->attributes = $_POST['Housingauthority'];
            $_POST['Housingauthorityopenclosedate']['ha_id'] = $_POST['Housingauthority']['ha_id'];
            $dateModel->attributes = $_POST['Housingauthorityopenclosedate'];
			
            if ($model->save()) {
                $dateModel->save();
                Yii::app()->user->setFlash('success', "Housing Authority details saved successfully!!");
                $this->redirect(array('update', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'imgModel' => $imgModel,
            'dateModel' => $dateModel,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id); 
        $dateModel = $this->loadDateModel($model->ha_id);
        if(!is_null($model->image) || $model->image != '' )
            $imgModel = TblHousingauthorityimage::model()->findByPk($model->image);
        else
            $imgModel = new TblHousingauthorityimage;
        
        $uploadpath = "uploaded/haimage";
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Housingauthority'])) {
            
            //added by LMS 18 april 2018
            $_POST['Housingauthority']['update_time'] = time();
            $model->attributes = $_POST['Housingauthority'];
            

          /*  if ($model->save()) {
                Yii::app()->user->setFlash('success', "Housing Authority details saved successfully!!");
                $this->redirect(array('update', 'id' => $model->id));
            } BY LMS 28-07*/
            
            if ($model->save()) {
            //$_POST['Housingauthorityopenclosedate']['ha_id']  = $model->ha_id;
                $dateModel->attributes = $_POST['Housingauthorityopenclosedate'];
                $dateModel->save();

                $propertyUrl = "housingauthority/view/id/" . $model->id;
                // Yii::app()->user->setFlash('success', "Housing Authority details saved successfully!!"); BHY LMS
                Yii::app()->user->setFlash('success', "Property information has been saved successfully! <a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'>Click here</a> to Preview");
                $this->redirect(array('update', 'id' => $model->id));
}
            
        }
    
        
        $dateModel = $this->loadDateModel($model->ha_id);//$dateModel = new Housingauthorityopenclosedate;
        $this->render('update', array(
            'model' => $model,
            'imgModel' => $imgModel,
            'dateModel' => $dateModel,
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
        $dataProvider = new CActiveDataProvider('Housingauthority');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Housingauthority('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Housingauthority']))
            $model->attributes = $_GET['Housingauthority'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Housingauthority the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Housingauthority::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Housingauthority the loaded model
     * @throws CHttpException
     */
    public function loadDateModel($id) {
        $model = Housingauthorityopenclosedate::model()->findByAttributes(array('ha_id' => $id),array('order' => 'tb_id desc','limit' => 1));  
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Performs the AJAX validation.
     * @param Housingauthority $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'housingauthority-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
