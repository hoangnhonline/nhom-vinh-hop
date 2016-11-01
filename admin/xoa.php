<?php	
require_once("lib/classQuanTri.php");
$qt = new quantri;	

$loai = $_GET['loai'];
$id = (int) $_GET['id'];

if($loai == "baiviet") {
    $qt->xoabaiviet($id);	
}
if($loai == "menu") {
    mysql_query("DELETE FROM menu WHERE menu_id = '$id'");
}
if($loai == "danhmuc") {
    $qt->XoaDanhMuc($id);	
}
if($loai == "trang") {
    $qt->XoaTrang($id);	
}
if($loai == "album") {
    mysql_query("DELETE FROM album WHERE idAlbum = $id");
}
if($loai == "phapam") {
    mysql_query("DELETE FROM phapam WHERE idPA = $id");
}
if($loai == "tacgia") {
    mysql_query("DELETE FROM tacgia WHERE idTG = $id");
}
if($loai == "users") {
    mysql_query("DELETE FROM users WHERE idUser = $id");
}
?>