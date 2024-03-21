<?php

class BillingController extends Controller {

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin','changestatus'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
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
    public function actionAdmin() {
        $model = new Billing;
        $paidamount = Yii::app()->db->createCommand('select SUM(amount) as paid from billing where status="PAID"')->queryScalar();
        $pendingamount = Yii::app()->db->createCommand('select SUM(amount) as pending from billing where status="PENDING"')->queryScalar();

        $this->render('admin', array(
            'model' => $model,
            'paidamount' => $paidamount,
            'pendingamount' => $pendingamount,
        ));
    }

    public function actionChangestatus($id) {
        $model = new Billing;
        $model->ChangePaymentStatus($id);

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        
        $this->redirect(array('billing/admin'));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
}
