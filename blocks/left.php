<div id="sidebar_left" class="sidebar">
    <div class="sidebar_left_bottom">
        <div class="sidebar_left_middle">
            <script type="text/javascript">                jQuery(document).ready(function(){                    //Menu sidebar left
                navigation.init({                        mainmenuid: "tree", //Menu DIV id                        orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"                        classname: 'nav-v pro_cate_sidebar_left', //class added to menu's outer DIV                        //customtheme: ["#804000", "#482400"],                        contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]                    })                })            </script>
            <aside class="box category">
                <span class="title">{danhmucsp}</span>
                <div class="nav-v pro_cate_sidebar_left" id="tree">
                    <ul>
                        <li><a href="he-nhom-tam.html" title="{henhomtam}" target="_self">{henhomtam}</a></li>
                        <li><a href="he-nhom-tron.html" title="{henhomtron}" target="_self">{henhomtron}</a></li>
                        <li><a href="he-nhom-thanh.html" title="{henhomthanh}" target="_self">{henhomthanh}</a></li>
                        <li><a href="he-dong.html" title="{hedong}" target="_self">{hedong} </a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <!--  end #tree -->
                <div class="top"></div>
                <div class="bottom"></div>
            </aside>
            <!--  end .box -->
            <aside class="box support">
                <span class="title">{httt}</span>
                <ul>
                    <li>
                        <p class="name">                            {kinhdoanh} 1<span style="font-weight: bold"> ( 08.37198333)</span>			</p>
                        <p class="yahoo">

                            <a href="ymsgr:sendim?binh08" mce_href="ymsgr:sendim?binh08" border="0">
                                <img src="http://opi.yahoo.com/online?u=binh08&t=2" mce_src="http://opi.yahoo.com/online?u=binh08&t=2"></a>

                        </p>
                    </li>
                    <li>
                        <p class="name">                            {kinhdoanh} 2<span style="font-weight: bold"> ( 01229.733.156)</span>			</p>
                        <p class="yahoo">
                         <a href="ymsgr:sendim?binh08" mce_href="ymsgr:sendim?binh08" border="0">
                                <img src="http://opi.yahoo.com/online?u=binh08&t=2" mce_src="http://opi.yahoo.com/online?u=binh08&t=2"></a>
                        </p>
                    </li>
                </ul>
                <div class="top"></div>
                <div class="bottom"></div>
            </aside>
            <!--  end .box -->
            <aside class="box">
                <span class="title">{hinhanhsx}</span>
                <script type="text/javascript">
                            $(function() {                        $("#show_gallery_4").carouFredSel({                            direction	: "up", items		: 3, circular	:true, auto : {                                pauseOnHover	: true, play: true                            }, scroll: {                                fx: 'scroll_continuous'                            }                        }); });</script>
                <div class="caroufredsel_wrapper" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 190px; height: 570px; margin: 0px; overflow: hidden;">
                    <ul id="show_gallery_4" class="show" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; height: 3990px; width: 190px; z-index: auto;">
                        <?php $hinhsx = $modelLoaisp->getHinhSanXuat();
                        while ($row_hinh = mysql_fetch_assoc($hinhsx))
                        {
                            $url = $row_hinh['url_images'];
                            $url1 = str_replace('../', '', $url); ?>
                            <li>                            <a href="<?php echo $url1; ?>" data-fancybox-group="hinhsx" class="tooltip fancybox">                                <img src="<?php echo $url1; ?>" alt="sx4" width="180" height="188">                            </a>                        </li>
<?php } ?>
                    </ul>
                </div>
                <div class="top"></div>
                <div class="bottom"></div>
            </aside>
            <!--  end .box -->
            <aside class="box counter">
                <span class="title">{thongke}</span>
                <div id="counter">
                    <table>
                        <tbody>
                            <tr class="total_top">
                                <th colspan="2">
                        <p><span>0</span><span>0</span><span>0</span><span>0</span><span>3</span><span>4</span><span>2</span><span>7</span></p>
                        </th>
                        </tr>
                        <tr class="online">
                            <th>Online</th>
                            <td>1</td>
                        </tr>
                        <tr class="yesterday">
                            <th>Hôm qua</th>
                            <td>54</td>
                        </tr>
                        <tr class="today">
                            <th>Hôm nay</th>
                            <td>39</td>
                        </tr>
                        <tr class="week">
                            <th>Trong tuần</th>
                            <td>260</td>
                        </tr>
                        <tr class="month">
                            <th>Trong tháng</th>
                            <td>1,194</td>
                        </tr>
                        <tr class="year">
                            <th>Trong năm</th>
                            <td>3,264</td>
                        </tr>
                        <tr class="total">
                            <th>Tổng</th>
                            <td>3,427</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="top"></div>
                <div class="bottom"></div>
            </aside>
            <!--  end .box -->
        </div>
        <!--  end .sidebar_left_middle -->
    </div>
    <!--  end .sidebar_left_bottom -->
</div>
<!--  end #sidebar_left -->