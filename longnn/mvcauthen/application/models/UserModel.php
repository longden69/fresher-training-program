<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 07/06/2017
 * Time: 10:07 SA
 */
class UserModel extends BaseModel
{
    /**
     * @param $userName
     * @param $password
     * @return int
     */
    public function login($userName, $password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE username='$userName' AND pass='$password'";

        return $this->getNumRow($sql);
    }

    /**
     * @return array
     */
    public function getListUser()
    {
        $sql = "SELECT * FROM user";

        return $this->getList($sql);
    }

    /**
     * @param $id
     * @return array
     */
    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE user_id='$id'";

        return $this->getList($sql);
    }

    public function editUser($ds, $id)
    {
        $this->edit('user', $ds, $id);
    }
}