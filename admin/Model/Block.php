<?php

require_once "Db.php";

class Block extends Db {

    function getListBlock() {
        $sql = "SELECT * FROM blocks ORDER BY block_id";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }

    function insertBlock() {
        $block_content = $_POST['block_content'];

        $block_name = $this->processData($_POST['block_name']);

        $update_time = time();         
       
        $sql = "INSERT INTO blocks VALUES(NULL,'$block_name','$block_content',$update_time)";								
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function updateBlock($block_id) {
        $block_content = $_POST['block_content'];

        $update_time = time(); 
        
         $sql = "UPDATE blocks
                SET block_content = '$block_content',update_time = $update_time				
                WHERE block_id = $block_id ";
        mysql_query($sql) or die(mysql_error() . $sql);
    }
    function getDetailBlock($block_id){
        $sql = "SELECT * FROM blocks WHERE block_id = $block_id";
        $rs = mysql_query($sql) or die(mysql_error());
        return $rs;
    }

}

?>