<?php

class SettingsController extends Controller {

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
                'actions' => array('add', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'add', 'uploadPropertyCSV'),
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
    public function actionAdd() {
        $model = new Settings;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Settings'])) {
            foreach ($_POST['Settings'] as $key => $value):
                Yii::app()->db->createCommand('update settings set value = "' . $value . '" where setting_key = "' . $key . '"')->query();
            endforeach;
        }

        $settings = $model->findAll();

        $this->render('add', array(
            'model' => $model,
            'settings' => $settings,
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

        if (isset($_POST['PropertyType'])) {
            $model->attributes = $_POST['PropertyType'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_property_type));
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
        $dataProvider = new CActiveDataProvider('PropertyType');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PropertyType('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PropertyType']))
            $model->attributes = $_GET['PropertyType'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PropertyType the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PropertyType::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PropertyType $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-type-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionUploadPropertyCSV() {
        ini_set('max_execution_time', 0);
        $uploadpath = 'csv';

        if (isset($_FILES['uploadfile'])):
            $photo = CUploadedFile::getInstanceByName('uploadfile');
            $photoName = $photo->getName();
            $photo->saveAs($uploadpath . '/' . $photoName);

            $file = fopen($uploadpath . '/' . $photoName, "r");
            $y = 0;
            while (!feof($file)) {
                $row = fgetcsv($file);
                if ($y > 0 && $row[5] != ''):
                    $user = 1;
                    if ($_POST['managed_by'] != '')
                        $managed_by = $_POST['managed_by'];
                    else
                        $managed_by = '';

                    $property_title = mysql_escape_string($row[5]);
                    $property_address = mysql_escape_string($row[7]);
                    $property_city = $row[8];
                    $property_state = $row[9];
                    $property_zip = $row[10];
                    $property_type = $row[4] != '' ? strtolower($row[4]) : 'premium';
                    $phone = $row[11];
                    $fax = $row[12];
                    $url = mysql_escape_string($row[15]);
                    $description = mysql_escape_string($row[18]);
                    $lat = '';
                    $lng = '';

                    $keyword = $property_address . ", " . $property_city . ", " . $property_state . ", " . $property_zip;

                    $url = "http://dev.virtualearth.net/REST/v1/Locations?query=" . urlencode($keyword) . "&output=json&key=AhItwEcxApAeZ1jzzY9pVDAdR-gdxhfuU3EjHMyewmO31ZsNdpj32VKlkGK4889_";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $content = curl_exec($ch);
                    $res = json_decode($content);
                    $lat = $res->resourceSets[0]->resources[0]->geocodePoints[0]->coordinates[0];
                    $lng = $res->resourceSets[0]->resources[0]->geocodePoints[0]->coordinates[1];
                    curl_close($ch);
                    

                    $created_at = date('Y-m-d h:i:s');
                    $status = 'Pending';

                    //Property Information

                    $property_sql = "insert into property (`id_user`, `property_title`, `property_address`, `property_city`, `property_state`, 
                        `property_zip`, `property_type`, `phone`, `fax`, `url`, `description`,`managed_by`,`lat`, `lng`,`created_at`,`status`)
                        values
                        (" . $user . ",'" . $property_title . "','" . $property_address . "','" . $property_city . "','" . $property_state . "','" . $property_zip . "','" . $property_type . "',
                            '" . $phone . "','" . $fax . "','" . $url . "','" . $description . "','" . $managed_by . "','" . $lat . "','" . $lng . "','" . $created_at . "','" . $status . "')";

                    Yii::app()->db->createCommand($property_sql)->query();

                    $property_id = Yii::app()->db->getLastInsertId();

                    //Property Contact Information

                    $contact_person = explode(" ", $row[13]);
                    $contact_f_name = mysql_escape_string($contact_person[0]);
                    $contact_l_name = mysql_escape_string($contact_person[1]);
                    $contact_email = $row[14];

                    $property_contact = "insert into property_contact (`id_property`,`contact_first_name`,`contact_last_name`,`phone`,`fax`,`email`) values 
                         (" . $property_id . ",'" . $contact_f_name . "','" . $contact_l_name . "','" . $phone . "','" . $fax . "','" . $contact_email . "')";

                    Yii::app()->db->createCommand($property_contact)->query();


                    //Property Details

                    $lease_lenght = mysql_escape_string($row[31]);
                    $min_bed = $row[19];
                    $max_bed = $row[20];
                    $min_rent = str_replace('$', '', $row[21]);
                    $max_rent = str_replace('$', '', $row[22]);
                    if ($row[27] == 0) {
                        $subsidized = 'No';
                        $income_one = 0;
                        $income_two = 0;
                        $income_three = 0;
                        $income_four = 0;
                        $income_five = 0;
                        $income_six = 0;
                        $income_seven = 0;
                        $income_eight = 0;
                    }
                    if ($row[27] == 1) {
                        $subsidized = 'Yes';
                        if ($row[62] == '' || $row[62] == 0) {
                            $income_one = 0;
                            $income_two = 0;
                            $income_three = 0;
                            $income_four = 0;
                            $income_five = 0;
                            $income_six = 0;
                            $income_seven = 0;
                            $income_eight = 0;
                        } else {
                            $income_one = str_replace(',', '', $row[62]);
                            $income_two = str_replace(',', '', $row[63]);
                            $income_three = str_replace(',', '', $row[64]);
                            $income_four = str_replace(',', '', $row[65]);
                            $income_five = str_replace(',', '', $row[66]);
                            $income_six = str_replace(',', '', $row[67]);
                            $income_seven = str_replace(',', '', $row[68]);
                            $income_eight = str_replace(',', '', $row[69]);
                        }
                    }
                    if ($row[23] == 0)
                        $seniorprop = 'No';
                    else {
                        $seniorprop = 'Yes';
                        $senoirpropval = '55';
                    }

                    if ($row[25] == 0)
                        $handicap = 'No';
                    else
                        $handicap = 'Yes';

                    if ($row[26] == 0)
                        $coq = 'No';
                    else
                        $coq = 'Yes';

                    if ($row[24] == 0)
                        $section8 = 'No';
                    else
                        $section8 = 'Yes';

                    if ($row[28] == 0)
                        $pet_allowed = 'No';
                    else
                        $pet_allowed = 'Yes';

                    $other_term = mysql_escape_string($row[29]);

                    $hours = mysql_escape_string($row[16]);

                    Yii::app()->db->createCommand("insert into property_detail (`id_property`, `lease_length`, `min_bed`, `max_bed`, `min_rent`, 
                        `max_rent`, `subsidized`, `seniorprop`, `handicap`, `coq`, `section8`, `seniorpropval`, `income_limit_one_person`, 
                        `income_limit_two_person`, `income_limit_three_person`, `income_limit_four_person`, `income_limit_five_person`, 
                        `income_limit_six_person`, `income_limit_seven_person`, `income_limit_eight_person`, `pet_allowed`, `other_term`, 
                        `hours`) values (" . $property_id . ",'" . $lease_lenght . "','" . $min_bed . "','" . $max_bed . "','" . $min_rent . "','" . $max_rent . "'
                            ,'" . $subsidized . "','" . $seniorprop . "','" . $handicap . "','" . $coq . "','" . $section8 . "','" . $senoirpropval . "'," . $income_one . "
                        ," . $income_two . "," . $income_three . "," . $income_four . "," . $income_five . "," . $income_six . "," . $income_seven . "," . $income_eight . "
                            ,'" . $pet_allowed . "','" . $other_term . "','" . $hours . "')")->query();

                    //Property Unity Amenities

                    for ($i = 32; $i <= 46; $i++) {
                        if ($row[$i] != ''):
                            $count = Yii::app()->db->createCommand("select count(*) as cnt,id_amenity from amenities where type='Unit' and name LIKE '%" . $row[$i] . "%'")->queryRow();
                            if ($count['cnt'] > 0) {
                                $pAmenities = new PropertyAmenities;
                                $pAmenities->id_amenity = $count['id_amenity'];
                                $pAmenities->id_property = $property_id;
                                $pAmenities->id_floor_plan = 1;
                                $pAmenities->save();
                            } else {
                                $pAmenities = new PropertyAmenities;
                                $pAmenities->id_amenity = 0;
                                $pAmenities->id_property = $property_id;
                                $pAmenities->other = mysql_escape_string($row[$i]);
                                $pAmenities->id_floor_plan = 1;
                                $pAmenities->save();
                            }
                        endif;
                    }


                    //Property Amenities

                    for ($i = 47; $i <= 61; $i++) {
                        if ($row[$i] != ''):
                            $count = Yii::app()->db->createCommand("select count(*) as cnt,id_amenity from amenities where type='Property' and name LIKE '%" . $row[$i] . "%'")->queryRow();
                            if ($count['cnt'] > 0) {
                                $pAmenities = new PropertyAmenities;
                                $pAmenities->id_amenity = $count['id_amenity'];
                                $pAmenities->id_property = $property_id;
                                $pAmenities->save();
                            } else {
                                $pAmenities = new PropertyAmenities;
                                $pAmenities = new PropertyAmenities;
                                $pAmenities->id_amenity = 0;
                                $pAmenities->id_property = $property_id;
                                $pAmenities->other = mysql_escape_string($row[$i]);
                                $pAmenities->save();
                            }
                        endif;
                    }

                    //Property Speciuals


                    Yii::app()->db->createCommand('insert into property_deals set id_property=' . $property_id . ',header_description = "",header_value="",special="7",
                    
                special_value="' . mysql_escape_string($row[30]) . '"')->query();

                    //Property Floor Plan


                    for ($fc = 1; $fc <= 8; $fc++):
                        if (($fc == 1 && $row[90] != '') || ($fc == 2 && $row[98] != '') || ($fc == 3 && $row[106] != '')
                                || ($fc == 4 && $row[114] != '') || ($fc == 5 && $row[122] != '') || ($fc == 6 && $row[130] != '') || ($fc == 7 && $row[138] != '')
                                || ($fc == 8 && $row[146] != '')):


                            $PropertyFloorPlanmodel = new PropertyFloorPlan;

                            if ($fc == 1):
                                
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[90];
                                $PropertyFloorPlanmodel->beds = $row[91];
                                $PropertyFloorPlanmodel->baths = $row[92];
                                $PropertyFloorPlanmodel->square_feet_from = $row[93];
                                $PropertyFloorPlanmodel->square_feet_to = $row[93];
                                $PropertyFloorPlanmodel->units = $row[89];
                                if (strtolower($row[94]) == 'please call' || strtolower($row[94]) == 'one month rent' || strtolower($row[94]) == 'one month\'s rent' || strtolower($row[94]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[94];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[94]);
                                endif;

                                if ($row[95] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[95], '-')) {
                                        $rent = str_replace('$', '', $row[95]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[95]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;


                            if ($fc == 2):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[98];
                                $PropertyFloorPlanmodel->beds = $row[99];
                                $PropertyFloorPlanmodel->baths = $row[100];
                                $PropertyFloorPlanmodel->square_feet_from = $row[101];
                                $PropertyFloorPlanmodel->square_feet_to = $row[101];
                                $PropertyFloorPlanmodel->units = $row[97];
                                if (strtolower($row[102]) == 'please call' || strtolower($row[102]) == 'one month rent' || strtolower($row[102]) == 'one month\'s rent' || strtolower($row[102]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[102];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[102]);
                                endif;

                                if ($row[103] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[103], '-')) {
                                        $rent = str_replace('$', '', $row[103]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[103]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;



                            if ($fc == 3):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[106];
                                $PropertyFloorPlanmodel->beds = $row[107];
                                $PropertyFloorPlanmodel->baths = $row[108];
                                $PropertyFloorPlanmodel->square_feet_from = $row[109];
                                $PropertyFloorPlanmodel->square_feet_to = $row[109];
                                $PropertyFloorPlanmodel->units = $row[105];
                                if (strtolower($row[110]) == 'please call' || strtolower($row[110]) == 'one month rent' || strtolower($row[110]) == 'one month\'s rent' || strtolower($row[110]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[110];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[110]);
                                endif;

                                if ($row[111] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[111], '-')) {
                                        $rent = str_replace('$', '', $row[111]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[111]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;

                            if ($fc == 4):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[114];
                                $PropertyFloorPlanmodel->beds = $row[115];
                                $PropertyFloorPlanmodel->baths = $row[116];
                                $PropertyFloorPlanmodel->square_feet_from = $row[117];
                                $PropertyFloorPlanmodel->square_feet_to = $row[117];
                                $PropertyFloorPlanmodel->units = $row[113];
                                if (strtolower($row[118]) == 'please call' || strtolower($row[118]) == 'one month rent' || strtolower($row[118]) == 'one month\'s rent' || strtolower($row[118]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[118];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[118]);
                                endif;

                                if ($row[119] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[119], '-')) {
                                        $rent = str_replace('$', '', $row[119]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[119]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;

                            if ($fc == 5):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[122];
                                $PropertyFloorPlanmodel->beds = $row[123];
                                $PropertyFloorPlanmodel->baths = $row[124];
                                $PropertyFloorPlanmodel->square_feet_from = $row[125];
                                $PropertyFloorPlanmodel->square_feet_to = $row[125];
                                $PropertyFloorPlanmodel->units = $row[121];
                                if (strtolower($row[126]) == 'please call' || strtolower($row[126]) == 'one month rent' || strtolower($row[126]) == 'one month\'s rent' || strtolower($row[126]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[126];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[126]);
                                endif;

                                if ($row[127] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[127], '-')) {
                                        $rent = str_replace('$', '', $row[127]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[127]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;


                            if ($fc == 6):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[130];
                                $PropertyFloorPlanmodel->beds = $row[131];
                                $PropertyFloorPlanmodel->baths = $row[132];
                                $PropertyFloorPlanmodel->square_feet_from = $row[133];
                                $PropertyFloorPlanmodel->square_feet_to = $row[133];
                                $PropertyFloorPlanmodel->units = $row[129];
                                if (strtolower($row[134]) == 'please call' || strtolower($row[134]) == 'one month rent' || strtolower($row[134]) == 'one month\'s rent' || strtolower($row[134]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[134];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[134]);
                                endif;

                                if ($row[135] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[135], '-')) {
                                        $rent = str_replace('$', '', $row[135]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[135]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;


                            if ($fc == 7):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[138];
                                $PropertyFloorPlanmodel->beds = $row[139];
                                $PropertyFloorPlanmodel->baths = $row[140];
                                $PropertyFloorPlanmodel->square_feet_from = $row[141];
                                $PropertyFloorPlanmodel->square_feet_to = $row[141];
                                $PropertyFloorPlanmodel->units = $row[137];
                                if (strtolower($row[142]) == 'please call' || strtolower($row[142]) == 'one month rent' || strtolower($row[142]) == 'one month\'s rent' || strtolower($row[142]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[142];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[142]);
                                endif;

                                if ($row[143] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[143], '-')) {
                                        $rent = str_replace('$', '', $row[143]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[143]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;


                            if ($fc == 8):
                                $PropertyFloorPlanmodel->id_property = $property_id;
                                $PropertyFloorPlanmodel->floor_plan_name = $row[146];
                                $PropertyFloorPlanmodel->beds = $row[147];
                                $PropertyFloorPlanmodel->baths = $row[148];
                                $PropertyFloorPlanmodel->square_feet_from = $row[149];
                                $PropertyFloorPlanmodel->square_feet_to = $row[149];
                                $PropertyFloorPlanmodel->units = $row[145];
                                if (strtolower($row[150]) == 'please call' || strtolower($row[150]) == 'one month rent' || strtolower($row[150]) == 'one month\'s rent' || strtolower($row[150]) == 'income based'):
                                    $PropertyFloorPlanmodel->required_deposit = $row[150];
                                else:
                                    $PropertyFloorPlanmodel->required_deposit = mysql_escape_string($row[150]);
                                endif;

                                if ($row[151] == '')
                                    $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                else {
                                    if (strstr($row[151], '-')) {
                                        $rent = str_replace('$', '', $row[151]);
                                        $rent = explode('-', $rent);
                                        $rent_from = trim(str_replace('.00','',$rent[0]));
                                        $rent_to = trim(str_replace('.00','',$rent[1]));
                                        $PropertyFloorPlanmodel->rent_from = $rent_from;
                                        $PropertyFloorPlanmodel->rent_to = $rent_to;
                                    } else {
                                        $rent = trim(str_replace('$', '', $row[151]));
                                        $rent = str_replace('.00', '', $rent);
                                        if (is_numeric($rent)) {
                                            $rent_from = $rent;
                                            $rent_to = $rent;
                                            $PropertyFloorPlanmodel->rent_from = $rent_from;
                                            $PropertyFloorPlanmodel->rent_to = $rent_to;
                                        } else {
                                            $PropertyFloorPlanmodel->deposit_description = 'Please Call';
                                        }
                                    }
                                }

                                $PropertyFloorPlanmodel->save();
                            endif;

                        endif;
                    endfor;
                endif;
                $y++;
            }
            Yii::app()->user->setFlash('success', "Your CSV file uploaded successfully");
            fclose($file);
        endif;

        $this->render('uploadcsv');
    }

}

