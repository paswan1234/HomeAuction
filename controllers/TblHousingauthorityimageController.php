<?php

class TblHousingauthorityimageController extends Controller {

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

        $model = new TblHousingauthorityimage;
        $housingauthority_id = Tools::getValue('housingauthority_id');
        $uploadpath = "uploaded/haimage";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TblHousingauthorityimage'])) {
            $model->attributes = $_POST['TblHousingauthorityimage'];

            $photo = CUploadedFile::getInstance($model, 'filename');
            $photoName = $photo->getName();
            $model->filename = mktime().'_'.$photoName;
            $model->path = $uploadpath;
            $model->type = 1;
            if ($model->save()) {
                $photo->saveAs($uploadpath . '/' . mktime().'_'.$photoName);
                if ($model->sort == 1 || $model->sort == 0)
                    Yii::app()->db->createCommand('update housingauthority set image= ' . $model->id . ' where id=' . $housingauthority_id)->query();
                Yii::app()->user->setFlash('success', "New Housing Authority photo has been added successfully!!");
                $this->redirect(array('create', 'housingauthority_id' => $housingauthority_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'housingauthority_id' => $housingauthority_id,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $housingauthority_id = $model->housingauthority_id;
        $uploadpath = "uploaded/haimage";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TblHousingauthorityimage'])) {
            $model->attributes = $_POST['TblHousingauthorityimage'];

            $photo = CUploadedFile::getInstance($model, 'filename');

            if (!is_null($photo) && isset($photo)) {
                $photoName = $photo->getName();
                $model->filename = mktime().'_'.$photoName;
                $model->path = $uploadpath;
                $photo->saveAs($uploadpath . '/' . mktime().'_'.$photoName);
            } else {
                $model->filename = $_POST['TblHousingauthorityimage']['old_photo'];
            }

            if ($model->save()) {
                if ($model->sort == 1 || $model->sort == 0)
                    Yii::app()->db->createCommand('update housingauthority set image= ' . $model->id . ' where id=' . $housingauthority_id)->query();
                Yii::app()->user->setFlash('success', "Housing Authority photo has been updated successfully!!");
                $this->redirect(array('create', 'housingauthority_id' => $housingauthority_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'housingauthority_id' => $housingauthority_id,
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
        $dataProvider = new CActiveDataProvider('TblHousingauthorityimage');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TblHousingauthorityimage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TblHousingauthorityimage']))
            $model->attributes = $_GET['TblHousingauthorityimage'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TblHousingauthorityimage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TblHousingauthorityimage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TblHousingauthorityimage $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tbl-housingauthorityimage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
