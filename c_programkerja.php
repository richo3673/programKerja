<?php

include_once("m_programkerja.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['input'])) {
        $nomorProgram = $_REQUEST['nomorProgram'];
        $namaProgram = $_REQUEST['namaProgram'];
        $suratKeterangan = $_REQUEST['suratKeterangan'];
        $controller = new control($nomorProgram, $namaProgram, $suratKeterangan);
        $controller->addInvoke();
        header('Location:c_programKerja.php');
    } elseif (isset($_REQUEST['delete'])) {
        $nomorProgram = $_REQUEST['nomorProgram'];
        $controller = new control($nomorProgram, null, null);
        $controller->deleteInvoke();
        header('Location:c_programKerja.php');
    }    elseif (isset($_REQUEST['cari'])) {
        $nomorProgram = $_REQUEST['nomorProgram2'];
        $controller = new control($nomorProgram, null, null);
        $controller->searchID();
    }
    elseif (isset($_REQUEST['update'])) {
        $nomorProgramnew = $_REQUEST['nomorProgram2'];
        $namaProgram = $_REQUEST['namaProgram'];
        $suratKeterangan = $_REQUEST['suratKeterangan'];
        $controller = new control($nomorProgramnew, $namaProgram, $suratKeterangan);
        $controller->updateInvoke($nomorProgramnew);
        header('Location:c_programKerja.php');
    }
}else{
    session_start();
    $NIM = $_SESSION['NIM'];
    include 'c_user.php';
    $controller = new c_user($NIM, null, null, null);
    $role = $controller->invokeUser($NIM);
    if ($role == 'Menteri') {
        $controller = new control(null, null, null);
        $controller->invokeMenteri();
    } elseif ($role == 'Kepala Department') {
        $controller = new control(null, null, null);
        $controller->invoke();
    } else{
        echo "<script>alert('Jabatan anda tidak dapat mengakses menu ini!')</script>";
        echo '<script>window.location.href = "menu.php";</script>';
    }

}

class control
{
    public $model;

    public function __construct($nomorProgram, $namaProgram, $suratKeterangan)
    {
        $this->model = new m_programkerja($nomorProgram, $namaProgram, $suratKeterangan);
    }
    public function invokeMenteri(){
        $proker = $this->model->getSemuaPogramKerja();
        include 'v_menteri.php';
    }
    public function invoke()
    {
        $proker = $this->model->getSemuaPogramKerja();
        include 'v_kepaladep.php';
    }
    public function addInvoke()
    {

        $proker = $this->model->setPogramKerja();
        $proker = $this->model->getSemuaPogramKerja();
        include 'v_kepaladep.php';
    }
    public function deleteInvoke()
    {

        $proker = $this->model->deleteProgramKerja();
        $proker = $this->model->getSemuaPogramKerja();
        include 'v_kepaladep.php';
    }
    public function searchID(){
        $search = $this->model->getPorgramKerjaById();
        $proker = $this->model->getSemuaPogramKerja();
        include 'v_kepaladep.php';
    }
    public function updateInvoke($nomorProgramnew){
        $proker = $this->model->updateProgramKerja($nomorProgramnew);
        $proker = $this->model->getSemuaPogramKerja();
        include 'v_kepaladep.php';
    }
}