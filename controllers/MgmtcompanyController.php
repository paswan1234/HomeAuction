<?php

class MgmtcompanyController extends Controller {

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
                //'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('admin', 'delete', 'credentails', 'addRegionalManager', 'deleteRegionalManager', 'updateRegionalManager'),
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
        $model = new Mgmtcompany;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Mgmtcompany'])) {
            $model->attributes = $_POST['Mgmtcompany'];
            $model->status = 2;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Management Company details saved successfully!!");
                $this->redirect(array('update', 'id' => $model->id));
            }
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
        $uploadpath = "uploaded";

        if (isset($_POST['Mgmtcompany'])) {
            $model->attributes = $_POST['Mgmtcompany'];
            $model->status = 2;

            $logo = CUploadedFile::getInstance($model, 'logo');

            if (!is_null($logo) && isset($logo)) {
                $logoName = 'c_' . $model->id . '_' . time() . $logo->getName();
                $model->logo = $uploadpath . "/" . $logoName;
                $logo->saveAs($uploadpath . '/' . $logoName);
            } else {
                $model->logo = $_POST['Mgmtcompany']['old_logo'];
            }

            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Management Company details saved successfully!!");
                $this->redirect(array('update', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionCredentails($id) {
        $model = $this->loadModel($id);
        $sql = "select count(*) from users where user_type NOT IN ('rpm', 'prowner', 'renter') AND mgm_id = " . $id;
        $count = Yii::app()->db->createCommand($sql)->queryScalar();
        $username = '';
        if ($count > 0) {
            $sql = "select username,id_user from users WHERE user_type NOT IN ('rpm', 'prowner', 'renter') AND mgm_id = " . $id;
            $userdetail = Yii::app()->db->createCommand($sql)->queryRow();
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $error = '';
        if (isset($_POST['Credentails'])) {

            if ($count > 0) {
                if ($_POST['Credentails']['username'] == '') {
                    Yii::app()->user->setFlash('success', "Please enter username");
                } else {
                    $sql = "select count(*) from users where username = '" . $_POST['Credentails']['username'] . "' and mgm_id != " . $id;
                    $count1 = Yii::app()->db->createCommand($sql)->queryScalar();
                    if ($count1 > 0) {
                        Yii::app()->user->setFlash('success', "Username already exists");
                    } else {
                        if ($_POST['Credentails']['password'] == '') {
                            $sql = "update users set username = '" . $_POST['Credentails']['username'] . "' where user_type NOT IN ('rpm', 'prowner', 'renter') AND mgm_id =" . $id;
                            $count1 = Yii::app()->db->createCommand($sql)->query();
                        } else {
                            $sql = "update users set username = '" . $_POST['Credentails']['username'] . "',password = '" . md5($_POST['Credentails']['password']) . "' where user_type NOT IN ('rpm', 'prowner', 'renter') AND mgm_id =" . $id;
                            $count1 = Yii::app()->db->createCommand($sql)->query();
                        }
                    }
                }
            } else {
                if ($_POST['Credentails']['username'] == '' || $_POST['Credentails']['password'] == '') {
                    Yii::app()->user->setFlash('success', "Please enter username and password.");
                } else {
                    $sql = "select count(*) from users where username = '" . $_POST['Credentails']['username'] . "'";
                    $count1 = Yii::app()->db->createCommand($sql)->queryScalar();
                    if ($count1 > 0) {
                        Yii::app()->user->setFlash('success', "Username already exists");
                    } else {
                        $sql = "insert into users (username,password,mgm_id,user_type) values('" . $_POST['Credentails']['username'] . "','" . md5($_POST['Credentails']['password']) . "'," . $id . ",'pm')";
                        $count1 = Yii::app()->db->createCommand($sql)->query();
                    }
                }
            }
        }

        $this->render('credentails', array(
            'model' => $model, 'userdetail' => $userdetail
        ));
    }

    public function actionAddRegionalManager($id) {
        $model = $this->loadModel($id);

        $userModel = new Users;
        $userModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $userModel->attributes = $_GET['Users'];

        $username = '';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $error = '';
        if (isset($_POST['Credentails'])) {
            //else {
            if ($_POST['Credentails']['username'] == '' || $_POST['Credentails']['password'] == '') {
                Yii::app()->user->setFlash('success', "Please enter username and password.");
            } else {
                $sql = "select count(*) from users where username = '" . $_POST['Credentails']['username'] . "'";
                $count1 = Yii::app()->db->createCommand($sql)->queryScalar();
                if ($count1 > 0) {
                    Yii::app()->user->setFlash('success', "Username already exists");
                } else {
                    $sql = "insert into users (fname, lname, email, username, password, mgm_id, user_type) values('" . $_POST['Credentails']['fname'] . "', '" . $_POST['Credentails']['lname'] . "', '" . $_POST['Credentails']['email'] . "', '" . $_POST['Credentails']['username'] . "','" . md5($_POST['Credentails']['password']) . "'," . $id . ",'rpm')";
                    $count1 = Yii::app()->db->createCommand($sql)->query();
                }
            }
            //}
        }

        $managers = Users::model()->findByAttributes(array('mgm_id' => $id));
        $this->render('add_regional_manager', array(
            'model' => $model, 'userdetail' => $userdetail, 'userModel' => $userModel, 'managers' => $managers
        ));
    }

    /**
     * Deletes a Regional Manager
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeleteRegionalManager($id) {
        //$this->loadModel($id)->delete();        
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        else
            $model->delete();
        Yii::app()->user->setFlash('success', "User has been successfully deleted!");
        $this->redirect(Yii::app()->request->urlReferrer);
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdateRegionalManager($id) {
        if (isset($_GET['user_id']))
            $user_id = $_GET['user_id'];        
        
        $model = $this->loadModel($id);
        
        $userModel = Users::model()->findByPk($user_id);
        
        
        //$userModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $userModel->attributes = $_GET['Users'];
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $username = '';   

        if (isset($_POST['Credentails'])) {
            $userModel->attributes = $_POST['Credentails'];
            if ($userModel->save()) {
                Yii::app()->user->setFlash('success', "User has been updated successfully!");
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }
        $this->render('update_regional_manager', array(
            'model' => $model, 'userModel' => $userModel
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
        $dataProvider = new CActiveDataProvider('Mgmtcompany');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Mgmtcompany('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Mgmtcompany']))
            $model->attributes = $_GET['Mgmtcompany'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Mgmtcompany the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Mgmtcompany::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Mgmtcompany $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mgmtcompany-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
