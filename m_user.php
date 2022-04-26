<?php
//session_start();
require "koneksiMVC.php";

class m_user{
    private $NIM;
    private $nama;
    private $jabatan;
    private $angkatan;
    public $user = array();

    /**
     * @param $NIM
     * @param $nama
     * @param $jabatan
     * @param $angkatan
     * @param array $user
     */
    public function __construct($NIM, $nama, $jabatan, $angkatan)
    {
        $this->NIM = $NIM;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->angkatan = $angkatan;
    }


    public function getUserbyNIM()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM users where NIM = '$this->NIM'");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->user[] = $rows;
        return $this->user;
    }
    public function updateUser(){
        global $mysqli;
        $rs = $mysqli->query("UPDATE users set nama = '$this->nama', jabatan = '$this->jabatan', angkatan = '$this->angkatan' WHERE NIM = '$this->NIM'");
    }
}