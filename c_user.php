<?php
include_once("m_user.php");

if (isset($_GET['update'])) {
    $NIM = $_GET['NIM'];
    $nama = $_GET['nama'];
    $jabatan = $_GET['jabatan'];
    $angkatan = $_GET['angkatan'];
    $controller = new c_user($NIM,$nama,$jabatan,$angkatan);
    $controller->updateUser();
    echo "<script>alert('Update data berhasil!')</script>";
    echo '<script>window.location.href = "c_user.php";</script>';}elseif(!isset($NIM)){
    session_start();
    $NIM = $_SESSION['NIM'];
    $controller = new c_user($NIM, null, null, null);
    $controller->printUser();

}

class  c_user
{
    public $model;

    public function __construct($NIM,$nama,$jabatan,$angkatan)
    {
        $this->model = new m_user($NIM,$nama,$jabatan,$angkatan);
    }

    public function invokeUser()
    {
        $user = $this->model->getUserbyNIM();
        $role=  $user[0][0]['jabatan'];
        return $role;
        //include 'v_user.php';
    }
    public function printUser(){
        $user = $this->model->getUserbyNIM();
        include 'v_user.php';
    }
    public function updateUser(){
        $user = $this->model->updateUser();
        $user = $this->model->getUserbyNIM();
        include 'v_user.php';
    }

}

?>