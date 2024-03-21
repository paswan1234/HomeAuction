<?php

class PropertyDealsController extends Controller {

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
        $model = new PropertyDeals;
        $id = Tools::getValue('propertyId');


        if (isset($_POST['header'])) {
           $header_desc = $_POST['header'];
            if ($header_desc == 2)
                $header_values = serialize(array($_POST['ah2']));

            if ($header_desc == 3)
                $header_values = serialize(array($_POST['ah31'], $_POST['ah32'], $_POST['ah33'], $_POST['ah34']));

            if ($header_desc == 4)
                $header_values = serialize(array($_POST['ah41'], $_POST['ah42'], $_POST['ah43']));

            if ($header_desc == 5)
                $header_values = serialize(array($_POST['ah51']));
            if ($header_desc == 6)
                $header_values = serialize(array($_POST['ah6']));

            if ($header_desc == 7)
                $header_values = serialize(array($_POST['ah71'], $_POST['ah72'], $_POST['ah73']));

           $specials_desc = $_POST['specials'];
            if ($specials_desc == 1)
                $special_value = serialize(array($_POST['sp1']));

            if ($specials_desc == 5)
                $special_value = serialize(array($_POST['sp5']));

            if ($specials_desc == 6)
                $special_value = serialize(array($_POST['sp6']));

            if ($specials_desc == 7)
               $special_value = serialize(array($_POST['sp7']));

            $from_date = explode('-', $_POST['PropertyDeals']['time_frame_from']);
            $to_date = explode('-', $_POST['PropertyDeals']['time_frame_to']);

            $time_from = date('Y-m-d', mktime('0', '0', '0', $from_date[0], $from_date[1], $from_date[2]));

            $time_to = date('Y-m-d', mktime('0', '0', '0', $to_date[0], $to_date[1], $to_date[2]));

            if (is_array($_POST['floorplan']))
                $floor_plans = implode(',', $_POST['floorplan']);

            $count = Yii::app()->db->createCommand("select count(*) from property_deals where id_property=" . $id)->queryScalar();
            //var_dump($count);die;
            if ($count > 0) {
 
                Yii::app()->db->createCommand('update property_deals set header_description = "' . $header_desc . '",header_value="' . mysql_escape_string($header_values) . '",special="' . $specials_desc . '",
                    
                special_value="' . mysql_escape_string($special_value) . '",time_frame_from="' . $time_from . '",time_frame_to="' . $time_to . '",floor_plans="' . $floor_plans . '" where id_property=' . $id)->query();

            } else {
                Yii::app()->db->createCommand('insert into property_deals set id_property=' . $id . ',header_description = "' . $header_desc . '",header_value="' . mysql_escape_string($header_values) . '",special="' . $specials_desc . '",
                    
                special_value="' . mysql_escape_string($special_value) . '",time_frame_from="' . $time_from . '",time_frame_to="' . $time_to . '",floor_plans="' . $floor_plans . '"')->query();
            }

            $propDetail = Property::model()->findByPk($id);
            $token = Tools::getAdminToken();
            if ($propDetail->property_type == 'premium')
                $propertyUrl = "property/view/id/" . $propDetail->id_property . "?token=" . $token;
            else if ($propDetail->property_type == 'general')
                $propertyUrl = "property/view/general/id/" . $propDetail->id_property . "?token=" . $token;

            Yii::app()->user->setFlash('success', "Property Deals/Specials has been saved successfully!<a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'> Click here</a> to Preview");
        }

        $dealDetail = Yii::app()->db->createCommand('select * from property_deals where id_property=' . $id)->queryRow();
        if (!is_null($dealDetail)):
            $header_desc = $dealDetail['header_description'];
            $header_values = $dealDetail['header_value'];
            $specials_desc = $dealDetail['special'];
            $special_value = $dealDetail['special_value'];
            $time_from = $dealDetail['time_frame_from'];
            $time_to = $dealDetail['time_frame_to'];
            if ($time_from != '' && $time_from != '1970-01-01' && $time_from != '0000-00-00') {
                $time_from = explode('-', $dealDetail['time_frame_from']);
                $from_time = date('m-d-Y', mktime(0, 0, 0, $time_from[1], $time_from[2], $time_from[0]));
            } else {
                $from_time = date('m-d-Y');
            }

            if ($time_to != '' && $time_to != '1970-01-01' && $time_to != '0000-00-00') {
                $time_to = explode('-', $dealDetail['time_frame_to']);
                $to_time = date('m-d-Y', mktime(0, 0, 0, $time_to[1], $time_to[2], $time_to[0]));
            } else {
                $to_time = date('m-d-Y', strtotime('+3 month'));
            }


            $floor_plans = explode(',', $dealDetail['floor_plans']);
        endif;


        $this->render('create', array('id_property' => $id, 'model' => $model, 'header_desc' => $header_desc, 'header_value' => unserialize($header_values),
            'specials' => $specials_desc, 'specials_value' => unserialize($special_value), 'time_frame_from' => $from_time, 'time_frame_to' => $to_time));
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

        if (isset($_POST['PropertyDeals'])) {
            $model->attributes = $_POST['PropertyDeals'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_property_delas));
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
        $dataProvider = new CActiveDataProvider('PropertyDeals');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PropertyDeals('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PropertyDeals']))
            $model->attributes = $_GET['PropertyDeals'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PropertyDeals the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PropertyDeals::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PropertyDeals $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-deals-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}