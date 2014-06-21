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

                if ($temp->saveAs(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . '.zip')){

                    Yii::import('ext.yexcel.Yexcel');

                    $src = Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . '.zip';
                    $dest = Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id;

                    $this->deleteDir($dest);

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
                                $property->availabledate = date("Y-m-d");
                                $property->entrydate = date("Y-m-d");
                                $property->status = 1;
                                $property->pricetype = 1;

                                $property->type = intval($row['B']);
                                $property->propcondition = intval($row['D']);
                                $property->weeklyrent = $row['E'];
                                $property->monthlyrent = $row['F'];
                                $property->securebond = $row['G'];
                                $property->price = $row['H'];
                                $property->dispalyprice = intval($row['I']);
                                $property->vendorname = $row['J'];
                                $property->vendoremail = $row['K'];
                                $property->vendorphone = $row['L'];
                                $property->unitnum = $row['M'];
                                $property->lotnum = $row['N'];
                                $property->number = $row['O'];
                                $property->streetaddress = $row['P'];
                                $property->areaname = $row['Q'];
                                $property->townname = $row['R'];
                                $property->hidestreetaddress = intval($row['S']);
                                $property->district = intval($row['T']);
                                $property->province = intval($row['U']);
                                $property->bedrooms = $row['V'];
                                $property->bathrooms = $row['W'];
                                $property->toilets = $row['X'];
                                $property->housesize = $row['Y'];
                                $property->landsize = $row['Z'];
                                $property->floorarea = $row['AA'];
                                $property->parkcarpetspaces = $row['AB'];
                                $property->balcony = intval($row['AC']);
                                $property->remotegarage = intval($row['AD']);
                                $property->swimpool = intval($row['AE']);
                                $property->courtyard = intval($row['AF']);
                                $property->fullyfenced = intval($row['AG']);
                                $property->outsidespa = intval($row['AH']);
                                $property->securepark = intval($row['AI']);
                                $property->tenniscourt = intval($row['AJ']);
                                $property->alarmsys = intval($row['AK']);
                                $property->gym = intval($row['AL']);
                                $property->intercom = intval($row['AM']);
                                $property->workshop = intval($row['AN']);
                                $property->broadbandinternet = intval($row['AO']);
                                $property->dishwasher = intval($row['AP']);
                                $property->ac = intval($row['AQ']);
                                $property->heating = intval($row['AR']);
                                $property->cooling = intval($row['AS']);
                                $property->solarpower = intval($row['AT']);
                                $property->solarhotwater = intval($row['AU']);
                                $property->watertank = intval($row['AV']);
                                $property->otherfeatures = $row['AW'];
                                $property->headline = $row['AX'];
                                $property->desc = $row['AY'];
                                $property->vediourl = $row['AZ'];
                                $property->onlinetour1 = $row['BA'];
                                $property->onlinetour2 = $row['BB'];

                                if ($property->save(false)) {

                                    $propertytyperelation->propertyid = $property->pid;
                                    $propertytyperelation->typeid = intval($row['C']);

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

                    $this->getController()->redirect(Yii::app()->request->baseUrl . '/property/propertylisting?type=0');
                }
            }
        }

        $this->getController()->render('upload', array('user_id'=>$user_id));
    }

    private function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            return;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}