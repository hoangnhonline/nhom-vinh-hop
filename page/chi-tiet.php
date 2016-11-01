<?php
   // $row_1=  mysql_fetch_assoc($data);
?>
<article class="box_content read">
    <header class="title">
        <div class="title_right">
            <div class="title_center">
                <h1><span><?php echo $row_1['title'];?></span></h1>
            </div> <!--  end .title_center -->
        </div> <!--  end .title_right -->
    </header> <!--  end .title -->
    <p class="date-time">04:10:41 19/10/2013</p>	<div class="des">
        <p>
            <span style="font-size:16px"><?php echo $row_1['content'];?></span>
        </p>




        <section class="related">
            <header><span class="title">{tinlienquan}</span></header>
            <ul>
                <?php
                    $id_cur=$row_1['article_id'];
                    $category_id = $row_1['category_id'];
                    $tinlienquan=$modelArticle -> getTinLienQuan($category_id,$id_cur);
                    while($row_tinlq=  mysql_fetch_assoc($tinlienquan)){
                ?>
                <li>
                    <a href="tintuc/<?php echo $row_tinlq['title_alias']?>-<?php echo $row_tinlq['article_id']; ?>.html" title="<?php echo $row_tinlq['title'];?>" target="_self" class="name tooltip"><?php echo $row_tinlq['title'];?></a>
                </li>
                <?php } ?>
            </ul>
        </section><!--  end .related -->


    </div> <!--  end .des -->

    <div class="top"></div>
    <div class="bottom"></div>
</article> <!--  end .box_content -->