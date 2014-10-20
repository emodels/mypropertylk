<?php

/*
 * Developer Name: Danesh Manjula
 * Developer Team: SNT3 Team
 * Application Name: myproerty.lk -Real Estate Web Site
 * File name: DownloadCsvAction.php
 * Last Update Date: 20-10-2014
 *
 * **This is the Admin Download User CSV
 */

class DownloadCsvAction extends CAction
{
    /*
     * Action controller for Download User CSV
     */
    public function run()
    {
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="Users-list.csv"');

        $users = User::model()->findAll('usertype != 0');

        echo "first name,last name,email \r\n";

        foreach ($users as $data) {
            echo "$data->fname,$data->lname, $data->email \r\n";
        }
    }
}