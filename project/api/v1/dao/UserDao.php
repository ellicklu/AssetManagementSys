<?php
require_once 'Dao.php';
require_once 'DataAccess.php';


class UserDao extends Dao {
      //! A constructor
    /**
    * Constructs the UserDao
    * @param $da instance of the DataAccess class
    */
    function __construct ( & $da ) {
       parent::__construct( $da );
    }
    
        //! An accessor
    /**
    * Gets a log files
    * @return object a result object
    */
    function searchAll ($start=false,$rows=false) {
        $sql="SELECT * FROM log ORDER BY date User";
        if ( $start ) {
            $sql.=" LIMIT ".$start;
            if ( $rows )
                $sql.=", ".$rows;
        }
        return $this->retrieve($sql);
    }
 
    //! An accessor
    /**
    * Searches logs by Name
    * @return object a result object
    */
    function searchByName ($name) {
        $sql="SELECT * FROM User WHERE S_User_Name='".$name."'";
        return $this->retrieve($sql);
    }
}
?>

