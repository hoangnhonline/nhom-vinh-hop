<?php


session_start();

$lang_arr=array("vi","cn","en");
if (isset($_GET['lang']) == true){
  if (in_array($_GET['lang'], $lang_arr)==true) $lang = $_GET['lang'];
}
elseif (isset($_SESSION['lang']) == true){ 
 if (in_array($_SESSION['lang'],$lang_arr) == true) $lang = $_SESSION['lang'];
}else $lang= 'vi';
$_SESSION['lang'] = $lang;
setcookie('lang' , $lang , time()+60*60*24*30);

    require_once "lang/lang_$lang.php";	
	ob_start();	
	include "home.php";	
	$str=ob_get_clean();
	$str = str_replace("{gioithieu}" , gioithieu , $str);
        $str = str_replace("{ndgioithieu}" , ndgioithieu , $str);
	$str = str_replace("{trangchu}" , trangchu , $str);
	$str = str_replace("{lienhe}" , lienhe , $str);	
        $str = str_replace("{danhmucsp}" , danhmucsp , $str);
	$str = str_replace("{sanpham}" , sanpham , $str);
        $str = str_replace("{henhomtam}" , henhomtam , $str);
        $str = str_replace("{henhomtron}" , henhomtron , $str);
        $str = str_replace("{henhomthanh}" , henhomthanh , $str);
        $str = str_replace("{hedong}" , hedong , $str);
        
        $str = str_replace("{httt}" , httt , $str);
        $str = str_replace("{thongke}" , thongke , $str);
        $str = str_replace("{hoatdongcty}" , hoatdongcty , $str);
        $str = str_replace("{hinhanhsx}" , hinhanhsx , $str);
         $str = str_replace("{sanphammoi}" , sanphammoi , $str);
        $str = str_replace("{sanphamdactrung}" , sanphamdactrung , $str);
        $str = str_replace("{kinhdoanh}" , kinhdoanh , $str);
        
	$str = str_replace("{tintuc}" , tintuc , $str);	
	$str = str_replace("{tuyendung}" , tuyendung , $str);	
	$str = str_replace("{diachi}" , diachi , $str);
        $str = str_replace("{footer}" , footer , $str);
	
	$str = str_replace("{gioithieucty}" , gioithieucty , $str);

	$str = str_replace("{chitiet}" , chitiet , $str);

	
	$str = str_replace("{tintuctonghop}" , tintuctonghop , $str);	
	$str = str_replace("{tinchuyennganh}" , tinchuyennganh , $str);
	
	$str = str_replace("{quatrinhsanxuat}" , quatrinhsanxuat , $str);
        $str = str_replace("{thongsonhom}" , thongsonhom , $str);
        $str = str_replace("{noidungsanxuat}" , noidungsanxuat , $str);
	
	$str = str_replace("{thuvienanh}" , thuvienanh , $str);
	$str = str_replace("{sanphamchinh}" , sanphamchinh , $str);
	$str = str_replace("{tinlienquan}" , tinlienquan , $str);
	$str = str_replace("{trove}" , trove , $str);
	
	$str = str_replace("{xembando}" , xembando , $str);
	$str = str_replace("{tencty}" , tencty , $str);
	$str = str_replace("{diachilienhe}" , diachilienhe , $str);
	$str = str_replace("{email}" , email , $str);
	$str = str_replace("{noidung}" , noidung , $str);
	$str = str_replace("{gui}" , gui , $str);
	$str = str_replace("{hoten}" , hoten , $str);

	echo $str;
?>

