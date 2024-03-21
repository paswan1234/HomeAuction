<?php

class PropertyController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'admin';

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
                'actions' => array('create', 'update', 'manageby'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'credentials'),
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
        $model = new Property;

        $propertyContactmodel = new PropertyContact;

        $propertyDetailmodel = new PropertyDetail;

        $propertyRating = new Rating;

        $propertyUtilityAllowancemodel = new PropertyUtilityAllowance;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Property'])) {
            $model->attributes = $_POST['Property'];

            //code added on 9-1-15 to remove spaces from the title and city.
            $model->property_title = trim($_POST['Property']['property_title']);
            $model->property_city = trim($_POST['Property']['property_city']);
            //code ends

            $model->id_user = 1;
            if ($model->save()) {

                //code to add property contact information 13-5-15
                if (isset($_POST['PropertyContact'])) {
                    $propertyContactmodel->attributes = $_POST['PropertyContact'];
                    $propertyContactmodel->id_property = $model->id_property;
                    $propertyContactmodel->save();
                }
                //code ends

                if ($model->property_type == 'premium')
                    $propertyUrl = "property/view/id/" . $model->id_property;
                else if ($model->property_type == 'general')
                    $propertyUrl = "property/view/general/id/" . $model->id_property;

                Yii::app()->user->setFlash('success', "Property information has been saved successfully! <a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'>Click here</a> to Preview");
                $this->redirect(array('update', 'id' => $model->id_property));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'propertyContactmodel' => $propertyContactmodel,
            'propertyDetailmodel' => $propertyDetailmodel,
            'propertyRating' => $propertyRating,
            'propertyUtilityAllowancemodel' => $propertyUtilityAllowancemodel
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $propertyContactmodel = PropertyContact::model()->findByAttributes(array('id_property' => $model->id_property));
        if (empty($propertyContactmodel))
            $propertyContactmodel = new PropertyContact;

        //CVarDumper::dump($propertyContactmodel,10,true);

        if (!is_null($model->propertyDetails))
            $propertyDetailmodel = PropertyDetail::model()->findByPk($model->propertyDetails->id_property_detail);
        else
            $propertyDetailmodel = new PropertyDetail;

        $propertyUtilityAllowancemodel = PropertyUtilityAllowance::model()->findByAttributes(array('property_id' => $model->id_property));
        if (empty($propertyUtilityAllowancemodel)) {
            $propertyUtilityAllowancemodel = new PropertyUtilityAllowance;
            $new_record = 1;
        }


        if (Yii::app()->db->createCommand('select count(0) from rating where id_property = ' . $model->id_property)->queryScalar() > 0)
            $propertyRating = Rating::model()->findByAttributes(array('id_property' => $model->id_property));
        else
            $propertyRating = new Rating;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Property'])) {

            $model->attributes = $_POST['Property'];

            //code added on 9-1-15 to remove spaces from the title and city.
            $model->property_title = trim($_POST['Property']['property_title']);
            $model->property_city = trim($_POST['Property']['property_city']);
            $model->facebook_page_url = trim($_POST['Property']['facebook_page_url']);
            $model->fb_btn_show = trim($_POST['Property']['fb_btn_show']);
            //code ends

            if ($model->save()) {

                //code to add property contact information 13-5-15
                if (isset($_POST['PropertyContact'])) {
                    $propertyContactmodel->attributes = $_POST['PropertyContact'];
                    $propertyContactmodel->id_property = $model->id_property;
                    $propertyContactmodel->isNewRecord = false;
                    $propertyContactmodel->save(false);
                }
                //code ends
                //Property Utility Allowance 
                if (isset($_POST['PropertyUtilityAllowance'])) {
                    $propertyUtilityAllowancemodel->attributes = $_POST['PropertyUtilityAllowance'];
                    $propertyUtilityAllowancemodel->property_id = $model->id_property;
                    $propertyUtilityAllowancemodel->isNewRecord = false;
                    if (!empty($new_record)) {
                        $propertyUtilityAllowancemodel->isNewRecord = true;
                    }
                    $propertyUtilityAllowancemodel->save(false);
                }
                //code ends


                $token = Tools::getAdminToken();
                if ($model->property_type == 'premium')
                    $propertyUrl = "property/view/id/" . $model->id_property . "?token=" . $token;
                else if ($model->property_type == 'general')
                    $propertyUrl = "property/view/general/id/" . $model->id_property . "?token=" . $token;

                Yii::app()->user->setFlash('success', "Property information has been saved successfully!<a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'> Click here</a> to Preview");
                $this->redirect(array('update', 'id' => $model->id_property));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'propertyContactmodel' => $propertyContactmodel,
            'propertyDetailmodel' => $propertyDetailmodel,
            'propertyRating' => $propertyRating,
            'propertyUtilityAllowancemodel' => $propertyUtilityAllowancemodel
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
        $dataProvider = new CActiveDataProvider('Property');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Property('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Property']))
            $model->attributes = $_GET['Property'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Property the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Property::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Property $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionManageby() {
        if (isset($_GET['term'])) {
            $criteria = new CDbCriteria;
            $criteria->alias = "manageby";
            $criteria->condition = "manageby.name like '" . $_GET['term'] . "%'";

            $dataProvider = new CActiveDataProvider(get_class(Mgmtcompany::model()), array(
                'criteria' => $criteria, 'pagination' => false,
            ));
            $mgmcompnies = $dataProvider->getData();

            $return_array = array();
            foreach ($mgmcompnies as $mgmcompny) {
                $return_array[] = array(
                    'label' => $mgmcompny->name,
                    'value' => $mgmcompny->name,
                    'id' => $mgmcompny->id,
                );
            }

            echo CJSON::encode($return_array);
        }
    }

    public function actionCredentials($id) {

        $model = $this->loadModel($id);
        $mgm_id = $model->managed_by;
        $sql = "select count(*) from users where user_type NOT IN ('rpm', 'pm', 'renter') AND mgm_id = " . $mgm_id. " AND prop_id = ".$id;
        $count = Yii::app()->db->createCommand($sql)->queryScalar();
        $username = '';
        if ($count > 0) {
            $sql = "select username,id_user from users WHERE user_type NOT IN ('rpm', 'pm', 'renter') AND mgm_id = " . $mgm_id. " AND prop_id = ".$id;
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
                    $sql = "select count(*) from users where username = '" . $_POST['Credentails']['username'] . "' and mgm_id != " . $mgm_id;
                    $count1 = Yii::app()->db->createCommand($sql)->queryScalar();
                    if ($count1 > 0) {
                        Yii::app()->user->setFlash('success', "Username already exists");
                    } else {
                        if ($_POST['Credentails']['password'] == '') {
                            $sql = "update users set username = '" . $_POST['Credentails']['username'] . "' where user_type NOT IN ('rpm', 'pm', 'renter') AND mgm_id =" . $mgm_id;
                            $count1 = Yii::app()->db->createCommand($sql)->query();
                        } else {
                            $sql = "update users set username = '" . $_POST['Credentails']['username'] . "',password = '" . md5($_POST['Credentails']['password']) . "' where user_type NOT IN ('rpm', 'pm', 'renter') AND mgm_id =" . $mgm_id;
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
                        $sql = "insert into users (username, password, prop_id, mgm_id, user_type) values('" . $_POST['Credentails']['username'] . "','" . md5($_POST['Credentails']['password']) . "'," . $id . "," . $mgm_id . ", 'prowner')";
                        $count1 = Yii::app()->db->createCommand($sql)->query();
                    }
                }
            }
        }
        $this->render('credentials', array('model' => $model, 'userdetail' => $userdetail));
    }

}
