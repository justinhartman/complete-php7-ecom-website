<?php
/**
 * Advanced PHP 7 eCommerce Website (https://22digital.co.za)
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 *
 * @copyright Copyright (c) 22 Digital (https://22digital.co.za)
 * @copyright Copyright (c) Justin Hartman (https://justinhartman.co)
 * @author    Justin Hartman <justin@hartman.me> (https://justinhartman.co)
 * @link      https://github.com/justinhartman/complete-php7-ecom-website GitHub
 * @since     0.5.0
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */

/**
 * Class for handling various methods in the database.
 *
 * The methods contained in this class include ones for connecting, querying and
 * running select statements on the database. There are also methods to handle
 * errors as well as to escape any $_POST variables before inserting into the
 * database via a query string.
 *
 * @package  DatabaseManager
 * @category Database
 */
final class DatabaseManager extends \mysqli
{

    /**
     * Get multiInsert() insert id's.
     *
     * @var array
     */
    public $insertIds = array();

    /**
     * Define the connection as a static variable so as to avoid connecting more
     * than once.
     */
    protected static $dbConnect;

    /**
     * The constructor function.
     */
    public function __construct() { }

    /**
     * Connect to database.
     *
     * @return object Returns a MySQLi connect object.
     */
    public function connect($host = null, $user = null, $password = null, $database = null, $port = null, $socket = null)
    {
        $this->dbConnect = parent::__construct($host, $user, $password, $database, $port, $socket);

        // If there is an error, return the error message.
        if ($this->connect_error) {
            throw new \Exception(' Failed connect to MySQL Database <br /> Error Info : ' . $this->connect_error);
        }

        // Return a UTF-8 character set.
        $this->set_charset('utf8');
    }

    /**
     * This method converts a String to utf8.
     *
     * @param  string $data
     * @return string Converted utf8 string.
     */
    protected function toUtf($data)
    {
        // Convert the string to a UTF-8 string.
        return mb_convert_encoding($data, 'UTF-8', mb_detect_encoding($data));
    }

    /**
     * This escapes the data to prevent XSS attacks.
     *
     * @param  string $data The data to escape.
     * @param  string $type Takes a bool string of either 'str' or 'int'.
     *                      Defaults to 'str'.
     *
     * @return string       'str' returns a string | 'int' returns an integer.
     */
    public function escape($data, $type = 'str') {
        // Use the toUtf() method to convert to a UTF-8 string.
        $data = $this->toUtf($data);

        // If it is a string (i.e 'str') then strip the slashes and convert to
        // a safe encoded string.
        if(get_magic_quotes_gpc()) {
            $data = stripslashes($data);
        }

        // If the data is an integer (i.e. 'int') then use real_escape_string
        // to convert the int to a safe encoded integer.
        if($type === 'int') {
            // Return the 'int' escaped string as a string for use in the app.
            return (int) $this->real_escape_string($data);
        }

        // Return the 'str' escaped string as a string for use in the app.
        return $this->real_escape_string($data);
    }

    /**
     * select data from the database using a SELECT query.
     *
     * @param  string $select columns ex: username, pass, email ....
     * @param  string $from   table name
     * @param  string $where  optional  ex: WHERE id='1'
     *
     * @return object Returnd the query result.
     */
    public function select($select, $from, $where = '')
    {
        // Run the SELECT query on the table.
        return $this->query("SELECT {$select} FROM {$from} {$where}");
    }

    /**
     * selects one row from the table.
     *
     * @param  string $select List of columns to select from the table.
     * @param  string $from   Table name.
     * @param  string $where  Optional where clause.
     * @param  string $fetch  Multiple options: fetch_assoc() = 'assoc' (this
     *                        is the default option) | fetch_row = 'row'|
     *                        fetch_object = 'object'.
     *
     * @return mixed          If $fetch == assoc or row it returns an array | if
     *                        $fetch == object it returns an object | if
     *                        $data == false it returns null.
     */
    public function singleSelect($select, $from, $where = '', $fetch = 'assoc')
    {
        // Define the variables. Set return to null by default.
        $fetch = 'fetch_' . $fetch;
        $return = null;

        // Check that $data is a SELECT query.
        if ($data = $this->query("SELECT {$select} FROM {$from} {$where} LIMIT 1")) {
            // Return the object.
            $return = $data->$fetch();
            // Close the data connection.
            $data->close();
            // Unset the query parameters.
            unset($select, $from, $where, $data);
        }

        // Return the object.
        return $return;
    }

    /**
     * Insert data into the table.
     *
     * @param  string  $into  Table name.
     * @param  array   $array Data is an Associative Array. The key is equal to
     *                        the table column and value is equal to the column
     *                        value.
     *
     * @return boolean        true|false
     */
    public function insert($into, array $array)
    {
        // Set up the array().
        $return = false;
        $data   = array();

        // Loop through the array and escape the data.
        foreach ($array as $key => $value) {
            $data[] = $this->escape($key)."='".$this->escape($value)."'";
        }

        // Seperate the data with a comma.
        $data = implode(', ', $data);

        // insert data into the database table.
        if ($this->query("INSERT INTO {$into} SET {$data}")) {
            // Unset the data once the query has run successfully and set the
            // $return as true.
            unset($into, $array, $data);
            $return = true;
        }
        // Return true or false.
        return $return;
    }

    /**
     * This method inserts multiple lines of data using multiple INSERT
     * statements.
     *
     * @param  string  $into  Table name.
     * @param  array   $array Data object is a Multidimensional Associative
     *                        Array.
     *
     * @return boolean        true|false
     */
    public function multiInsert($into, array $array)
    {
        // Make sure the IDs are an array.
        $ids = array();
        // Loop through the $array data to ensure the $array is in fact
        // an array.
        foreach($array as $val) {
            // If the data not an array then unset the statement data and
            // return false.
            if(!is_array($val)) {
                unset($into, $array);
                return false;
            }
        }

        // Run the loop again but assigning a key-value pair to insert data into
        // the table.
        foreach($array as $key => $value) {
            // Run the insert statement and get the last insert_id from the
            // database, else set the ID to false.
            if($this->insert($into, $value) === true) {
                $ids[$key] = $this->insert_id;
            } else {
                $ids[$key] = false;
            }
        }

        // Our array $ids now contains an array of last insertIds from the
        // database.
        $this->insertIds = $ids;
        // Unset the into statement, array and IDs.
        unset($into, $array, $ids);

        // Create an array_filter object.
        $filter = array_filter($this->insertIds);
        // If the $filter is empty then return false.
        if (!empty($filter)) {
            return false;
        }

        // Return false.
        return false;
    }

    /**
     * Updates the data in a table.
     *
     * @param  string  $table Table name
     * @param  array   $array Data is an Associative Array. The key is equal to
     *                        the column and the value is equal to the column
     *                        value.
     * @param  string  $where Optional WHERE clause.
     *
     * @return boolean        true|false
     */
    public function update($table, $array, $where = '')
    {
        // Set up the data array object and set $return as false by default.
        $return = false;
        $data   = array();

        // Loop through the array data and assign a key-value pair in order to
        // escape the data for insert.
        foreach ($array as $key => $value) {
            $data[] = $this->escape($key ) ."='" . $this->escape($value) . "'";
        }

        // Seperate the data with a comma.
        $data = implode(', ', $data);

        // Run the query using an UPDATE statement which contains the data,
        // WHERE clause and table name.
        if ($this->query("UPDATE {$table} SET {$data} {$where}")) {
            // Once the query has run, unset the table name, array data, WHERE
            // clause and data object and finally, return true.
            unset($table, $array, $where, $data);
            $return = true;
        }

        // Return true or false.
        return $return;
    }

    /**
     * Deletes data row from table.
     *
     * @param  string  $from  Table name.
     * @param  string  $where Optional WHERE clause.
     *
     * @return boolean        true|false
     */
    public function delete($from, $where = '')
    {
        // Set up the $return variable as false by default.
        $return = false;

        // Run the DELETE query to remove items from the table.
        if ($this->query("DELETE FROM {$from} {$where}")) {
            // Unset the FROM and WHERE clause in the DELETE statement and
            // setup the $return as true.
            unset($from, $where);
            $return = true;
        }

        // Return true or false.
        return $return;
    }
}
