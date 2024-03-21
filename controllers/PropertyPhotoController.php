<?php

class PropertyPhotoController extends Controller {

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
        $model = new PropertyPhoto;
        $property_id = Tools::getValue('propertyId');
        $uploadpath = "uploaded";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PropertyPhoto'])) {
            $model->attributes = $_POST['PropertyPhoto']; 
            $photo = CUploadedFile::getInstance($model, 'photo'); 

            $photoName = $photo->getName();
            // by bhupendra to overcome for duplication overrite issue becuase all the images go to the same directory 
            $photoName = 'prop_'.time().'_'.$photoName;
            $model->photo = $uploadpath . "/" . $photoName;

           if ($model->save()) {

                $propDetail = Property::model()->findByPk($property_id);
                $token = Tools::getAdminToken();
                if ($propDetail->property_type == 'premium')
                    $propertyUrl = "property/view/id/" . $propDetail->id_property . "?token=" . $token;
                else if ($propDetail->property_type == 'general')
                    $propertyUrl = "property/view/general/id/" . $propDetail->id_property . "?token=" . $token;

                Yii::app()->user->setFlash('success', "New Property photo has been added successfully!<a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'> Click here</a> to Preview");
                $photo->saveAs($uploadpath . '/' . $photoName);
                $extensionImage = explode(".", $photoName);
                if(strtolower($extensionImage[1]) == 'jpg') {
                    $image = imagecreatefromjpeg($uploadpath . '/' . $photoName);
                    $destination_url = $uploadpath . '/' . $extensionImage[0].'_low'.$extensionImage[1];
                    $bool = imagejpeg($image, $destination_url, 85);
                    if ($bool) {
                        rename($destination_url, $uploadpath . '/' . $photoName);
                    }
                }
                elseif(strtolower($extensionImage[1]) == 'png') {
                    $image = imagecreatefrompng($uploadpath . '/' . $photoName);
                    $destination_url = $uploadpath . '/' . $extensionImage[0].'_low'.$extensionImage[1];
                    $bool = imagepng($image, $destination_url, 8);
                    if ($bool) {
                        rename($destination_url, $uploadpath . '/' . $photoName);
                    }
                }
                
                
                $this->redirect(array('create', 'propertyId' => $property_id));
            }
        }

       $this->render('create', array(
            'model' => $model,
            'id_property' => $property_id,
        ));
    }

   
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $property_id = $model->id_property;
        $uploadpath = "uploaded";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PropertyPhoto'])) {
            $model->attributes = $_POST['PropertyPhoto'];

            $photo = CUploadedFile::getInstance($model, 'photo');

            if (!is_null($photo) && isset($photo)) {
                $photoName = $photo->getName();
                $photoName = 'prop_'.time().'_'.$photoName;
                $model->photo = $uploadpath . "/" . $photoName;
                $photo->saveAs($uploadpath . '/' . $photoName);
                
                $extensionImage = explode(".", $photoName);
                if(strtolower($extensionImage[1]) == 'jpg') {
                    $image = imagecreatefromjpeg($uploadpath . '/' . $photoName);
                    $destination_url = $uploadpath . '/' . $extensionImage[0].'_low'.$extensionImage[1];
                    $bool = imagejpeg($image, $destination_url, 85);
                    if ($bool) {
                        rename($destination_url, $uploadpath . '/' . $photoName);
                    }
                }
                elseif(strtolower($extensionImage[1]) == 'png') {
                    $image = imagecreatefrompng($uploadpath . '/' . $photoName);
                    $destination_url = $uploadpath . '/' . $extensionImage[0].'_low'.$extensionImage[1];
                    $bool = imagepng($image, $destination_url, 8);
                    if ($bool) {
                        rename($destination_url, $uploadpath . '/' . $photoName);
                    }
                }
            }
            else
                $model->photo = $_POST['PropertyPhoto']['old_photo'];

            if ($model->save()) {

                $propDetail = Property::model()->findByPk($property_id);
                $token = Tools::getAdminToken();
                if ($propDetail->property_type == 'premium')
                    $propertyUrl = "property/view/id/" . $propDetail->id_property . "?token=" . $token;
                else if ($propDetail->property_type == 'general')
                    $propertyUrl = "property/view/general/id/" . $propDetail->id_property . "?token=" . $token;

                Yii::app()->user->setFlash('success', "Property photo has been updated successfully!<a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'> Click here</a> to Preview");
                $this->redirect(array('create', 'propertyId' => $property_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'id_property' => $property_id,
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
        $dataProvider = new CActiveDataProvider('PropertyPhoto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PropertyPhoto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PropertyPhoto']))
            $model->attributes = $_GET['PropertyPhoto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PropertyPhoto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PropertyPhoto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PropertyPhoto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-photo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

