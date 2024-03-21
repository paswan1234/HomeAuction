<?php

class PropertyDetailController extends Controller {

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
        $model = new PropertyDetail;

        $amenities = Amenities::model()->findAll('status="Active" and type="Property"');
        $property_id = Tools::getValue('propertyId');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PropertyDetail'])) {
            $model->attributes = $_POST['PropertyDetail'];
            if ($model->save()) {
                $pAmenities = new PropertyAmenities;

                $pAmenities->deleteAll('isNULL(id_floor_plan) and id_property = ' . $property_id);
                if (!empty($_POST['PropertyDetail']['amenities'])) {
                    foreach ($_POST['PropertyDetail']['amenities'] as $amenity) {
                        $pAmenities = new PropertyAmenities;
                        $pAmenities->id_amenity = $amenity;
                        $pAmenities->id_property = $property_id;
                        $pAmenities->save();
                    }
                }

                if (!empty($_POST['optional_ptext'])) {
                    foreach ($_POST['optional_ptext'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->save();
                        endif;
                    }
                }

                if (!empty($_POST['PropertyDetail']['otheramenities'])) {
                    foreach ($_POST['PropertyDetail']['otheramenities'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->save();
                        endif;
                    }
                }

                $pAmenities->deleteAll('id_floor_plan = 1 and id_property = ' . $property_id);
                if (!empty($_POST['PropertyDetail']['unitamenities'])) {
                    foreach ($_POST['PropertyDetail']['unitamenities'] as $amenity) {
                        $pAmenities = new PropertyAmenities;
                        $pAmenities->id_amenity = $amenity;
                        $pAmenities->id_property = $property_id;
                        $pAmenities->id_floor_plan = 1;
                        $pAmenities->save();
                    }
                }

                if (!empty($_POST['optional_utext'])) {
                    foreach ($_POST['optional_utext'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->id_floor_plan = 1;
                            $pAmenities->save();
                        endif;
                    }
                }


                if (!empty($_POST['PropertyDetail']['unitotheramenities'])) {
                    foreach ($_POST['PropertyDetail']['unitotheramenities'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->id_floor_plan = 1;
                            $pAmenities->save();
                        endif;
                    }
                }
            }

            $propDetail = Property::model()->findByPk($property_id);
            $token = Tools::getAdminToken();
            if ($propDetail->property_type == 'premium')
                $propertyUrl = "property/view/id/" . $propDetail->id_property . "?token=" . $token;
            else if ($propDetail->property_type == 'general')
                $propertyUrl = "property/view/general/id/" . $propDetail->id_property . "?token=" . $token;

            Yii::app()->user->setFlash('success', "Property Amenities details saved successfully!<a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'> Click here</a> to Preview");
        }

        $amenitiesU = Amenities::model()->findAll('status="Active" and type="Unit"');
        $amenities = Amenities::model()->findAll('status="Active"  and type="Property"');
        $otheramenities = PropertyAmenities::model()->findAll('id_property = ' . $property_id . ' and (id_floor_plan = 0 or ISNULL(id_floor_plan) and id_amenity = 0)');
        $otherunitamenities = PropertyAmenities::model()->findAll('id_property = ' . $property_id . ' and (id_floor_plan != 0 and id_floor_plan IS NOT NULL) and id_amenity = 0');


        $model->amenities = PropertyDetail::model()->getPropertyAmenities($property_id);
        $model->unitamenities = PropertyDetail::model()->getUnitAmenities($property_id);

        $model->otheramenities = PropertyDetail::model()->getPropertyOtherAmenities($property_id);
        $model->unitotheramenities = PropertyDetail::model()->getUnitOtherAmenities($property_id);

        $this->render('create', array(
            'model' => $model,
            'amenities' => $amenities,
            'amenitiesU' => $amenitiesU,
            'otheramenities' => $otheramenities,
            'otherunitamenities' => $otherunitamenities,
            'id_property' => $property_id,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = PropertyDetail::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $property_id = $model->id_property;

        if (isset($_POST['PropertyDetail'])) {
            $model->attributes = $_POST['PropertyDetail'];
            if ($model->save()) {
                $pAmenities = new PropertyAmenities;

                $pAmenities->deleteAll('(isNULL(id_floor_plan) or id_floor_plan = 0) and id_property = ' . $property_id);
                if (!empty($_POST['PropertyDetail']['amenities'])) {
                    foreach ($_POST['PropertyDetail']['amenities'] as $amenity) {
                        $pAmenities = new PropertyAmenities;
                        $pAmenities->id_amenity = $amenity;
                        $pAmenities->id_property = $property_id;
                        $pAmenities->save();
                    }
                }

                if (!empty($_POST['optional_ptext'])) {
                    foreach ($_POST['optional_ptext'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->save();
                        endif;
                    }
                }

                if (!empty($_POST['PropertyDetail']['otheramenities'])) {
                    foreach ($_POST['PropertyDetail']['otheramenities'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->save();
                        endif;
                    }
                }

                $pAmenities->deleteAll('(id_floor_plan = 1 or (id_floor_plan IS NOT NULL and id_floor_plan != 0)) and id_property = ' . $property_id);
                if (!empty($_POST['PropertyDetail']['unitamenities'])) {
                    foreach ($_POST['PropertyDetail']['unitamenities'] as $amenity) {
                        $pAmenities = new PropertyAmenities;
                        $pAmenities->id_amenity = $amenity;
                        $pAmenities->id_property = $property_id;
                        $pAmenities->id_floor_plan = 1;
                        $pAmenities->save();
                    }
                }

                if (!empty($_POST['optional_utext'])) {
                    foreach ($_POST['optional_utext'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->id_floor_plan = 1;
                            $pAmenities->save();
                        endif;
                    }
                }


                if (!empty($_POST['PropertyDetail']['unitotheramenities'])) {
                    foreach ($_POST['PropertyDetail']['unitotheramenities'] as $amenity) {
                        if ($amenity != ''):
                            $pAmenities = new PropertyAmenities;
                            $pAmenities->id_amenity = 0;
                            $pAmenities->id_property = $property_id;
                            $pAmenities->other = $amenity;
                            $pAmenities->id_floor_plan = 1;
                            $pAmenities->save();
                        endif;
                    }
                }
            }

            $propDetail = Property::model()->findByPk($property_id);
            $token = Tools::getAdminToken();
            if ($propDetail->property_type == 'premium')
                $propertyUrl = "property/view/id/" . $propDetail->id_property . "?token=" . $token;
            else if ($propDetail->property_type == 'general')
                $propertyUrl = "property/view/general/id/" . $propDetail->id_property . "?token=" . $token;

            Yii::app()->user->setFlash('success', "Property Amenities details saved successfully!<a href='" . Tools::getBaseUrl() . $propertyUrl . "' target='_blank'> Click here</a> to Preview");
        }


        $amenitiesU = Amenities::model()->findAll('status="Active" and type="Unit"');
        $amenities = Amenities::model()->findAll('status="Active"  and type="Property"');
        $otheramenities = PropertyAmenities::model()->findAll('id_property = ' . $property_id . ' and (id_floor_plan = 0 or ISNULL(id_floor_plan) and id_amenity = 0)');
        $otherunitamenities = PropertyAmenities::model()->findAll('id_property = ' . $property_id . ' and (id_floor_plan != 0 and id_floor_plan IS NOT NULL) and id_amenity = 0');


        $model->amenities = PropertyDetail::model()->getPropertyAmenities($property_id);
        $model->unitamenities = PropertyDetail::model()->getUnitAmenities($property_id);

        $model->otheramenities = PropertyDetail::model()->getPropertyOtherAmenities($property_id);
        $model->unitotheramenities = PropertyDetail::model()->getUnitOtherAmenities($property_id);

        $this->render('update', array(
            'model' => $model,
            'amenities' => $amenities,
            'amenitiesU' => $amenitiesU,
            'otheramenities' => $otheramenities,
            'otherunitamenities' => $otherunitamenities,
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
        $propertyId = Tools::getValue('propertyId', '');
        if (isset($propertyId) && $propertyId != '') {
            $model = new PropertyDetail;
            $isPropertyDetail = $model->findByAttributes(array('id_property' => $propertyId));
            if (isset($isPropertyDetail) && !is_null($isPropertyDetail))
                $this->redirect(array('update', 'id' => $isPropertyDetail->id_property_detail));

            else
                $this->redirect(array('create', 'propertyId' => $propertyId));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PropertyDetail('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PropertyDetail']))
            $model->attributes = $_GET['PropertyDetail'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PropertyDetail the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PropertyDetail::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PropertyDetail $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-detail-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

