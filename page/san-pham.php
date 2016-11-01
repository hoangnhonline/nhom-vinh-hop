<article>
    <div class="box_content">
        <div class="title">
            <div class="title_right">
                <div class="title_center">
                    <header><h1>
                      <span>
                        <?php 
                            //echo $row['Ten'];die;
                            if($row['Ten']=="Hệ nhôm tấm"){ echo "{henhomtam}"  ;}
                            if($row['Ten']=="Hệ nhôm tròn"){ echo "{henhomtron}"  ;}
                            if($row['Ten']=="Hệ nhôm thanh"){ echo "{henhomthanh}"  ;}
                            if($row['Ten']=="Hệ đồng"){ echo "{hedong}"  ;}
                        ?>
                      </span></h1></header>

                    

                </div> <!--  end .title_center -->
            </div> <!--  end .title_right -->
        </div> <!--  end .title -->

        <div class="des">
            <?php
                $data = $modelLoaisp->getInfo( $idTL1);
                while($row_data=  mysql_fetch_assoc($data)){
            ?>
            <div class="box_product">
                <div  class="thumb" >
                    <a href="<?php echo str_replace('../','',$row_data['url_images']); ?>"  title="<?php echo $row_data['Ten']; ?>" data-fancybox-group="<?php echo $row_data['idTL']; ?>" class="tooltip fancybox"><img src="<?php echo str_replace('../','',$row_data['url_images']); ?>"  width="200" height="180" /></a>
                </div> <!--  end .thumb -->
                <p class="name">
                    <a href="<?php echo $row_data['Ten_KD']?>-<?php echo $row_data['idLoai']; ?>.html" title="<?php echo $row_data['Ten']; ?>" target="_self" class="tooltip"><?php echo $row_data['Ten']; ?></a>
                </p>



                <div class="top"></div>
                <div class="bottom"></div>
            </div> <!--  end .box_product -->
            <?php } ?>

            <div class="clear"></div>
            <div class="paginator">
                <span class="page">1/1</span>			</div> <!-- end .paginator -->

        </div> <!--  end .des -->

        <div class="top"></div>
        <div class="bottom"></div>
    </div> <!--  end .box_content -->
</article>