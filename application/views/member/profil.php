 
	<style type="text/css" media="screen"> 
		html, body	{ height:100%; }
		body {margin:0; padding:0; overflow:auto;  }
		ul{list-style-type: none;margin:0px;padding-left:20px; }
		ul li{height:20px;}
		ul li span {color:blue;overflow: hidden;text-overflow: ellipsis;white-space:nowrap;display:block;width: 100%}
		img {border:0;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);-webkit-user-select: none;}
		.static {position:static;}
		.relative {position:relative; left:auto;top:auto;bottom:auto;right:auto;}
		#loading {position:absolute;left:0px;top:0px;width:100px;height:100px;}
		#cvsBook{ position:absolute;left:0px;top:0px;width:100%;height:100%;overflow: hide; -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}
		#cvsButton{ position:absolute;left:0px;top:0px;width:100%;height:100%;overflow: hide; }
		#zoom{-ms-touch-action: pinch-zoom;position:absolute;left:0px;top:0px;width:100%;height:100%;overflow: hide; -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}
		
		#mainAdhtml{ position:absolute;display:none;  overflow: hide; -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;z-index:100; text-align:left;vertical-align:middle}

		.bookleftpage{ position:absolute;left:0px;top:0px; display:none;  overflow: hide; -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}
		.bookrightpage{ position:absolute;left:0px;top:0px;display:none; overflow: hide; -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}

		.leftPageLock{ position:absolute;left:0px;top:0px;display:none; overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}
		.rightPageLock{ position:absolute;left:0px;top:0px; display:none;overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;vertical-align:middle;}
		
		.buttonsLayer{ position:absolute;left:0px;top:0px;width:100%;height:100%;  overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}

		#mask{ position:absolute;left:0px;top:0px;width:100%;height:100%;overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}

		#maskPopup { position:absolute;left:0px;top:0px;width:100%;height:100%; background-color:#CCCCCC; opacity:0.5; display:none;}
		#cvsOthers,#cvsYoutube { position:absolute;left:0px;top:0px;}
		#cvsVideo {position:absolute;left:0px;top:0px;overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}

		#cvsSlideshow {position:absolute;left:0px;top:0px;overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}


		#cvsTest {position:absolute;width:100%;z-index: 9999999999;height:100%;background: #0000ff; opacity: 0; left:0px;top:0px;overflow: hide;-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		-webkit-user-select: none;}


		#tz { position:absolute;bottom:0px;width:100%;height:40px;
				align:center;background: blue;opacity: 0}


		#topMenuBar { top:0px;width:100%;height:40px;
				align:center;}
		#topMenuBarBg { width:100%;height:40px;
				align:center; background-color: rgba(92,92,92,0.6);}

		#topTable{height:100%;}
		#topTable img {margin-left:25px;}


		#bottomBar { left:0px;position:absolute;bottom:0px;width:100%;height:49px;z-index: 999999;
				align:center;}
		#bottomBarBg {left:0px;position:absolute; width:100%;height:49px;align:center; background-color: rgba(92,92,92,0.6);}


		#bottomTable{height:100%}
		#tbPage{width:35px;}
		#bottomTable img {margin-left:25px;}
		#tbPageCount {color:#ffffff;}
		#topBar,.topBarDefault {position:absolute; top:0px;display:none;background:#cccccc;
			margin-right: auto; margin-left: auto; width:500px;
			border:1px solid #666666;-webkit-border-radius: 5px; padding-bottom:45px;z-index: 100000;
		}
		#topBar #close{	position:absolute; top:2px; right:5px;}
		#topBarTitle {position:absolute;top:0px;width:100%;height:30px;background-color:888888;text-align:left;}
		#topBarContent {position:absolute; padding-left:10px;padding-right:10px; top:35px;
						text-align:left;overflow:auto; height:280px;width:96%;display: block;}
		#topFullTextContent {text-align:left;overflow:auto;top:35px;position:absolute; padding-left:10px;padding-right:10px;background: #ffffff}
		#topTitle {position:absolute;top:5px;left:5px;}
		.thumb {max-width:80px;max-height:78px;margin:8px;}
		.bookmark {}
		#searchBox { padding-left:5px;};
		.colPage {width:50px;}
		.colContent {}
		.searchResults { padding:20px; font-size:12; color:#333333; }
		.searchResults td {font-size:12;color:#333333;vertical-align:top;};

		p{margin:0 0; display: inline-block;vertical-align: middle;line-height: 32px;width: 500px; float: left;}
		p.p1{padding:  0 0 0 0;margin:0 0; width: 50px;float: left;color: red; height: 35px; line-height: 35px}
		p.p2{padding:  0 0 0 15px;margin:0 0; width: 300px;float:left;text-decoration: underline;height: 35px; line-height: 35px}
		#op textarea{ width:100%; height: 50px;}
		.bookmarkrow{border-bottom:  1px dashed #ffffff; margin: 15px 0px; height: 35px}

		button{height: 35px;}

		#inputBox p{
			margin: 20px 30px;
		}

		#tbKeyword{
			margin: 10px 30px;
		}

		.slides {

			margin: 45px 0 0;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			padding: 1%;

		}


		/* Animation */

		.slides .inner {
			-webkit-transform: translateZ(0);
			-webkit-transition: all 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000); 
			-moz-transition: all 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000); 
		    -ms-transition: all 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000); 
		     -o-transition: all 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000); 
		        transition: all 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000); /* easeInOutQuart */

			-webkit-transition-timing-function: cubic-bezier(0.770, 0.000, 0.175, 1.000); 
			-moz-transition-timing-function: cubic-bezier(0.770, 0.000, 0.175, 1.000); 
		    -ms-transition-timing-function: cubic-bezier(0.770, 0.000, 0.175, 1.000); 
		     -o-transition-timing-function: cubic-bezier(0.770, 0.000, 0.175, 1.000); 
		        transition-timing-function: cubic-bezier(0.770, 0.000, 0.175, 1.000); /* easeInOutQuart */
		}


		article img {
			width: 100%;
			
		}


		.slides .inner {
			
			line-height: 0;

		}

		.slides article {
			
			float: left;
		}

		.email td {
				width:145px;
			}
			
		td input, textarea{
			
			width: 310px;
		}

		#snsbox p{
			padding:  0px 5px;
		}
		#mainAdInner{ position:absolute;
			vertical-align:middle;margin:auto;
		}

		/* ColorPicker */
		#colorPicker { margin:0; padding:0px; }
		#colorPicker div,ul,ol,li,dl,dt,dd,form,img,p{ margin:0; padding:0; border:0;}
		#colorPicker li { list-style-type:none;}
		#colorPicker h1,h2,h3,h4,h5,input{ margin:0; padding:0; letter-spacing:1px;}
		#colorPicker textarea{ overflow:auto;}
		#color{ width:235px; padding:0 0 1px 0; background:#fff; overflow:hidden; margin-bottom:30px;}
		#color ul{ width:78px; float:left; display:inline; background:#fff; overflow:hidden;}
		#color li{ float:left; display:inline; width:12px; height:12px; margin:1px 0 0 1px; background:#808080;}
		#color li a{ display:block; margin:1px 0 0 1px; width:11px; height:11px; overflow:hidden;}
	</style>
    
    

	<script src="<?php echo base_url();?>assets/spin.min.js"></script>

	<script type="text/javascript">
		

		function showSpinner(){
			var opts = {
			      lines: 16, 
			      length: 15, 
			      width: 5, 
			      radius: 18, 
			      color: '#ffffff', 
			      speed: 1, 
			      trail: 100, 
			      shadow: true
	    	};
			var target = document.getElementById('loading');
			var spinner = new Spinner(opts).spin(target);
		}



	</script>

	<script>
	//颜色选择器代码
	// 辅助函数
	function F$(element){
	 return typeof(element)=="object" ? element : document.getElementById(element);
	};
	
	// 事件加载器
	function addEvent(elem,type,fn){if(elem.nodeName==="A"&&type==="click"){F7(elem).attr("href","javascript:void(0)")};if(elem.addEventListener){elem.addEventListener(type,fn,false);return true;}else if(elem.attachEvent){elem['e'+type+fn]=fn;elem[type+fn]=function(){elem['e'+type+fn](window.event);}
	elem.attachEvent("on"+type,elem[type+fn]);return true;}
	return false;};
	
	// 主体函数
	var getColor = function(hand, input, elem, mouse){
	// 缺点：目前不支持点击空白地方关闭
	  this.hand = hand;// 触发按钮
	  this.input = input;// 接受选中颜色的表单
	  this.elem = elem;// 色块放置的容器，最佳标签为DIV
	  this.mouse = mouse;// 鼠标触发动作
	  this.flag = 0;// 记录是否已经打开颜色模块
	  this.h = [];
	  this.h[0] = "FF";
	  this.h[1] = "CC";
	  this.h[2] = "99";
	  this.h[3] = "66";
	  this.h[4] = "33";
	  this.h[5] = "00";
	};
	getColor.prototype = {
	  init: function(){// 执行
		var that = this;
		addEvent(this.hand, this.mouse, function(){
		  if(that.flag == 0){
			that.show();
			that.getRank();
			//that.hand.onblur = function(){ that.hide() };// 手柄失去焦点后关闭  --  此功能失败
			//that.hand.onblur = function(){ setTimeout(function(){that.hide()}, 100) };// 手柄失去焦点后关闭
		  }else{
			that.hide();
		  };
		});
	  },
	  
	  show: function(){
		this.elem.style.display = "block";
		this.elem.innerHTML = "";// 先清空内容；
		this.flag = 1;
	  },
	  
	  hide: function(){
		this.elem.style.display = "none";
		this.flag = 0;
	  },
	  
	  getRank: function(){// 组合出216种不同的颜色参数
		for(var r=0; r<6; r++){
		  var _ul = document.createElement("ul");
		  for(var g=0; g<6; g++){
			for(var b=0; b<6; b++){
			  this.getCube(this.h[r], this.h[g], this.h[b], _ul);
			};
		  };
		  this.elem.appendChild(_ul);
		};
	  },
	  
	  getCube: function(R, G, B, _ul){// 创建颜色小方块
		var _li = document.createElement("li");
		var _a = document.createElement("a");
		_a.style.background = "#"+ R + G + B;
		_li.title = "#"+ R + G + B;
		_li.appendChild(_a);
		_ul.appendChild(_li);
		var that = this;
		addEvent(_li, "click", function(){ that.action(R,G,B) });
	  },
	  
	  action:function(R,G,B){//点击颜色后的执行
		this.hide();
		this.input.value = parseInt(R,16)+","+parseInt(G,16)+","+parseInt(B,16);
		//this.input.value = "";
		this.hand.style.background = "#"+R+G+B;
		
		//alert('您选择的颜色是:'+RGB);
	  }
	};
	</script>


	
	<script>
        function isNUM(e)
        {
            var iKeyCode = e.keyCode;
            if(!(((iKeyCode >= 48) && (iKeyCode <= 57)) || (iKeyCode == 13) || (iKeyCode == 46) || (iKeyCode == 45) || (iKeyCode == 37) || (iKeyCode == 39) || (iKeyCode == 8)))
            {   
				return false;
            }
			else
			{
				if(iKeyCode == 13)
				{
					RunTime.getInputAndJumpToPage();
				}
				return true;
			}
        } 
		
		function onSearchInputKeyPress(e)
		{
            var iKeyCode = e.keyCode;
			if(iKeyCode == 13)
			{
				search();
			}
		}
		
		function onInputKeyPress(e)
		{
            var iKeyCode = e.keyCode;
			if(iKeyCode == 13)
			{
				inputPwd();
			}
		}
		
		function updateOrientation()
		{
			RunTime.saveCurrentPageNum();
			RunTime.reload();
		}
		
		function gotoPage(val)
		{
			RunTime.flipBook.turnToPage(val);
			hideTopBar();
		}
		
		function hideTopBar()
		{
			RunTime.flipBook.hideTopBar();
		}
		
		function search()
		{
			RunTime.flipBook.search();
		}
		
		function inputPwd()
		{
			RunTime.flipBook.inputPwd();
		}
		
		function clickInvoke(e)
		{
			alert("click");
		}
		
		function onDoubleClick(e)
		{
			alert("dblclick");
		}
		
		function clearPopupContents()
		{
			//alert("clearPopupContents");
			RunTime.clearPopupContents();
		}
		
		function clearLeftBgAudio()
		{
			RunTime.clearLeftBgAudio();
		}
		
		function clearRightBgAudio()
		{
			RunTime.clearRightBgAudio();
		}

		function closeNotePopup(){

		}

		function saveHighlightNote(){
			RunTime.updateHighLightNote(document.getElementById("textNote").value, document.getElementById("showVal").value );
			clearPopupContents();
		}
		
		function showHighlightColor(){
			var Fcolor = new getColor(F$("showColor"), F$("showVal"), F$("color"), "click");
	  		Fcolor.init();
		}
		

		function deleteHighlightNote(){
			RunTime.deleteHighLight();
			clearPopupContents();
		}


		function saveNote(){
			RunTime.updateNote(document.getElementById("textNote").value);
			clearPopupContents();
		}

		function deleteNote(){
			RunTime.deleteNote();
			clearPopupContents();
		}

		function addBookmark(val){

			RunTime.flipBook.addBookmark(val,document.getElementById("bookmarknote").value);

		}

		function removeBookmark(val){
			RunTime.flipBook.removeBookmark(val);
		}

		function InputUnlock(){
			RunTime.InputUnlock();
		}

		function unlockPage(){
			RunTime.flipBook.unlockPage();
		}

		function onUnlockKeyPress(e)
		{
            var iKeyCode = e.keyCode;
			if(iKeyCode == 13)
			{
				unlockPage();
			}
		}

		
	</script>
 
<body onload="showSpinner();" scroll="no" style="overflow:hidden" onorientationchange="updateOrientation()" onselectstart="return false">


	
	<div id="zoom"  >
		
		<canvas id="cvsBook" class="canvasBook"  width="1" height="1" onselectstart="return false">this browser does not support canvas…</canvas>
		<div id="mainAdhtml">
			<a id="mainAdInner">
				<img id="mainAdimg" />
			</a>
		</div>
		<img id='leftpage' class="bookleftpage" src=''/>
		<img id='rightpage' class="bookrightpage" src=''/>
		<canvas id="cvsButton" class="canvasBook"  width="1" height="1" onselectstart="return false">this browser does not support canvas…</canvas>

		<canvas  style=" position:absolute; " id="cvsHighLight" width="1" height="1" onselectstart="return false">this browser does not support canvas…</canvas>

		<canvas  style=" position:absolute; " id="cvsNote" width="1" height="1" onselectstart="return false">this browser does not support canvas…</canvas>

		<canvas  style=" position:absolute; " id="cvsBookmark" width="1" height="1" onselectstart="return false">this browser does not support canvas…</canvas>


		<div id="mask">
			<div id="leftPageLock" class ="leftPageLock" >
				<img id ="leftLockIcon" src="<?php echo base_url();?>assets/content/images/iconLock.png" style="position:absolute;" onclick="InputUnlock()" >
			</div>
			<div id="rightPageLock" class ="rightPageLock" >
				<img id ="rightLockIcon" src="<?php echo base_url();?>assets/content/images/iconLock.png" 
				style="position:absolute;" onclick="InputUnlock()" >
			</div>
		</div>

		
		<div id="cvsLeftPageBgAudio"></div>
		<div id="cvsRightPageBgAudio"></div>
		<div id="cvsSlideshow"></div>


		<div id="cvsVideo" ></div>

	</div>

		<div id="maskPopup"></div>
		<div id="cvsOthers"></div>
		<div id="cvsAudio"></div>

	

	<div id="hiddenSearch" style="display:none">
		<div id="searchBox">
		<input id="tbKeyword"  onkeypress="return onSearchInputKeyPress(event)" />
		<input id="btnSearch" type="button" value="$Search" onclick="search();" />
		<div class="searchResults">			
		</div>
		</div>
	</div>
	<div id="hiddenInput" style="display:none;">
		<div id="inputBox" style="width:300px; height:120px;">
		<p>Please input password below:</p>
		<input id="tbKeyword" type="password" style="width:120px;height:20px;"  onkeypress="return onInputKeyPress(event)" />
		<input type="button" style="height:20px;" value="Submit" onclick="inputPwd();" />
		</div>
	</div>

	<div id="loading" style="vertical-align:middle;dispaly:none;">
	</div>

	<div id="loadingLogo" style="vertical-align:middle;dispaly:none;position:absolute">
	</div>

	<!--
	<div id="cvsYoutube">
	<iframe frameborder="0" type="text/html" height="390" width="640" src="http://www.youtube.com/embed/JW5meKfy3fY?controls=0&enablejsapi=1&origin=http://mysite.com"></iframe>
	</div>
	-->
	<div id="topMenuBar">
		<div id="topMenuBarBg" >
		<table id="topTable" align="center" width="100%">
			<tr valign="middle">
				<td width="100%" align="center"  id="menuParent">
					<img id="btnContents" src="<?php echo base_url();?>assets/content/images/btnContents.png" style="display:none" width="32" height="32" />
					<img id="btnThumbs" src="<?php echo base_url();?>assets/content/images/btnThumbs.png" style="display:none" width="32" height="32" />
					<img id="btnSearch" src="<?php echo base_url();?>assets/content/images/btnSearch.png" style="display:none" width="32" height="32" />
					<img id="btnShowTxt" src="<?php echo base_url();?>assets/content/images/btnShowTxt.png" style="display:none" width="32" height="32" />
					<img id="btnMask" src="<?php echo base_url();?>assets/content/images/btnMask.png" style="display:none" width="32" height="32" />
					<img id="btnBookMark" src="<?php echo base_url();?>assets/content/images/btnBookMark.png" style="display:none" width="32" height="32" />
					<img id="btnNote" src="<?php echo base_url();?>assets/content/images/btnNote.png" style="display:none" width="32" height="32" /> 
					<img id="btnAutoFlip" src="<?php echo base_url();?>assets/content/images/btnAutoFlip.png" style="display:none" width="32" height="32" />
					<img id="btnDownload" src="<?php echo base_url();?>assets/content/images/btnDownload.png" style="display:none" width="32" height="32" />
					<img id="btnZoom" src="<?php echo base_url();?>assets/content/images/btnZoom.png" style="display:none" width="32" height="32" />
					<img id="btnEmail" src="<?php echo base_url();?>assets/content/images/btnEmail.png" style="display:none" width="32" height="32" />
					<img id="btnSns" src="<?php echo base_url();?>assets/content/images/btnSns.png" style="display:none" width="32" height="32" />
                    <img id="btnAboutUs" src="<?php echo base_url();?>assets/content/images/btnAboutUs.png" style="display:none" width="32" height="32" />
				</td>

			</tr>
		</table>
		</div>
	</div>

	<div id="topBar">
		<div id="topBarTitle">
			<span id="topTitle">Table of Contents:</span>
			<img id="close" width="24" height="24" src="<?php echo base_url();?>assets/content/images/close.png"  onclick="hideTopBar();" />			
		</div>
		<div id="topBarContent"></div>
		<div id="topFullTextContent"></div>
	</div>

	<div id="bottomBar">
		<div id="bottomBarBg" />
		<table id="bottomTable" align="center" width="100%">
			<tr valign="middle">

				<td width="100%" align="center" valign="bottom">
					<img id="btnFirstPage" src="<?php echo base_url();?>assets/content/images/btnFirstPage.png" width="32" height="32" />
					<img id="btnPrevPage" src="<?php echo base_url();?>assets/content/images/btnPrevPage.png" width="32" height="32" />
					&nbsp;&nbsp;
					<input id="tbPage" onkeypress="return isNUM(event)" style="bottom:11px;text-align:center;left:10px" class="relative"></input>&nbsp;&nbsp;<span id="tbPageCount" style="bottom:8px;left:10px" class="relative">/&nbsp;</span>&nbsp;
					<img id="btnNextPage" src="<?php echo base_url();?>assets/content/images/btnNextPage.png" width="32" height="32" />
					<img id="btnLastPage" src="<?php echo base_url();?>assets/content/images/btnLastPage.png" width="32" height="32" />
				</td>
				<td width="30%" style="padding-right:10px;" align="right">
					<img id="imgLogo" height="24" style="display:none" />
				</td>
			</tr>
		</table>

	</div>


	<script src="<?php echo base_url();?>assets/html5pc.js"></script>
	
    
    
    
 