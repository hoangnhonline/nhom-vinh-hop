<?php



require_once "Db.php";



class Loaisp extends Db {
    
    
    function all_loaisp_list() {

        $sql = "SELECT * FROM loaisp  ORDER BY idLoai";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }

    function loaisp_list($idTL) {

        $sql = "SELECT * FROM loaisp WHERE idTL='$idTL' ORDER BY idLoai DESC";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }
    
    function loaisp_trangchu() {

        $sql = "SELECT * FROM loaisp WHERE idTL <> 5  ORDER BY RAND() LIMIT 0,9";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }
    
    function getHinhSanXuat() {

        $sql = "SELECT * FROM loaisp  Where idTL='5'";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }


    function insertLoaisp() {
        $Ten= $this->processData($_POST['Ten']);
        $ten_alias = $this->changeTitle($Ten);
        $url=$this->processData($_POST['url_images']);
        $Noidung=$this->processData($_POST['content_bv']);
        $idTL=$this->processData($_POST['idTL']);
        
        $sql = "INSERT INTO loaisp VALUES(NULL,'$Ten','$ten_alias','$url','$Noidung','$idTL')";							

        mysql_query($sql) or die(mysql_error() . $sql);
        
    }

    function updateLoaisp($idLoai) {

      
        $Ten= $this->processData($_POST['Ten']);
        $ten_alias = $this->changeTitle($Ten);
        $url=$this->processData($_POST['url_images']);
        $Noidung=$this->processData($_POST['content_bv']);
        $idTL=$this->processData($_POST['idTL']);
        $sql = "UPDATE loaisp

                SET Ten = '$Ten',Ten_KD = '$ten_alias',url_images='$url',NoiDung='$Noidung',idTL='$idTL'
                WHERE idLoai = $idLoai ";

        mysql_query($sql) or die(mysql_error() . $sql);

    }

    function getDetailLoaisp($idLoai){

        $sql = "SELECT * FROM loaisp WHERE idLoai = '$idLoai'";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }

     function getInfo( $idTL1){

        $sql = "SELECT * FROM loaisp WHERE idTL = '$idTL1'";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }

}



?>