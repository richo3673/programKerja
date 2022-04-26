<?php

require "koneksiMVC.php";

class m_programkerja
{
    private $nomorProgram;
    private $namaProgram;
    private $suratKeterangan;
    public $hasil = array();
    public $res = array();


    public function __construct($nomorProgram, $namaProgram, $suratKeterangan)
    {
        $this->nomorProgram = $nomorProgram;
        $this->namaProgram = $namaProgram;
        $this->suratKeterangan = $suratKeterangan;
    }


    public function setPogramKerja()
    {
        global $mysqli;
        $rs = $mysqli->query("INSERT INTO proker VALUES ('$this->nomorProgram','$this->namaProgram', '$this->suratKeterangan')");
    }

    public function getSemuaPogramKerja()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM proker");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil[] = $rows;
        return $this->hasil;
    }

    public function getPorgramKerjaById()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM proker WHERE nomorProgram = '$this->nomorProgram'");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res[] = $rows;
        return $this->res;
    }

    public function deleteProgramKerja()
    {
        global $mysqli;
        $rs = $mysqli->query("DELETE FROM proker WHERE nomorProgram = '$this->nomorProgram'");
    }

    public function updateProgramKerja($nomorProgramnew){
        global $mysqli;
        $mysqli->query("UPDATE proker set nomorProgram = '$nomorProgramnew', namaProgram = '$this->namaProgram', suratKeterangan = '$this->suratKeterangan' WHERE nomorProgram = '$this->nomorProgram'");

    }
}