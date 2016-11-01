$(window).resize(function() {
	resize();
});


//Tìm kiếm sidebar
function typeSearch(val){
	if(val==1){
		$("#search_product").show();
		$("#search_post").hide();
	};
	if(val==2){
		$("#search_product").hide();
		$("#search_post").show();
	}
}

//Document
function detail(id){
	if($("#content #doc_"+id).css('display')=='none') $("#content #doc_"+id).fadeIn(300);
	else $("#content #doc_"+id).fadeOut(100);
}

function resize(){
	w_content = $("#content").width();
	
	//Sản phẩm
	if($('div').hasClass('box_product')) $('#content .box_product').width(getWidth(220)-1);
	
	if($('div').hasClass('option_related')) $('#content .box_product.option_related').width(getWidth(185)-3);
	
	if($('div').hasClass('des_scroll')){  			//Tooltip
		w_box_pro = $('.box_product').width();
		h_box_pro = $('.box_product').height();
		
		$('#content .des_scroll').css({width:w_box_pro+'px',height:(h_box_pro+15)+'px'});
		$('#content .des_scroll div').css({width:(w_box_pro-10)+'px',height:(h_box_pro+6)+'px'});
	}			
	
//	if($('div').hasClass('product_detail')) $('#content .box_product').width(getWidth(185)-6);		//San pham lien quan trong trang chi tiet
	
	
	//Tab
	if($('div').hasClass('tab_container')) $('#content .tab_container').width(w_content-26);		//Tab chi tiết
	
	//List danh mục
	if($('ul').hasClass('list_category')) $('#content .list_category li').width(getWidth(185)-12);
	
	//List danh muc
	if($('ul').hasClass('list_category2')) $('#content .list_category2 li').width(getWidth(170));
	
	//Bài viết
	
	if($('div').hasClass('filter_post')) $('#content .box_post').width(getWidth(400)-9);
	else if($('div').hasClass('box_post')) $('#content .box_post').width(getWidth(400)-9);
	
	//Video
	if($('div').hasClass('box_video')) $('#content .box_video').width(getWidth(180)-15);
	
	//Video lien quan
	if($('div').hasClass('related')) $('#content .related ul li').width(getWidth(269)-11);
	
	//Video - trang chi tiết
	if($('div').hasClass('video_play')) $(".video_play iframe").css({'width':w_content,'height':Math.floor((w_content+200)/2)});
	
	//Hình ảnh
	if($('div').hasClass('box_gallery')) $('#content .box_gallery').width(getWidth(200)-13);
	
	
	//Quảng cáo 2 bên
	w_window = windowSize();				//Kích thước trang web
	w_wrapper = $("#wrapper").width();
	w_col_out = Math.floor((w_window[0]-w_wrapper)/2);	//Kich thước cột hiển thị 2 bên web
	w_adv = $("#adv_left_out").width();				//Kich thước quảng cáo 2 bên web
	
	if(w_col_out > w_adv+10){		//Kiểm tra xem đủ chỗ trống để hiện thị quảng cáo ko
		$("#adv_left_out").show();
		$("#adv_right_out").show();
		$("#adv_left_out").css('left',w_col_out-w_adv-15);
		$("#adv_right_out").css('right',w_col_out-w_adv-15);
	}else{
		$("#adv_left_out").hide();
		$("#adv_right_out").hide();
	}
	
	//Banner chan web
	if($('div').hasClass('banner_bottom')){
		$(".box_banner.banner_bottom").css({'width':w_wrapper});
		$(".box_banner.banner_bottom .caroufredsel_wrapper").css({'width':w_wrapper});
	}
	
	
	//popup
	$(window).scroll(function () {
		$(".window").css('top',$(this).scrollTop()+100);
	});
}

function getWidth(min_width){
	w_content = $("#content").width();
	
	num_item = Math.floor(w_content/min_width);		//Số đối tượng hiển thị trên 1 hàng
	
	w_item = Math.floor(w_content/num_item)-1;	//Chiều rộng của 1 đối tượng
	
	return w_item;
}


//Thiết lập thời gian ẩn thông báo
function hideMessage(){
	$("#message_top").fadeOut('medium');
	$("#flashMessage").fadeOut('medium');
}

//Lên đầu trang
function backToTop(){
	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
}

//Lay kich thuoc phan vung lam viec cua trinh duyet
function windowSize(){
	var width = 0, height = 0;
	if( typeof( window.innerWidth ) == 'number' ) {
	  //Non-IE
	  width = window.innerWidth;
	  height = window.innerHeight;
	} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
	  //IE 6+ in 'standards compliant mode'
	  width = document.documentElement.clientWidth;
	  height = document.documentElement.clientHeight;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	  //IE 4 compatible
	  width = document.body.clientWidth;
	  height = document.body.clientHeight;
	}
	return [width,height];
}


//Popup
function popup(id){
	var id = '#'+id;
    
    //Lấy chiều cao và rộng của màn hình 
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    // định dạng chiều cao và rộng cho cái vùng div chứa cái popup
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    
    //hiệu ứng xuất hiện    
    $('#mask').fadeIn(1000);
    $('#mask').fadeTo("slow",0.8);

          
    //làm cho cái popup canh giữa màn hình
    $(id).css('left', maskWidth/2-$(id).width()/2);

    //hiệu ứng cho cái popup xuất hiện (xuất hiện từ từ trong vòng 1s)
    $(id).fadeIn(1000);     

	//dong khi click vào nút close 
	$('.window .close').click(function (e) {
	    //Cancel the link behavior
	    e.preventDefault();
	    
	    $('#mask').hide();
	    $('.window').hide();
	});        

	//Nếu vùng div id mask được click thì dong popup
	$('#mask').click(function () {
	    $(this).hide();
	    $('.window').hide();
	}); 
}


//Xem thêm nội dung
function more_description(id){
	$(".more_"+id).fadeIn(400);
	$(".less_"+id).hide();
}

function less_description(id){
	$(".less_"+id).fadeIn(400);
	$(".more_"+id).hide();
}


/**************** Link Hover ***************/
/*
 * Tooltip script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 

this.tooltip = function(){	
	/* CONFIG */		
		xOffset = 10;
		yOffset = 20;		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result		
	/* END CONFIG */		
	$("a.tooltip").hover(function(e){											  
		this.t = this.title;
		this.title = "";									  
		$("body").append("<p id='tooltip'>"+ this.t +"</p>");
		$("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");		
    },
	function(){
		this.title = this.t;		
		$("#tooltip").remove();
    });	
	$("a.tooltip").mousemove(function(e){
		$("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};
/**************** end Link Hover ***************/




/***************   jquery tooltip ***************/
(function($){

	$.fn.tooltip = function(instanceSettings){
		
		$.fn.tooltip.defaultsSettings = {
			attributeName:'title',
			borderColor:'#ccc',
			borderSize:'3',
			cancelClick:0,
			followMouse:1,
			height:'auto',
			hoverIntent:{sensitivity:7,interval:100,timeout:0},
			loader:1,
			loaderHeight:16,
			loaderImagePath:'./img/loading.gif',
			loaderWidth:17,
			positionTop: 12,
			positionLeft: 12,
			width:'300px',			//auto
			titleAttributeContent:'',
			tooltipBGColor:'#fff',
			tooltipBGImage:'none', // http path
			tooltipHTTPType:'get',
			tooltipPadding:10,
			tooltipSource:'inline', //inline, ajax, iframe, attribute
			tooltipSourceID:'',
			tooltipSourceURL:'',
			tooltipID:'tooltip'
		};
		
		//s = settings
		var s = $.extend({}, $.fn.tooltip.defaultsSettings , instanceSettings || {});
		
		var positionTooltip = function(e){
			
			var posx = 0;
			var posy = 0;
			if (!e) var e = window.event;
			if (e.pageX || e.pageY) 	{
				posx = e.pageX;
				posy = e.pageY;
			}
			else if (e.clientX || e.clientY) 	{
				posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
				posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
			}
			
			var p = {
				x: posx + s.positionLeft, 
				y: posy + s.positionTop,
				w: $('#'+s.tooltipID).width(), 
				h: $('#'+s.tooltipID).height()
			}
			
			var v = {
				x: $(window).scrollLeft(),
				y: $(window).scrollTop(),
				w: $(window).width() - 20,
				h: $(window).height() - 20
			};
				
			//don't go off screen
			if(p.y + p.h > v.y + v.h && p.x + p.w > v.x + v.w){
				p.x = (p.x - p.w) - 45;
				p.y = (p.y - p.h) - 45;
			}else if(p.x + p.w > v.x + v.w){
				p.x = p.x - (((p.x+p.w)-(v.x+v.w)) + 20);
			}else if(p.y + p.h > v.y + v.h){
				p.y = p.y - (((p.y+p.h)-(v.y+v.h)) + 20);
			}
			
			$('#'+s.tooltipID).css({'left':p.x + 'px','top':p.y + 'px'});
		}
		
		var showTooltip = function(){
			$('#tooltipLoader').remove();
			$('#'+s.tooltipID+' #tooltipContent').show();
			
			if($.browser.version == '6.0'){//IE6 only
				$('#'+s.tooltipID).append('<iframe id="tooltipIE6FixIframe" style="width:'+($('#'+s.tooltipID).width()+parseFloat(s.borderSize)+parseFloat(s.borderSize)+20)+'px;height:'+($('#'+s.tooltipID).height()+parseFloat(s.borderSize)+parseFloat(s.borderSize)+20)+'px;position:absolute;top:-'+s.borderSize+'px;left:-'+s.borderSize+'px;filter:alpha(opacity=0);"src="blank.html"></iframe>');
			};
		}
		
		var hideTooltip = function(valueOfThis){
			$('#'+s.tooltipID).fadeOut('fast').trigger("unload").remove();
			if($(valueOfThis).filter('[title]')){
				$(valueOfThis).attr('title',s.titleAttributeContent);
			}
		}
		
		var urlQueryToObject = function(s){
			  var query = {};
			  s.replace(/b([^&=]*)=([^&=]*)b/g, function (m, a, d) {
				if (typeof query[a] != 'undefined') {
				  query[a] += ',' + d;
				} else {
				  query[a] = d;
				}
			  });
			  return query;
		};
		
		return this.each(function(index){
			
			if(s.cancelClick){
				$(this).bind("click", function(){return false});
			}
			
			if($.fn.hoverIntent){
				$(this).hoverIntent({
					sensitivity:s.hoverIntent.sensitivity,
					interval:s.hoverIntent.interval,
					over:on,
					timeout:s.hoverIntent.timeout,
					out:off
				});
			}else{
				$(this).hover(on,off);
			}
					  
			function on(e){	
		
				$('body').append('<div id="'+s.tooltipID+'" style="background-repeat:no-repeat;background-image:url('+s.tooltipBGImage+');padding:'+s.tooltipPadding+'px;display:none;height:'+s.height+';width:'+s.width+';background-color:'+s.tooltipBGColor+';border:'+s.borderSize+'px solid '+s.borderColor+'; position:absolute;z-index:100000000000;"><div id="tooltipContent" style="display:none;"></div></div>');
				
				var $tt = $('#'+s.tooltipID);
				var $ttContent = $('#'+s.tooltipID+' #tooltipContent');
				
				if(s.loader && s.loaderImagePath != ''){
					$tt.append('<div id="tooltipLoader" style="width:'+s.loaderWidth+'px;height:'+s.loaderHeight+'px;"><img src="'+s.loaderImagePath+'" /></div>');	
				}
				
				if($(this).attr('title')){
					s.titleAttributeContent = $(this).attr('title');
					$(this).attr('title','');
				}
				
				if($(this).is('input')){
					$(this).focus(function(){ hideTooltip(this); });
				}
				
				e.preventDefault();//stop
				positionTooltip(e);
				
				$tt.show();
				
				//get values from element clicked, or assume its passed as an option
				s.tooltipSourceID = $(this).attr('href') || s.tooltipSourceID;
				s.tooltipSourceURL = $(this).attr('href') || s.tooltipSourceURL;
				
				switch(s.tooltipSource){
					case 'attribute':/*/////////////////////////////// attribute //////////////////////////////////////////*/
						$ttContent.text(s.titleAttributeContent);
						showTooltip();
					break;
					case 'inline':/*/////////////////////////////// inline //////////////////////////////////////////*/
						$ttContent.html($(s.tooltipSourceID).children());
						$tt.unload(function(){// move elements back when you're finished
							$(s.tooltipSourceID).html($ttContent.children());				
						});
						showTooltip();
					break;
					case 'ajax':/*/////////////////////////////// ajax //////////////////////////////////////////*/	
						if(s.tooltipHTTPType == 'post'){
							var urlOnly, urlQueryObject;
							if(s.tooltipSourceURL.indexOf("?") !== -1){//has a query string
								urlOnly = s.windowSourceURL.substr(0, s.windowSourceURL.indexOf("?"));
								urlQueryObject = urlQueryToObject(s.tooltipSourceURL);
							}else{
								urlOnly = s.tooltipSourceURL;
								urlQueryObject = {};
							}
							$ttContent.load(urlOnly,urlQueryObject,function(){
								showTooltip();
							});
						}else{
							if(s.tooltipSourceURL.indexOf("?") == -1){ //no query string, so add one
								s.tooltipSourceURL += '?';
							}
							$ttContent.load(
								s.tooltipSourceURL + '&random=' + (new Date().getTime()),function(){
								showTooltip();
							});
						}
					break;
				};
				
				return false;
				
			};
			
			
			function off(e){
				hideTooltip(this);
				return false;
			};
			
			if(s.followMouse){
				$(this).bind("mousemove", function(e){
					positionTooltip(e);
					return false;
				});
			}
			
		});
	};
	
})(jQuery);
/***************   end jquery tooltip ***************/






/*********** NAV **************/

//** Smooth Navigational Menu- By Dynamic Drive DHTML code library: http://www.dynamicdrive.com
//** Script Download/ instructions page: http://www.dynamicdrive.com/dynamicindex1/ddlevelsmenu/
//** Menu created: Nov 12, 2008

//** Dec 12th, 08" (v1.01): Fixed Shadow issue when multiple LIs within the same UL (level) contain sub menus: http://www.dynamicdrive.com/forums/showthread.php?t=39177&highlight=smooth

//** Feb 11th, 09" (v1.02): The currently active main menu item (LI A) now gets a CSS class of ".selected", including sub menu items.

//** May 1st, 09" (v1.3):
//** 1) Now supports vertical (side bar) menu mode- set "orientation" to 'v'
//** 2) In IE6, shadows are now always disabled

//** July 27th, 09" (v1.31): Fixed bug so shadows can be disabled if desired.
//** Feb 2nd, 10" (v1.4): Adds ability to specify delay before sub menus appear and disappear, respectively. See showhidedelay variable below

//** Dec 17th, 10" (v1.5): Updated menu shadow to use CSS3 box shadows when the browser is FF3.5+, IE9+, Opera9.5+, or Safari3+/Chrome. Only .js file changed.

var navigation={

//Specify full URL to down and right arrow images (23 is padding-right added to top level LIs with drop downs):
arrowimages: {down:['downarrowclass', '/webroot/js/down.gif', 23], right:['rightarrowclass', '/webroot/js/right.gif']},
transition: {overtime:70, outtime:20}, //duration of slide in/ out animation, in milliseconds
shadow: {enable:false, offsetx:5, offsety:5}, //enable shadow?
showhidedelay: {showdelay: 50, hidedelay: 10}, //set delay in milliseconds before sub menus appear and disappear, respectively

///////Stop configuring beyond here///////////////////////////

detectwebkit: navigator.userAgent.toLowerCase().indexOf("applewebkit")!=-1, //detect WebKit browsers (Safari, Chrome etc)
detectie6: document.all && !window.XMLHttpRequest,
css3support: window.msPerformance || (!document.all && document.querySelector), //detect browsers that support CSS3 box shadows (ie9+ or FF3.5+, Safari3+, Chrome etc)

getajaxmenu:function($, setting){ //function to fetch external page containing the panel DIVs
	var $menucontainer=$('#'+setting.contentsource[0]) //reference empty div on page that will hold menu
	$menucontainer.html("Loading Menu...")
	$.ajax({
		url: setting.contentsource[1], //path to external menu file
		async: true,
		error:function(ajaxrequest){
			$menucontainer.html('Error fetching content. Server Response: '+ajaxrequest.responseText)
		},
		success:function(content){
			$menucontainer.html(content)
			navigation.buildmenu($, setting)
		}
	})
},


buildmenu:function($, setting){
	var smoothmenu=navigation
	var $mainmenu=$("#"+setting.mainmenuid+">ul") //reference main menu UL
	$mainmenu.parent().get(0).className=setting.classname || "navigation"
	var $headers=$mainmenu.find("ul").parent()
	$headers.hover(
		function(e){
			this.istopheader?$(this).addClass('selected'):$(this).children('a:eq(0)').addClass('selected')
		},
		function(e){
			this.istopheader?$(this).removeClass('selected'):$(this).children('a:eq(0)').removeClass('selected')
		}
	)
	$headers.each(function(i){ //loop through each LI header
		var $curobj=$(this).css({zIndex: 100-i}) //reference current LI header
		var $subul=$(this).find('ul:eq(0)').css({display:'block'})
		$subul.data('timers', {})
		this._dimensions={w:this.offsetWidth, h:this.offsetHeight, subulw:$subul.outerWidth(), subulh:$subul.outerHeight()}
		this.istopheader=$curobj.parents("ul").length==1? true : false //is top level header?
		$subul.css({top:this.istopheader && setting.orientation!='v'? this._dimensions.h+"px" : 0})
		
		/*
		$curobj.children("a:eq(0)").css(this.istopheader? {paddingRight: smoothmenu.arrowimages.down[2]} : {}).append( //add arrow images
			'<img src="'+ (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[1] : smoothmenu.arrowimages.right[1])
			+'" class="' + (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[0] : smoothmenu.arrowimages.right[0])
			+ '" style="border:0;" />'
		)
		*/
		
		
		if(setting.orientation=='v'){
			$curobj.children("a:eq(0)").css(this.istopheader? {paddingRight: smoothmenu.arrowimages.down[2]} : {}).append( //add arrow images
				'<img src="'+ (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[1] : smoothmenu.arrowimages.right[1])
				+'" class="' + (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[0] : smoothmenu.arrowimages.right[0])
				+ '" style="border:0;" />'
			)
		}else{
			this.istopheader?'':$curobj.children("a:eq(0)").append( //add arrow images
				'<img src="'+ (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[1] : smoothmenu.arrowimages.right[1])
				+'" class="' + (this.istopheader && setting.orientation!='v'? smoothmenu.arrowimages.down[0] : smoothmenu.arrowimages.right[0])
				+ '" style="border:0;" />'
			)
		}
		
			
			
			
		if (smoothmenu.shadow.enable && !smoothmenu.css3support){ //if shadows enabled and browser doesn't support CSS3 box shadows
			this._shadowoffset={x:(this.istopheader?$subul.offset().left+smoothmenu.shadow.offsetx : this._dimensions.w), y:(this.istopheader? $subul.offset().top+smoothmenu.shadow.offsety : $curobj.position().top)} //store this shadow's offsets
			if (this.istopheader)
				$parentshadow=$(document.body)
			else{
				var $parentLi=$curobj.parents("li:eq(0)")
				$parentshadow=$parentLi.get(0).$shadow
			}
			this.$shadow=$('<div class="ddshadow'+(this.istopheader? ' toplevelshadow' : '')+'"></div>').prependTo($parentshadow).css({left:this._shadowoffset.x+'px', top:this._shadowoffset.y+'px'})  //insert shadow DIV and set it to parent node for the next shadow div
		}
		$curobj.hover(
			function(e){
				var $targetul=$subul //reference UL to reveal
				var header=$curobj.get(0) //reference header LI as DOM object
				clearTimeout($targetul.data('timers').hidetimer)
				$targetul.data('timers').showtimer=setTimeout(function(){
					header._offsets={left:$curobj.offset().left, top:$curobj.offset().top}
					var menuleft=header.istopheader && setting.orientation!='v'? 0 : header._dimensions.w
					menuleft=(header._offsets.left+menuleft+header._dimensions.subulw>$(window).width())? (header.istopheader && setting.orientation!='v'? -header._dimensions.subulw+header._dimensions.w : -header._dimensions.w) : menuleft //calculate this sub menu's offsets from its parent
					if ($targetul.queue().length<=1){ //if 1 or less queued animations
						$targetul.css({left:menuleft+"px", width:header._dimensions.subulw+'px'}).animate({height:'show',opacity:'show'}, navigation.transition.overtime)
						if (smoothmenu.shadow.enable && !smoothmenu.css3support){
							var shadowleft=header.istopheader? $targetul.offset().left+navigation.shadow.offsetx : menuleft
							var shadowtop=header.istopheader?$targetul.offset().top+smoothmenu.shadow.offsety : header._shadowoffset.y
							if (!header.istopheader && navigation.detectwebkit){ //in WebKit browsers, restore shadow's opacity to full
								header.$shadow.css({opacity:1})
							}
							header.$shadow.css({overflow:'', width:header._dimensions.subulw+'px', left:shadowleft+'px', top:shadowtop+'px'}).animate({height:header._dimensions.subulh+'px'}, navigation.transition.overtime)
						}
					}
				}, navigation.showhidedelay.showdelay)
			},
			function(e){
				var $targetul=$subul
				var header=$curobj.get(0)
				clearTimeout($targetul.data('timers').showtimer)
				$targetul.data('timers').hidetimer=setTimeout(function(){
					$targetul.animate({height:'hide', opacity:'hide'}, navigation.transition.outtime)
					if (smoothmenu.shadow.enable && !smoothmenu.css3support){
						if (navigation.detectwebkit){ //in WebKit browsers, set first child shadow's opacity to 0, as "overflow:hidden" doesn't work in them
							header.$shadow.children('div:eq(0)').css({opacity:0})
						}
						header.$shadow.css({overflow:'hidden'}).animate({height:0}, navigation.transition.outtime)
					}
				}, navigation.showhidedelay.hidedelay)
			}
		) //end hover
	}) //end $headers.each()
	if (smoothmenu.shadow.enable && smoothmenu.css3support){ //if shadows enabled and browser supports CSS3 shadows
		var $toplevelul=$('#'+setting.mainmenuid+' ul li ul')
		var css3shadow=parseInt(smoothmenu.shadow.offsetx)+"px "+parseInt(smoothmenu.shadow.offsety)+"px 5px #aaa" //construct CSS3 box-shadow value
		var shadowprop=["boxShadow", "MozBoxShadow", "WebkitBoxShadow", "MsBoxShadow"] //possible vendor specific CSS3 shadow properties
		for (var i=0; i<shadowprop.length; i++){
			$toplevelul.css(shadowprop[i], css3shadow)
		}
	}
	$mainmenu.find("ul").css({display:'none', visibility:'visible'})
},

init:function(setting){
	if (typeof setting.customtheme=="object" && setting.customtheme.length==2){ //override default menu colors (default/hover) with custom set?
		var mainmenuid='#'+setting.mainmenuid
		var mainselector=(setting.orientation=="v")? mainmenuid : mainmenuid+', '+mainmenuid
		document.write('<style type="text/css">\n'
			+mainselector+' ul li a {background:'+setting.customtheme[0]+';}\n'
			+mainmenuid+' ul li a:hover {background:'+setting.customtheme[1]+';}\n'
		+'</style>')
	}
	this.shadow.enable=(document.all && !window.XMLHttpRequest)? false : this.shadow.enable //in IE6, always disable shadow
	jQuery(document).ready(function($){ //ajax menu?
		if (typeof setting.contentsource=="object"){ //if external ajax menu
			navigation.getajaxmenu($, setting)
		}
		else{ //else if markup menu
			navigation.buildmenu($, setting)
		}
	})
}

} //end navigation variable

/*********** end NAV **************/



$(document).ready(function(){
	resize();
	backToTop();
	tooltip();
	
	//Hiệu ứng hover chuột vào ảnh
	$("a img").mouseover(function(){
		$(this).animate({opacity: 0.7},200);
	});
	$("a img").mouseout(function(){
		$(this).animate({opacity: 1},200);
	});
	
	
	//Menu
	navigation.init({
		mainmenuid: "bg_nav", //Menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'nav', //class added to menu's outer DIV
		//customtheme: ["#804000", "#482400"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});
	
	//Ẩn thông báo
	var t=setTimeout('hideMessage()',5000);
	
	//Poll
	$("#poll_result a.close").click(function(){
		$("#poll_result").fadeOut(200);
	});
	$("a.poll_result").click(function(){
		$("#poll_result").fadeIn(200);
	});
	
	
	//Tìm kiếm sidebar
	typeSearch($(".type_search :checked").val());
	$("input.type_search").change(function(){
		val = $(this).val();
		typeSearch(val);
	});
	
	
	//Faq
	$(".question a").click(function(){
		id = $(this).attr('href');
		
		$(".box_content_faq h4").removeClass('highline');
		$(id).addClass('highline');
		
		var pos = $(id).offset();
		$('body,html').animate({
			scrollTop: pos.top-50
		}, 500);
		return false;
	});
	
	//Hieu ung hover product
	if($('div').hasClass('tb')){		//Từ trên xuống
		$(".box_product").hover(function(){
			$(this).find('div.tb').css({top:'-250px'});
			$(this).find('div.tb').animate({top: "0px"},300);
		});
	}
	if($('div').hasClass('bt')){		//Từ dưới lên
		$(".box_product").hover(function(){
			$(this).find('div.bt').css({bottom:'-250px'});
			$(this).find('div.bt').animate({bottom: "0px"},300);
		});
	}
	if($('div').hasClass('lr')){		//Từ trái sang phải
		$(".box_product").hover(function(){
			$(this).find('div.lr').css({left:'-250px'});
			$(this).find('div.lr').animate({left: "0px"},300);
		});
	}
	if($('div').hasClass('rl')){		//Từ phải sang trái
		$(".box_product").hover(function(){
			$(this).find('div.rl').css({right:'-250px'});
			$(this).find('div.rl').animate({right: "0px"},300);
		});
	}
});

