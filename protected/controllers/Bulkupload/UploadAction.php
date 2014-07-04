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
        $warningsArray = array();

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

                        /*---( Make sure Property folder exits )---*/
                        if (!file_exists(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property')) {

                            $warning = new stdClass();

                            $warning->id = 'NA';
                            $warning->type = 'error';
                            $warning->desc = 'ZIP file does not have "property" folder. Please make sure you have this folder insize your ZIP file.';

                            $warningsArray[] = $warning;
                        }

                        /*---( Make sure Excel file exits )---*/
                        if (count($warningsArray) == 0 && !file_exists(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR . 'property.xlsx')) {

                            $warning = new stdClass();

                            $warning->id = 'NA';
                            $warning->type = 'error';
                            $warning->desc = 'Invalid Excel file name. Please make sure you have Excel file with name as "property.xlsx"';

                            $warningsArray[] = $warning;
                        }

                        if (count($warningsArray) == 0) {

                            $yexcel = new Yexcel();
                            $sheet_array = $yexcel->readActiveSheet(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR . 'property.xlsx');

                            $rowCount = 0;
                            foreach ($sheet_array as $row) {

                                if ($rowCount > 0 && $row['A'] != '') {

                                    /*---( Skip existing records based on number, streetaddress, areaname, townname )---*/
                                    if (Property::model()->exists("owner = :owner AND number = :number AND streetaddress = :streetaddress AND areaname = :areaname AND townname = :townname",
                                                                  array(':owner' => $user_id, ':number' => $row['O'], ':streetaddress' => $row['P'], ':areaname' => $row['Q'], ':townname' => $row['R']))) {

                                        $warning = new stdClass();

                                        $warning->id = $row['A'];
                                        $warning->type = 'warning';
                                        $warning->desc = 'Property with ID : ' . $row['A'] . ' already exists in database';

                                        $warningsArray[] = $warning;

                                        continue;
                                    }

                                    $property = new Property();
                                    $propertytyperelation = new Propertytyperelation();

                                    $property->owner = $user_id;
                                    $property->agent = $user_id;
                                    $property->otheragent = 0;
                                    $property->availabledate = date("Y-m-d");
                                    $property->entrydate = date("Y-m-d");
                                    $property->pricetype = 1;

                                    if (count(glob(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR. $row['A'] . DIRECTORY_SEPARATOR . '*')) > 0){
                                        $property->status = 1;
                                    } else {
                                        $property->status = 0;
                                    }

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

                                    try {

                                        if ($property->save(false)) {

                                            $propertytyperelation->propertyid = $property->pid;
                                            $propertytyperelation->typeid = intval($row['C']);

                                            $propertytyperelation->save();
                                        }

                                    } catch (Exception $ex){

                                        $warning = new stdClass();

                                        $warning->id = $row['A'];
                                        $warning->type = 'error';
                                        $warning->desc = 'Unable to save Property with ID : ' . $row['A'] . ', please make sure all columns are valid';

                                        $warningsArray[] = $warning;
                                    }

                                    /*---( Rename upper case Image extentions to lower case  )---*/
                                    $gallerydir = Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR. $row['A'];
                                    $currentdir = opendir($gallerydir);

                                    while (false !== ($file = readdir($currentdir))) {
                                        if(strpos($file,'.JPG',1) || strpos($file,'.GIF',1) || strpos($file,'.PNG',1)) {
                                            $srcfile = "$gallerydir/$file";
                                            $filearray = explode(".",$file);
                                            $count = count($filearray);
                                            $pos = $count - 1;
                                            $filearray[$pos] = strtolower($filearray[$pos]);
                                            $file = implode(".",$filearray);
                                            $dstfile = "$gallerydir/$file";
                                            rename($srcfile,$dstfile);
                                        }
                                    }

                                    /*-----( Upload Property Images )-------*/
                                    if ($property->pid > 0) {

                                        $imageIndex = 1;
                                        foreach (glob(Yii::getPathOfAlias('webroot.upload.bulkupload') . DIRECTORY_SEPARATOR . 'property_bulk_upload_' . $user_id . DIRECTORY_SEPARATOR . 'property'. DIRECTORY_SEPARATOR. $row['A'] . DIRECTORY_SEPARATOR . '*') as $fileName) {

                                            $filename_array = explode('.', $fileName);
                                            $fileName_without_extention = $filename_array[0];
                                            $fileName_extention = $filename_array[1];

                                            /*---( Allowed extensions only others Skip )---*/
                                            if (!in_array(strtolower($fileName_extention),array('jpg','jpeg','gif','png'))) {

                                                if ($fileName_extention != 'db') {

                                                    $warning = new stdClass();

                                                    $warning->id = $row['A'];
                                                    $warning->type = 'warning';
                                                    $warning->desc = 'Property Image : ' . $fileName . ' has unsupported extention .' . $fileName_extention . ' and therefore it will be not uploaded';

                                                    $warningsArray[] = $warning;
                                                }

                                                continue;
                                            }

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

                                            /*---( Add watermark to image )---*/
                                            WatermarkGenerator::GenerateWatermark($thumb->directory, $thumb->defaultName, $fileName_extention);

                                            /*----( Save to Database )----*/
                                            $propertyimage = new Propertyimages();

                                            $propertyimage->propertyid = $property->pid;
                                            $propertyimage->imagename = $thumb->defaultName . '.' .$fileName_extention;
                                            $propertyimage->imagetype = 0;

                                            $propertyimage->save();

                                            $imageIndex++;
                                        }
                                    }
                                }
                                $rowCount++;
                            }
                        }
                    }

                    if (count($warningsArray) == 0) {
                        Yii::app()->user->setFlash('success', "Property information imported successfully.");
                        $this->getController()->redirect(Yii::app()->request->baseUrl . '/property/propertylisting?type=0');
                    }
                }
            }
        }

        $this->getController()->render('upload', array('user_id'=>$user_id, 'warningsArray' => $warningsArray));
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