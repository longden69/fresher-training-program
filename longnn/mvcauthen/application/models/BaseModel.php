<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 06/06/2017
 * Time: 8:41 SA
 *
 */

class BaseModel
{
    private $conn;

    /**
     * M_Model constructor.
     */
    public function __construct()
    {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->conn->query("SET NAMES utf8");
    }

    /**
     * @param $tableName
     * @param $value
     * @return bool|mysqli_result
     */
    public function add($tableName, $value)
    {
        $sql = "INSERT INTO $tableName VALUES($value)";

        return mysqli_query($this->conn, $sql);
    }

    /**
     * @param $tableName
     * @param $id
     * @param $arr
     * @return bool|mysqli_result
     */
    public function edit($tableName, $value, $id)
    {
        $sql = "UPDATE $tableName SET $value WHERE id = $id";
        echo $sql;
        return mysqli_query($this->conn, $sql);
    }

    /**
     * @param $tableName
     * @param $id
     * @return bool|mysqli_result
     */
    public function del($tableName, $id)
    {
        $sql = "DELETE FROM $tableName WHERE $id";

        return mysqli_query($this->conn, $sql);
    }

    /**
     * @param $sql
     * @return array
     */
    public function getList($sql)
    {
        $data = array();
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $data[] = $row;
            }
        }

        return $data;
    }

    /**
     * @param $sql
     * @return int
     */
    public function getNumRow($sql)
    {
        $data = array();
        $result = mysqli_query($this->conn, $sql);

        return mysqli_num_rows($result);
    }

    /**
     * @param $username
     * @return int
     */
    public function checkLogin()
    {
        $username = $_SESSION['user'];
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_num_rows($result);
    }

    /**
     * Close Connection
     */
    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}
