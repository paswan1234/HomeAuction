<?php

class PropertyLeadController extends Controller {

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
                'actions' => array('admin', 'delete', 'propertydetail', 'Leaddetail', 'leadreport'),
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
        $model = new PropertyLead;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['PropertyLead'])) {
            $model->attributes = $_POST['PropertyLead'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_property_lead));
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

        if (isset($_POST['PropertyLead'])) {
            $model->attributes = $_POST['PropertyLead'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_property_lead));
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
        $dataProvider = new CActiveDataProvider('PropertyLead');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PropertyLead('search');
        Yii::setPathOfAlias('YiiRecaptcha',Yii::getPathOfAlias("application.extensions.yii-recaptcha"));
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PropertyLead']))
            $model->attributes = $_GET['PropertyLead'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PropertyLead the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PropertyLead::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PropertyLead $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-lead-form') {
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
        Yii::setPathOfAlias('YiiRecaptcha',Yii::getPathOfAlias("application.extensions.yii-recaptcha"));
        $ldetail = PropertyLead::model()->findByPk($lid);

        $this->layout = '//layouts/ajaxlayout';
        $this->render('leaddetail', array(
            'model' => $ldetail,
        ));
    }

    public function actionLeadreport() {

        $mgm_id = '';
        Yii::setPathOfAlias('YiiRecaptcha',Yii::getPathOfAlias("application.extensions.yii-recaptcha"));

        if (isset($_POST['mgm_id'])):
            $mgm_id = Tools::getValue('mgm_id', 0);

            $from = Tools::getValue('from', date('m/d/Y', strtotime('2000-10-10')));
            $to = Tools::getValue('to', date('m/d/Y'));

            if ($from == 0 || $from == '')
                $from = date('m/d/Y', strtotime('2000-10-10'));
            if ($to == 0 || $to == '')
                $to = date('m/d/Y');

            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));


            $sql = "select pl.id_property pid,(select property_title from property where id_property = pl.id_property) pname,pl.id_property_lead lead_id, concat(pl.first_name,' ',pl.last_name) name ,DATE_FORMAT(pl.created_at,'%m/%d/%Y %r') date, pl.email_address email, pl.move_date mdate, pl.phone phone,pl.message message,if(`lead_type` = 'weblead','3','2') leadt,if(`lead_type` = 'weblead','Check Availability','Apply Now') lead_type from property p
        right join property_lead pl on p.id_property = pl.id_property where p.managed_by = " . $mgm_id . " and  (pl.created_at >= '" . $from . "' and pl.created_at <= '" . $to . "')
            UNION 
        select e.id_property pid,(select property_title from property where id_property = e.id_property) pname,e.id_email_lead lead_id,e.name ,DATE_FORMAT(e.created_at,'%m/%d/%Y %r') date, e.email email, '' mdate, e.phone phone,e.message message,'1' leadt,'Email Lead' lead_type from property p
        right join email_lead e on p.id_property = e.id_property where p.managed_by = " . $mgm_id . " and  (e.created_at >= '" . $from . "' and e.created_at <= '" . $to . "') order by pname ASC,leadt ASC , lead_id DESC ";

            $leads = Yii::app()->db->createCommand($sql)->queryAll();

            $dataProvider = new CArrayDataProvider($leads, array(
                        'id' => 'user',
                        'pagination' => array(
                            'pageSize' => 100,
                        ),
                    ));

            $showlink = false;
            if ($_POST['csv'] == 'Save to file'):
                Yii::import('ext.ECSVExport.ECSVExport');
                $leadsData = array();
                if (count($leads) > 0):
                    foreach ($leads as $lead):
                        $temp['Property ID'] = $lead['pid'];
                        $temp['Property Name'] = $lead['pname'];
                        $temp['Name'] = $lead['name'];
                        $temp['Email'] = $lead['email'];
                        $temp['Phone'] = $lead['phone'];
                        $temp['Date'] = $lead['date'];

                        $temp['Lead Type'] = $lead['lead_type'];
                        $data[] = $temp;
                        $showlink = true;
                    endforeach;

                    $filename = './csv/leadreport.csv';
                    $csv = new ECSVExport($data);
                    $csv->toCSV($filename); // returns string by default
                endif;
            endif;

        endif;
        $this->render('leadreport', array(
            'leads' => $leads, 'mgm_id' => $mgm_id, 'showlink' => $showlink, 'dataProvider' => $dataProvider
        ));
    }

}


