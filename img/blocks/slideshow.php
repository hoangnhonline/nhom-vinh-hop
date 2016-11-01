<script type="text/javascript">
        jQuery(document).ready(function($){
            var $container = $(".container");
            $container.wtRotator({
                width:720,
                height:285,
                button_width:16,
                button_height:16,
                button_margin:5,
                auto_start:1,
                delay:6000,
                transition:"random",
                transition_speed:800,
                block_size:75,
                vert_size:55,
                horz_size:50,
                cpanel_align:"BR",
                timer_align:"top",
                display_thumbs:1,
                display_dbuttons:1,
                display_playbutton:1,
                display_timer:0,
                display_numbers:true,
                tooltip_type:"image",
                mouseover_pause:0,
                cpanel_mouseover:0,
                text_mouseover:0,
                text_effect:"left",
                text_sync:true,
                shuffle:false,				//=false: anh chay tuan tu, =true: anh chay random
                block_delay:25,
                vstripe_delay:73,
                hstripe_delay:183
            });
            $container.undoChanges()
			
            .setEasing("linear")
            .setCpanelPos("inside")
            .updateChanges();	
        }
    );
    </script>

<div id="slideshow">
        <div class="container"><div class="wt-rotator" style="width: 720px; height: 285px;">
                <div class="screen" style="width: 720px; height: 285px;">
                    
                </div>
                <div class="c-panel" style="margin: 5px 0px; top: 259px; right: 0px; height: 16px; visibility: visible;">
                    <div class="buttons" style="float: right;">
                        <div class="prev-btn" style="margin-right: 5px; width: 16px; height: 16px;"></div>
                        <div class="play-btn pause" style="margin-right: 5px; width: 16px; height: 16px;"></div>    
                        <div class="next-btn" style="margin-right: 5px; width: 16px; height: 16px;"></div>               
                    </div>

                    <div class="thumbnails" style="height: 16px; float: right;">
                        <ul>
                            <li class="" style="width: 16px; height: 16px; line-height: 16px; margin-right: 5px;">
                                <a href="img/slide1.png" title="Slide 1" target="_self" rel="nofollow"></a>	                            
                                </li>
                            <li class="" style="width: 16px; height: 16px; line-height: 16px; margin-right: 5px;">
                                <a href="img/slide2.png" title="Slide 2" target="_self" rel="nofollow"></a>	                            
                                </li>
                            <li class="" style="width: 16px; height: 16px; line-height: 16px; margin-right: 5px;">
                                <a href="img/slide3.png" title="Slide 3" target="_self" rel="nofollow"></a>	                            
                                </li>
                            <li class="" style="width: 16px; height: 16px; line-height: 16px; margin-right: 5px;">
                                <a href="img/slide5.png" title="Slide 4" target="_self" rel="nofollow"></a>	                            
                                </li>
                            <li class="curr-thumb" style="width: 16px; height: 16px; line-height: 16px; margin-right: 5px;">
                                <a href="img/slide4.png" title="Slide 5" target="_self" rel="nofollow"></a>	                            
                                </li>
                        </ul>

                    </div> <!-- end .thumbnails --> 
                </div> <!-- end .c-panel -->
            </div></div> <!-- end .container -->	

        <div class="top"></div>
        <div class="button"></div>
    </div> <!-- end #slideshow -->