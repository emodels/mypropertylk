<?php
/**
 * Created by PhpStorm.
 * User: pumi
 * Date: 6/21/2016
 * Time: 10:41 AM
 */
class Utility {

    public static function addMailLog($from_email, $from_name, $to_email, $to_name, $subject, $message, $user, $type){

        $mailLog = new MailLog();

        $mailLog->from_email = $from_email;
        $mailLog->from_name = $from_name;
        $mailLog->to_email = $to_email;
        $mailLog->to_name = $to_name;
        $mailLog->subject = $subject;
        $mailLog->message = $message;
        $mailLog->entry_date = date('Y-m-d h:i:s');
        $mailLog->user = $user;
        $mailLog->type = $type;

        if ($mailLog->save()) {

            return true;

        } else {

            print_r($mailLog->getErrors());
            return false;
        }
    }

    public static function compressImage($source_url, $destination_url, $quality) {

        $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);

        //save file
        imagejpeg($image, $destination_url, $quality);

        //return destination file
        return $destination_url;
    }

    public static function getFileSize($file) {

        $intSizeBytes = filesize($file);

        if ($intSizeBytes > 0) {

            return (int)($intSizeBytes / 1024);
        }
    }
}