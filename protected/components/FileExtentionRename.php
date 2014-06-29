<?php
class FileExtentionRename
{

    public static function RenameFileExtention($dir, $file) {

        /*---( Rename upper case Image extentions to lower case  )---*/
        if (strpos($file,'.JPG',1) || strpos($file,'.GIF',1) || strpos($file,'.PNG',1)) {

            $srcfile = "$dir/$file";
            $filearray = explode(".",$file);

            $count = count($filearray);

            $pos = $count - 1;
            $filearray[$pos] = strtolower($filearray[$pos]);

            $file = implode(".",$filearray);
            $dstfile = "$dir/$file";

            rename($srcfile,$dstfile);
        }
    }
}
