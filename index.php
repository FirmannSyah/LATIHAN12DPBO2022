<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
if(isset($_GET['id_edit'])){
    $tp->EditDataPasien($_GET['id_edit']);
}
if(isset($_POST['submit'])){
    $tp->TambahPasien($_POST);
    header('location: index.php');
}
if(isset($_POST['update'])){
    $tp->UpdatePasien($_POST);
    header('location: index.php');
}
else if(isset($_GET['id_hapus'])){
    $tp->DeletePasien($_GET['id_hapus']);
    header('location : index.php');
}
else{
    $tp->tampil();
}


