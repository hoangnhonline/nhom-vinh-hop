<div class="middle">
    <img src="img/banner_<?php echo $lang; ?>.png" alt="" width="960" height="168">	
    <div id="language" style="position:absolute;top:5px; margin-left:840px;">
               	    <a href="en" title="English" class="tooltip"><img src="img/flag/en.png" alt="English"  /></a>
                    <a href="vi" title="Việt Nam" class="tooltip"><img src="img/flag/vn.png" alt="Việt Nam"  /></a>
                    <a href="cn" title="China" class="tooltip"><img src="img/flag/cn.png" alt="China"  /></a>       
   </div>
</div> <!--  end .middle -->
    
<div class="bottom">

    <nav id="bg_nav" class="nav">
        <ul id="navmenu">
            <li class="<?php if($com =='')echo "current"; ?>" style="z-index: 100;"><a href="index.php" title="Trang chủ"><span>{trangchu}</span></a><ul style="top: 37px; visibility: visible; left: 0px; width: 200px; display: block;"></ul></li>

            <li class="<?php if($com =='about')echo "current"; ?>" style="z-index: 99;"><a href="gioi-thieu.html" title="Giới thiệu" target="_self"><span>{gioithieu}</span></a></li>		
            <li class="<?php if($com=='san-pham')echo "current"; ?>" style="z-index: 98;"><a href="javascript:;" title="Sản phẩm"><span>{sanpham}</span></a>			
                <ul style="top: 37px; visibility: visible; left: 0px; width: 200px; display: none;">
                    
                    <li><a href="he-nhom-tam.html" title="{henhomtam}" target="_self">{henhomtam}</a></li>
                        <li><a href="he-nhom-tron.html" title="{henhomtron}" target="_self">{henhomtron}</a></li>
                        <li><a href="he-nhom-thanh.html" title="{henhomthanh}" target="_self">{henhomthanh}</a></li>
                        <li><a href="he-dong.html" title="{hedong}" target="_self">{hedong} </a></li>
                    
                </ul>		</li>

            <li class="<?php if($com =='news')echo "current"; ?>" style="z-index: 97;"><a href="tin-tuc.html" title="Tin tức" target="_self"><span>{tintuc}</span></a><ul style="display: none; top: 37px; visibility: visible;"></ul></li>		
            <li class="<?php if($com =='qtsx')echo "current"; ?>" style="z-index: 96;"><a href="quy-cach-san-pham.html" title="Quy cách sản phẫm" target="_self"><span>{quatrinhsanxuat}</span></a><ul style="top: 37px; visibility: visible; left: 0px; width: 200px; display: block;"></ul></li>		
            <li class="<?php if($com =='td')echo "current"; ?>" style="z-index: 95;"><a href="tuyen-dung.html" title="Tuyển dụng" target="_self"><span>{tuyendung}</span></a><ul style="top: 37px; visibility: visible; left: 0px; width: 200px; display: block;"></ul></li>
            <li class="last <?php if($com =='contact')echo "current"; ?>" style="z-index: 93;"><a href="lien-he.html" title="Liên hệ" rel="nofollow"><span>{lienhe}</span></a><ul style="top: 37px; visibility: visible; left: 0px; width: 200px; display: block;"></ul></li>
        </ul> <!--  end #navmenu -->

        <div class="left"></div>
        <div class="right"></div>
    </nav> <!--  end #bg_nav --><aside id="breadcrumb">
        <ul>
            <li class="home">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
        </ul> <!--  end #breadcrumb -->
    </aside>		
     <!--  end .search -->




</div><!--  end .bottom -->