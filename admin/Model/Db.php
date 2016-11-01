<?php

class db {



    private $host = "mysql.onehost.vn";

    //private $user = "root";

    //private $pass = "root";

    private $user = "thietken_nhom";

    private $pass = "nhom@2013@";

    private $db = "thietken_nhom_vinhhop";



    function __construct() {

        mysql_connect($this->host, $this->user, $this->pass) or die("Can't connect to server");

        mysql_select_db($this->db) or die("Can't connect database");

        mysql_query("SET NAMES 'utf8'") or die(mysql_error());

    }

    function processData($str) {

        $str = trim(strip_tags($str));

        if (get_magic_quotes_gpc() == false) {

            $str = mysql_real_escape_string($str);

        }

        return $str;

    }

    function changeTitle($str) {

        $str = $this->stripUnicode($str);

        $str = str_replace("?", "", $str);

        $str = str_replace("&", "", $str);

        $str = str_replace("'", "", $str);

        $str = str_replace("  ", " ", $str);

        $str = trim($str);

        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8'); // MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER

        $str = str_replace(" ", "-", $str);

        $str = str_replace("---", "-", $str);

        $str = str_replace("--", "-", $str);

        $str = str_replace('"', '', $str);

        $str = str_replace('"', "", $str);

        $str = str_replace(":", "", $str);

        $str = str_replace("(", "", $str);

        $str = str_replace(")", "", $str);

        $str = str_replace(",", "", $str);

        $str = str_replace(".", "", $str);

        $str = str_replace("%", "", $str);

        return $str;

    }



    function stripUnicode($str) {

        if (!$str)

            return false;

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'd' => 'đ',

            'D' => 'Đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

            '' => '?',

            '-' => '/'

        );

        foreach ($unicode as $khongdau => $codau) {

            $arr = explode("|", $codau);

            $str = str_replace($arr, $khongdau, $str);

        }

        return $str;

    }



    function phantrang($page, $page_show, $total_page, $link) {

        $dau = 1;

        $cuoi = 0;

        $dau = $page - floor($page_show / 2);

        if ($dau < 1)

            $dau = 1;

        $cuoi = $dau + $page_show;

        if ($cuoi > $total_page) {



            $cuoi = $total_page + 1;

            $dau = $cuoi - $page_show;

            if ($dau < 1)

                $dau = 1;

        }

        echo "<div id='thanhphantrang'>";

        if ($page > 1) {

            ($page == 1) ? $class = " class='selected'" : $class = "";

            echo "<a" . $class . " href=" . $link . "&page=1>Đầu</a>";

        }

        for ($i = $dau; $i < $cuoi; $i++) {

            ($page == $i) ? $class = " class='selected'" : $class = "";

            echo "<a" . $class . " href=" . $link . "&page=$i>$i</a>";

        }

        if ($page < $total_page) {

            ($page == $total_page) ? $class = " class='selected'" : $class = "";

            echo "<a" . $class . " href=" . $link . "&page=$total_page>Cuối</a>";

        }

        echo "</div>";

    }



    



    public function Login(){

		

		$email = $_POST['email'];

		$password = $_POST['password'];

		if (get_magic_quotes_gpc()== false) {

			$email = trim(mysql_real_escape_string($email));

			$password = trim(mysql_real_escape_string($password));

		}	



		if ($email=="admin@nhomvinhhop.com" && $password=="nhomvinhhop.com@2013@") {

			$_SESSION['user_id'] = 'admin@nhomvinhhop.com';	

			

			header("location:index.php");			

		} else  header("location:dangnhap.php"); 

	} 



//function Login



    function LayThuVienAnh($HinhMH) {

        $tmp = explode("/", $HinhMH);

        $file = end($tmp);

        $duongdan = implode("/", $tmp);

        $duongdan = str_replace("/" . $file, "", $duongdan);

        $duongdan = str_replace("http://cuacuoncaocapsg.com/", "", $duongdan);



        $dh = opendir($_SERVER['DOCUMENT_ROOT'] . "/" . $duongdan);



        $HinhAnh = "";

        while (($file = readdir($dh)) !== false) {

            $flag = false;

            if ($file !== '.' && $file !== '..') {

                $HinhAnh.=$duongdan . "/" . $file . ";";

            }

        }

        return $HinhAnh;

    }

	function phantrang2($page,$page_show,$total_page,$link){

		$dau=1;

		$cuoi=0;

		$dau=$page - floor($page_show/2);		

		if($dau<1) $dau=1;	

		$cuoi=$dau+$page_show;

		if($cuoi>$total_page)

		{

			

			$cuoi=$total_page+1;

			$dau=$cuoi-$page_show;

			if($dau<1) $dau=1;

		}

		echo '<div class="pagination pagination__posts"><ul>';

		if($page > 1){

			($page==1) ? $class = " class='active'" : $class="first" ;	

			echo "<li ".$class."><a href=".$link."-1.html>First</a></li>"	;							

		}

		for($i=$dau; $i<$cuoi; $i++)

		{

			($page==$i) ? $class = " class='active'" : $class="inactive" ;		

			echo "<li ".$class."><a href=".$link."-$i.html>$i</a></li>";			

		}

		if($page < $total_page) { 

			($page==$total_page) ? $class = "class='active'" : $class="last" ;		

			echo "<li ".$class."><a href=".$link."-$total_page.html>Last</a></li>";

		}

		echo "</ul></div>";

	}



}



?>