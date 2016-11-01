<?php
require_once "admin/Model/Home.php";
require_once "admin/Model/Theloai.php";
require_once "admin/Model/Loaisp.php";
require_once "admin/Model/Article.php";
$modelHome = new Home;
$modelTheloai = new Theloai;
$modelLoaisp = new Loaisp;
$modelArticle = new Article;
require_once("blocks/seo.php");

?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="#" type="image/x-icon" rel="icon">
        <link href="#" type="image/x-icon" rel="shortcut icon">
        <title><?php echo $title; ?></title><meta name="author" content="nhomvinhhop.com">
        <base href="http://nhomvinhhop.com/" />
        <?php //<base href="http://localhost/nhom/" />?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/oneweb.js"></script>
        <script type="text/javascript" src="js/jquery.carouFredSel.js"></script>

        <script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>
        <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>

    </head>
    <body>
        <div id="wrapper" class="home">
            <header id="header">
                <?php include'blocks/header.php'; ?>
            </header> <!--  end #header -->
            <div id="main" class=" no_col_right">
                <div id="column_left">

                    <?php include'blocks/left.php'; ?>

                    <div id="content">
                        <?php if($com=="") include'blocks/slideshow.php'; ?>

                         <?php

                            switch($com){
                                    case "cat" : include "page/san-pham.php";break;
                                    case "contact" : include "page/lien-he.php";break;
                                    case "qtsx" : include "page/quy-cach-san-pham.php";break;
                                    case "td" : include "page/tuyen-dung.php";break;
                                    case "about" : include "page/gioi-thieu.php";break;
                                    case "news" : include "page/tin-tuc.php";break;
                                    case "detail_news" : include "page/chi-tiet.php";break;
                                    default : include "blocks/content_trangchu.php";break;
                            }
                         ?>
                        <?php //include'blocks/content_trangchu.php'; ?>
                    </div> <!-- end #content -->

                </div> <!--  end #column_left -->


                <div class="clear"></div>
            </div> <!-- end #main -->

            <footer id="footer">
                <?php include'blocks/footer.php' ?>
            </footer> <!--  end #footer -->

        </div> <!--  end #wrapper -->

        <p id="back-top" style="display: none;"><a href="javascript:;" title="Lên đầu"><span>&nbsp;</span></a></p>


    </body>
</html>