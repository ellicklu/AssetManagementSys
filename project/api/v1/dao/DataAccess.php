<?php
/**
 *  A simple class for querying MySQL
 */
class DataAccess {
    /**
    * Private
    * $db stores a database resource
    */
    var $db;
 
    //! A constructor.
    /**
    * Constucts a new DataAccess object
    * @param $host string hostname for dbserver
    * @param $user string dbserver user
    * @param $pass string dbserver user password
    * @param $db string database name
    */
    function __construct($host,$user,$pass,$db) {
        $this->db=  mysql_connect($host,$user,$pass) or die("Error ".mysql_error($db));
        mysql_select_db($db,$this->db);
    }
 
    //! An accessor
    /**
    * Fetches a query resources and stores it in a local member
    * @param $sql string the database query to run
    * @return object DataAccessResult
    */
    function & fetch($sql) {
        return new DataAccessResult($this,mysql_query($sql,$this->db));
    }
 
    //! An accessor
    /**
    * Returns any MySQL errors
    * @return string a MySQL error
    */
    function isError () {
        return mysql_error($this->db);
    }
}
 
/**
 *  Fetches MySQL database rows as objects
 */
class DataAccessResult {
    /**
    * Private
    * $da stores data access object
    */
    var $da;
    /**
    * Private
    * $query stores a query resource
    */
    var $query;
 
    function __construct(& $da,$query) {
        $this->da=& $da;
        $this->query=$query;
    }
 
    //! An accessor
    /**
    * Returns an array from query row or false if no more rows
    * @return mixed
    */
    function getRow () {
        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) )
            return $row;
        else
            return false;
    }
 
    //! An accessor
    /**
    * Returns the number of rows affected
    * @return int
    */
    function rowCount () {
        return mysql_num_rows($this->query);
    }
 
    //! An accessor
    /**
    * Returns false if no errors or returns a MySQL error message
    * @return mixed
    */
    function isError () {
        $error=$this->da->isError();
        if (!empty($error))
            return $error;
        else
            return false;
    }
}
?>