<article class="box_content product_run">
    <header class="title">
        <div class="title_right">
            <div class="title_center">
                <h2><span>{sanphammoi}</span></h2>
                <nav></nav>
            </div> <!--  end .title_center -->
        </div> <!--  end .title_right -->
    </header> <!--  end .title -->

    <script type="text/javascript">
        $(function() {
            $("#product_content_4").carouFredSel({
                direction	: "left",
                items		: 4,
                circular	:true,
                auto : {
                    pauseOnHover	: true,
                    play: true
                }
                ,scroll: {
                    fx: 'crossfade'
                }
            });
        });
    </script>

    <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 720px; height: 166px; margin: 0px; overflow: hidden;"><ul id="product_content_4" class="show" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 5040px; height: 166px; z-index: auto; opacity: 1;">

            <?php
                $loai = $modelLoaisp->all_loaisp_List();
                while($row_loai = mysql_fetch_assoc($loai)){
                $url=$row_loai['url_images'];
                $url1=  str_replace('../','',$url);
            ?>
                <li>
                    <div class="thumb">
                        <a href="<?php echo $url1; ?>" title="<?php echo $row_loai['Ten']; ?>" data-fancybox-group="<?php echo $row_loai['idTL']; ?>" target="_self" class="tooltip fancybox"><img src="<?php echo $url1; ?>"  width="140" height="127"></a>
                    </div> <!--  end .thumb -->
                    <p class="name"><a href="#" title="<?php echo $row_loai['Ten']; ?>" target="_self" class="tooltip"><?php echo $row_loai['Ten']; ?></a></p>
                </li>
            <?php } ?>
            
            
            </ul></div>
    <div class="top"></div>
    <div class="bottom"></div>
</article> <!--  end .box -->



<aside class="box adv">



    <div class="top"></div>
    <div class="bottom"></div>
</aside> <!--  end .box -->


<article class="box_content product">
    <header class="title">
        <div class="title_right">
            <div class="title_center">
                <h2><span>{sanphamdactrung}</span></h2>
                <nav></nav>
            </div> <!--  end .title_center -->
        </div> <!--  end .title_right -->
    </header> <!--  end .title -->

    <div class="des" id="load_item">


        <script type="text/javascript">
            $(document).ready(function(){
                load(1);
            });
		
            function load(page){
				
                $("#message_top").fadeIn('slow');
				
                $.ajax({
                    type: "POST",
                    url:'/ajax-page',
                    data: "page=" + page,
                    dataType: "text",
                    success:function(data){
                        $(".outer_div").html(data).fadeIn('slow');
                        $("#message_top").fadeOut('slow');
                    }
                });
				
            }
        </script>

        <div class="outer_div">

            
            <?php
                $loai2 = $modelLoaisp->loaisp_trangchu(); 
                while($row_loai2 = mysql_fetch_assoc($loai2)){
                $url=$row_loai2['url_images'];
                $url1=  str_replace('../','',$url);
            ?>
            <div class="box_product" style="width: 238px;">
                <div class="thumb">
                    <a href="<?php echo $url1; ?>" title="<?php echo $row_loai2['Ten']; ?>" class="tooltip fancybox"><img src="<?php echo $url1; ?>"   width="220" height="200"></a>			</div> <!--  end .thumb -->
                <p class="name"><a href="#" title="<?php echo $row_loai2['Ten']; ?>" target="_self" class="tooltip"><?php echo $row_loai2['Ten']; ?></a></p>



                <div class="top"></div>
                <div class="bottom"></div>
            </div> <!--  end .box_product -->
            <?php } ?>
            
            <div class="clear"></div>
            <?php /*<div class="pagin green"><span class="current">1</span><a href="javascript:void(0);" onclick="load(2)">2</a></div>*/ ?>
        </div>



    </div> <!--  end .des -->

    <div class="top"></div>
    <div class="bottom"></div>
</article> <!--  end .box_content -->





<article class="box_content post">
    <header class="title">
        <div class="title_right">
            <div class="title_center">
                <h2><span>{tintuc}</span></h2>
            </div> <!--  end .title_center -->
        </div> <!--  end .title_right -->
    </header> <!--  end .title -->

    <div class="des">
        <?php 
            $rs_home = $modelHome->getNewsHome();
	    while($row_home = mysql_fetch_assoc($rs_home)){
            $url=$row_home['url_images'];
            $url1=  str_replace('../','',$url);
            
        ?>
        <div class="box_post" style="width: 710px;">
            <div class="thumb">
                <a href="tintuc/<?php echo $row_home['title_alias']?>-<?php echo $row_home['article_id']; ?>.html" title="<?php echo $row_home['title']; ?>" target="_self" class="tooltip"><img src="<?php echo $url1; ?>"  width="150" height="120"></a>	</div> <!--  end .thumb -->
            <a href="tintuc/<?php echo $row_home['title_alias']?>-<?php echo $row_home['article_id']; ?>.html" title="<?php echo $row_home['title']; ?>" target="_self" class="name tooltip"><?php echo $row_home['title']; ?></a><p class="datetime">19/10/2013 04:40:41</p><p class="sumary"><?php echo $row_home['description']; ?>

                &nbsp;</p>	
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="clear"></div>
        </div> <!--  end .box_post -->
        <?php } ?>
        
        
    </div> <!--  end .des -->

    <div class="top"></div>
    <div class="bottom"></div>
</article> <!--  end .box_content -->
<div class="top"></div>
<div class="bottom"></div>