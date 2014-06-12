<?php
/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: UploadAction.php
 * Last Update Date: 11-09-2013
 *
 * **This is the Upload Action Page.
 */

class UploadAction extends CAction
{
    /*
     * Action controller for Admin index page
     */
    public function run()
    {
        $user_id = 0;
        $enable_import = false;

        if (isset($_POST['user'])) {

            $user_id = $_POST['user'];

        } else {

            $user_id = Yii::app()->user->id;
        }

        if (isset($_FILES['zipfile'])) {

            $temp = CUploadedFile::getInstanceByName("zipfile");

            if ($temp->type != 'application/x-zip-compressed') {

                Yii::app()->user->setFlash('error', 'Invalid file format. Please upload a ZIP file');

            } else {

                $temp->saveAs(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . '.zip');
                $enable_import = true;

                Yii::app()->user->setFlash('success', 'ZIP file uploded, please click Import button to proceed');
            }
        }

        if (Yii::app()->request->isAjaxRequest && isset($_GET['import'])) {

            Yii::import('ext.yexcel.Yexcel');

            $src = Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . '.zip';
            $dest = Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id;

            $zip = new ZipArchive();
            if ($zip->open($src)===true)
            {
                $zip->extractTo($dest);
                $zip->close();

                $yexcel = new Yexcel();
                $sheet_array = $yexcel->readActiveSheet(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR . 'property.xlsx');

                $rowCount = 0;
                foreach ($sheet_array as $row) {

                    if ($rowCount > 0) {

                        $property = new Property();
                        $propertytyperelation = new Propertytyperelation();

                        $property->owner = $user_id;
                        $property->agent = $user_id;
                        $property->otheragent = 0;
                        $property->availabledate = date("Y-m-d", strtotime("+1 month", strtotime(date('Y-m-d')))); /*@TODO need to remove this*/
                        $property->entrydate = date("Y-m-d");
                        $property->status = 1;
                        $property->pricetype = 1;

                        $property->type = $row['B'];
                        $property->propcondition = $row['D'];
                        $property->weeklyrent = $row['E'];
                        $property->monthlyrent = $row['F'];
                        $property->securebond = $row['G'];
                        $property->price = $row['H'];
                        $property->dispalyprice = $row['I'];
                        $property->vendorname = $row['J'];
                        $property->vendoremail = $row['K'];
                        $property->vendorphone = $row['L'];
                        $property->unitnum = $row['M'];
                        $property->lotnum = $row['N'];
                        $property->number = $row['O'];
                        $property->streetaddress = $row['P'];
                        $property->areaname = $row['Q'];
                        $property->townname = $row['R'];
                        $property->hidestreetaddress = $row['S'];
                        $property->district = $row['T'];
                        $property->province = $row['U'];
                        $property->bedrooms = $row['V'];
                        $property->bathrooms = $row['W'];
                        $property->toilets = $row['X'];
                        $property->housesize = $row['Y'];
                        $property->landsize = $row['Z'];
                        $property->floorarea = $row['AA'];
                        $property->parkcarpetspaces = $row['AB'];
                        $property->balcony = $row['AC'];
                        $property->remotegarage = $row['AD'];
                        $property->swimpool = $row['AE'];
                        $property->courtyard = $row['AF'];
                        $property->fullyfenced = $row['AG'];
                        $property->outsidespa = $row['AH'];
                        $property->securepark = $row['AI'];
                        $property->tenniscourt = $row['AJ'];
                        $property->alarmsys = $row['AK'];
                        $property->gym = $row['AL'];
                        $property->intercom = $row['AM'];
                        $property->workshop = $row['AN'];
                        $property->broadbandinternet = $row['AO'];
                        $property->dishwasher = $row['AP'];
                        $property->ac = $row['AQ'];
                        $property->heating = $row['AR'];
                        $property->cooling = $row['AS'];
                        $property->solarpower = $row['AT'];
                        $property->solarhotwater = $row['AU'];
                        $property->watertank = $row['AV'];
                        $property->otherfeatures = $row['AW'];
                        $property->headline = $row['AX'];
                        $property->desc = $row['AY'];
                        $property->vediourl = $row['AZ'];
                        $property->onlinetour1 = $row['BA'];
                        $property->onlinetour2 = $row['BB'];

                        if ($property->save(false)) {

                            $propertytyperelation->propertyid = $property->pid;
                            $propertytyperelation->typeid = $row['C'];

                            $propertytyperelation->save();

                        } else {

                            print_r($property->getErrors());
                        }

                        /*-----( Upload Property Images )-------*/
                        $imageIndex = 1;
                        foreach (glob(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR. $row['A'] . DIRECTORY_SEPARATOR . '*') as $fileName) {

                            $filename_array = explode('.', $fileName);
                            $fileName_without_extention = $filename_array[0];
                            $fileName_extention = $filename_array[1];

                            /*---( Scale images to 800 X 600 size )---*/
                            Yii::import('ext.CThumbCreator.CThumbCreator');

                            $thumb = new CThumbCreator();
                            $thumb->image = $fileName;
                            $thumb->width = 800;
                            $thumb->height = 600;
                            $thumb->square = true;
                            $thumb->directory = Yii::getPathOfAlias('webroot.upload.propertyimages') . DIRECTORY_SEPARATOR;
                            $thumb->defaultName = 'image_' . $property->pid . '_' . $imageIndex . '_' .time();
                            $thumb->createThumb();
                            $thumb->save();

                            /*----( Save to Database )----*/
                            $propertyimage = new Propertyimages();

                            $propertyimage->propertyid = $property->pid;
                            $propertyimage->imagename = $thumb->defaultName . '.' .$fileName_extention;
                            $propertyimage->imagetype = 0;

                            $propertyimage->save();

                            $imageIndex++;
                        }
                    }
                    $rowCount++;
                }
            }

            Yii::app()->user->setFlash('success', "Property information imported successfully.");

            echo 'done';
            Yii::app()->end();
        }

        $this->getController()->render('upload', array('enable_import'=>$enable_import, 'user_id'=>$user_id));
    }
}