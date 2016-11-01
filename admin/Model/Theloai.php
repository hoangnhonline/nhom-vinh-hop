<?php



require_once "Db.php";



class Theloai extends Db {



    function theloai_list() {

        $sql = "SELECT * FROM theloai ORDER BY idTL";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }



    function insertTheloai() {
       echo $Ten= $this->processData($_POST['Ten']);

        $ten_alias = $this->changeTitle($Ten);
        
       echo $sql = "INSERT INTO theloai VALUES(NULL,'$Ten','$ten_alias')";								

        mysql_query($sql) or die(mysql_error() . $sql);

    }

    function updateTheloai($idTL) {

      
        $Ten= $this->processData($_POST['Ten']);

        $ten_alias = $this->changeTitle($Ten);



         $sql = "UPDATE theloai

                SET Ten = '$Ten',Ten_KD = '$ten_alias'
                WHERE idTL = $idTL ";

        mysql_query($sql) or die(mysql_error() . $sql);

    }

    function getDetailMenu($menu_id){

        $sql = "SELECT * FROM menu WHERE menu_id = $menu_id";

        $rs = mysql_query($sql) or die(mysql_error());

        return $rs;

    }	
    function getidTLByTenTLKD($tenKD){	
        $sql = "SELECT * FROM theloai WHERE Ten_KD = '$tenKD'";   
        $rs = mysql_query($sql) or die(mysql_error());       
        return $rs;		
        
    }



}



?>