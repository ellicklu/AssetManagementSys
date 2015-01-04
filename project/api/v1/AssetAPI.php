<?php
require_once 'APIClass.php';

class AssetAPI extends API
{
    public function __construct($request, $origin) {
        parent::__construct($request);

    }

    /**
     * Example of an Endpoint
     */
     protected function User() {
         $da = new DataAccess('localhost','oracle','welcome1','assets_management');
        if ($this->method == 'GET') {
             $user_dao = new UserDao($da);

             $result = $user_dao->searchByName($this->verb)->getRow();
             foreach($this as $key => $value) {
                echo "$key => $value\n";
            }
            return "Your name is " . $result["S_User_Name"];
        } else {
            return "Only accepts GET requests";
        }
     }
 }
 ?>
