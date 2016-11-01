<?php
session_start();
//require_once "admin/Model/Db.php";
//$d = new db;
function checkCat($uri) {
    $pattern_detailnews = '#tintuc/[a-z0-9\-]+\-\d+.html#';
    $pattern_cat = '#[a-z\-]+.html#';     
    $pattern_about = '#gioi-thieu+.html#';
    $pattern_news = '#tin-tuc+.html#';
    $pattern_qtsx = '#quy-cach-san-pham+.html#';
    $pattern_td = '#tuyen-dung+.html#'; 
    $pattern_contact = '#lien-he+.html#';

    $mod = "";
    if (preg_match($pattern_detailnews, $uri)) {
        $mod = "detail_news";
    }
    if (preg_match($pattern_news, $uri)) {
        $mod = "news";
    } 
    if (preg_match($pattern_about, $uri)) {
        $mod = "about";
    } 
    if (preg_match($pattern_qtsx, $uri)) {
        $mod = "qtsx";
    }
    if (preg_match($pattern_td, $uri)) {
        $mod = "td";
    }
    if (preg_match($pattern_contact, $uri)) {
        $mod = "contact";
    }    
    if (preg_match($pattern_cat, $uri)) {
        $mod = "cat";
    }     
    
    return $mod;
}

$uri = str_replace("nhom/", "", $_SERVER['REQUEST_URI']);
$com = checkCat($uri);
$uri = str_replace(".html", "", $uri);

$tmp_uri = explode("/", $uri);
//var_dump($tmp_uri);
if ($tmp_uri[1] == 'gioi-thieu') {
    $com = "about";
}
if ($tmp_uri[1] == 'tin-tuc') {
    $com = "news";
}
if ($tmp_uri[1] == 'tintuc') {
    $com = "detail_news";
}
if ($tmp_uri[1] == 'quy-cach-san-pham') {
    $com = "qtsx";
}
if ($tmp_uri[1] == 'tuyen-dung') {
    $com = "td";
}
if ($tmp_uri[1] == 'lien-he') {
    $com = "contact";
}
if ($com == 'cat') {
    $com = 'cat';
}
if ($com == 'cat' && $tmp_uri[1] == 'tag') {
    $com = 'tag';
}
//echo $com;
switch ($com) {
    case "contact":
        $title = "Liên hệ";
        $metaD = "Liên hệ";
        $metaK = "Liên hệ";
        break;
    case "about":
        $title = "Giới thiệu";
        $metaD = "Giới thiệu";
        $metaK = "Giới thiệu";
        break;
    case "news":
        $title = "Tin tức";
        $metaD = "Tin tức";
        $metaK = "Tin tức";
        break;
    case "qtsx":
        $title = "Quy trình sản xuất";
        $metaD = "Quy trình sản xuất";
        $metaK = "Quy trình sản xuất";
        break;
    case "td":
        $title = "Tuyển dụng";
        $metaD = "Tuyển dụng";
        $metaK = "Tuyển dụng";
        break;
    case "cat":
        $tentl_kd = $tmp_uri[1];
        $idTL = $modelTheloai->getidTLByTenTLKD($tentl_kd);
        $row=  mysql_fetch_assoc($idTL);  
        //$row['Ten'];
        $idTL1=$row['idTL'];
        $data = $modelLoaisp->getInfo( $idTL1);        
        //$row_data['Ten'];
        $title = $data[0];
        $metaD = $data[1];
        $metaK = $data[2];
        break;    
    case "detail_news":
        $tieude_id = $tmp_uri[2];
        $arr = explode("-", $tieude_id);      
        $article_id = (int) end($arr); 
        $data = $modelArticle->getDetailArticle($article_id);
        $row_1=  mysql_fetch_assoc($data);
       // echo $row_1['title'];die;
        $title = $data[0];
        $metaD = $data[1];
        $metaK = $data[2];
        break;

    default :
        $title = "CÔNG TY TNHH MTV TM - XNK VINH HỢP";
        $metaD = "CÔNG TY TNHH MTV TM - XNK VINH HỢP";
        $metaK = "CÔNG TY TNHH MTV TM - XNK VINH HỢP";
        break;
}
?>