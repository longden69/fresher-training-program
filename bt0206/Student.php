<?php

/**
 * Created by PhpStorm.
 * User: longkun_365
 * Date: 02/06/2017
 * Time: 11:13 SA
 */
class Student
{

    /**
     * @param $name
     * @param $age
     * @param $gender
     * @param $file
     * @return int
     */
    public function addStudent($name, $age, $gender, $file)
    {
        $data = array();
        $data['name'] = $name;
        $data['age'] = $age;
        $data['gender'] = $gender;
        $fileName = $this->uploadFile($file);
        $data['image'] = 'upload/'.$fileName;
        $_SESSION['student'][] = $data;
        return 1;
    }

    /**
     * @param $id
     * @return int
     */
    public function delStudent($id)
    {
        if($this->isStudentExist($id))
        {
            unset($_SESSION['student'][$id]);
        }

        return 0;
    }

    private function isStudentExist($id)
    {
        return isset($_SESSION['student'][$id]);
    }

    /**
     * @return array
     */
    public function getListStudent()
    {
        $data = array();
        foreach ($this->listStudent as $key => $val) {
            $data[] = $val;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getStudent($id)
    {
        if($this->isStudentExist($id))
        {
            return ($_SESSION['student'][$id]);
        }

        return 0;
    }

    /**
     * @param $file
     * @return string
     */
    public function uploadFile($file)
    {
//        print_r($file);
//        die;
        $tmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileName = $file['name'];
        if($fileSize > 2048000)
        {
            return '0';
        }
        move_uploaded_file($tmpName, 'upload/'.$fileName);
        return $fileName;
    }

    /**
     * @param $id
     * @param $name
     * @param $age
     * @param $gender
     * @param $oldAvatar
     * @param $file
     * @return int
     */
    public function editStudent($id, $name, $age, $gender, $oldAvatar , $file)
    {
        if($this->isStudentExist($id))
        {
            $data = array();
            $data['name'] = $name;
            $data['age'] = $age;
            $data['gender'] = $gender;
            $fileName = $this->uploadFile($file);
            $data['image'] = 'upload/'.$fileName;
            if(file_exists($oldAvatar))
                unlink($oldAvatar);
            $_SESSION['student'][$id] = $data;
            return 1;
        }

        return 0;
    }

}