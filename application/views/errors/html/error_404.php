<?php $url = load_class('Config')->config['base_url']; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>404 Error</title>
	<link rel="shortcut icon" href="<?php echo $url, 'favicon.ico'; ?>" />
    <script src="<?php echo $url; ?>js/404Jquery.js"></script>
    <script src="<?php echo $url; ?>js/404JquerySpritely0.1.js"></script>
    <script src="<?php echo $url; ?>js/404Base.js"></script>
    <script type="text/javascript">
        /*
        $(document).ready(function(){
            $('.pintu').click(function(){
        		history.go(-1);
        	});
        });
        */
        var canvas, context, sources;
            
        function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
                drawStuff(); 
				//
				var wh = canvas.height/100;
				var ww = canvas.width/100;
				if(ww < '8.5') {
					$('.error').css({display:'none'});
				} else {
					$('.error').css({display:'block'});
				}
				if(ww < '7.3') {
					$('.pintu').css({bottom:wh*20, right:ww*50});
					$('.bubble').css({bottom:(wh*20)+150, right:(ww*50)+120});
					$('.arrow').css({bottom:wh*12, right:15});
					$('.arrow2').css({bottom:(wh*0)-10, right:20});
				} else if(ww < '13.6'){
					$('.pintu').css({bottom:wh*20, right:ww*23});
					$('.bubble').css({bottom:(wh*20)+150, right:(ww*23)+120});
					$('.arrow').css({bottom:wh*12, right:ww*5});
					$('.arrow2').css({bottom:(wh*0)-10, right:ww*0});
				} else {
					$('.pintu').css({bottom:wh*20, right:ww*23});
					$('.bubble').css({bottom:(wh*20)+150, right:(ww*23)+120});
					$('.arrow').css({bottom:wh*12, right:ww*10});
					$('.arrow2').css({bottom:(wh*0)-10, right:ww*10});
				}
        }
        
        function drawStuff() {
            var cw=canvas.width/100,ch=canvas.height/100;
            context.rect(0, 0, canvas.width, canvas.height);
            // gradient sky            
            var grd = context.createLinearGradient(0, 0, 0, ch*70);
            
            grd.addColorStop(0, '#41c6ff');
            grd.addColorStop(0.25, '#99dcf7');
            grd.addColorStop(0.5, '#deedf4');
            grd.addColorStop(0.75, '#f2f2f2');
            grd.addColorStop(1, '#FFFFFF');   
            
            context.fillStyle = grd;
            context.fill();
			
			// 3rd mountain
            context.beginPath();
            context.moveTo(cw*47,canvas.height);
            context.lineTo(cw*47, ch*80);
            context.quadraticCurveTo(cw*70,ch*65,canvas.width, ch*85);
            context.lineTo(canvas.width, canvas.height);
            context.closePath();
            
            var layer3 = context.createLinearGradient(0, 0, canvas.width, ch*60);
            layer3.addColorStop(0, '#249e63');
            layer3.addColorStop(0.70, '#269e61');
            layer3.addColorStop(0.80, '#45aa32');
            layer3.addColorStop(1, '#4cad28');   
            
            context.fillStyle = layer3;
            context.fill(); 
            
            // 2nd mountain
            context.beginPath();
            context.moveTo(0,canvas.height);
            context.lineTo(0, ch*80);
            context.quadraticCurveTo(cw*40,ch*70,cw*70, ch*84);
            context.lineTo(cw*80, canvas.height);
            context.closePath();
            
            var layer2 = context.createLinearGradient(0, 0, canvas.width, ch*60);
            layer2.addColorStop(0, '#2fac24');
            layer2.addColorStop(0.25, '#34ad24');
            layer2.addColorStop(0.5, '#92d726');
            layer2.addColorStop(1, '#92d726');   
            
            context.fillStyle = layer2;
            context.fill();
            
            // first mountain
            context.beginPath();
            context.moveTo(0,canvas.height);
            context.lineTo(0, ch*95);
            context.quadraticCurveTo(cw*60,ch*70,canvas.width, ch*90);
            context.lineTo(canvas.width, canvas.height);
            context.closePath();
            
            var layer1 = context.createLinearGradient(0, 0, canvas.width, ch*60);
            layer1.addColorStop(0, '#a0e647');
            layer1.addColorStop(0.5, '#a3e54d');
            layer1.addColorStop(1, '#b3e079');   
            
            context.fillStyle = layer1;
            context.fill();
        }
        //ready
        $(function(){
            canvas = document.getElementById('myCanvas'),
            context = canvas.getContext('2d');
            sources = {cloud:'cloud.png'};
            // resize the canvas to fill browser window dynamically
            window.addEventListener('resize', resizeCanvas, false);
            resizeCanvas();
			
			$('#cloud01').pan({fps: 30, speed: 0.3, dir: 'left'}); 
			$('#cloud02').pan({fps: 30, speed: 0.6, dir: 'left'}); 
			$('#bird01').sprite({fps: 4, no_of_frames: 2}).spRandom({
				top: 10,
				bottom: 90,
				speed: 6000,
				pause: 1000
			});
			$('#bird02').sprite({fps: 4, no_of_frames: 2}).spRandom({
				top: 10,
				left: 1000,
				bottom: 90,
				speed: 6000,
				pause: 1000
			});
			
			function animUp() {
				$(".bubble").animate({ top: "+=10" }, "slow", "swing", animDown);
			}
 			function animDown() {
				$(".bubble").animate({ top: "-=10" }, "slow", "swing", animUp);
			}
	
			animUp();
			
			$('.back').mouseenter(function(){
				$(this).find('.wrapper-bubble').stop().animate({'opacity' : 1}, "slow", "swing");
			});
			
			$('.back').mouseleave(function(){
				$(this).find('.wrapper-bubble').stop().animate({'opacity' : 0}, "slow", "swing");
			});
			
        });
		setInterval(function () {
			$('.sun').animate({rotate: '+=10deg'}, 0);
		}, 100);
        
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/404.css" />
    <style type="text/css">
        #myCanvas{width:100%;height:100%;}
    </style>
</head>

<body>
	<div class="container">
    	<div class="top">
            <div id="cloud01"></div>
        	<div id="cloud02"></div>
        	<div class="cont-sun">
            	<div class="bg-sun"></div>
            	<div class="sun"></div>
            </div>
            <div id="bird01" class="ui-draggable"></div>
            <div id="bird02" class="ui-draggable"></div>
        </div>
        <div class="center">
            <div class="error">
                <div class="gradient-line left-line"></div>
                <div class="text">
                    <h1>
                        <font color="#70D1FE">E</font>
                        <font color="#66C8FC">R</font>
                        <font color="#5CC0FA">R</font>
                        <font color="#52B7F8">O</font>
                        <font color="#48AFF6">R</font>
                        <font color="#3EA7F4">&nbsp;</font>
                        <font color="#339EF2">4</font>
                        <font color="#2A96F0">0</font>
                        <font color="#208DEE">4</font>
                        <font color="#1685EC">.</font>
                        <span class="clear"></span>
                    </h1>
                    <p>
                        
                        <font color="#0275E8">S</font>
                        <font color="#0477E8">o</font>
                        <font color="#0779E9">r</font>
                        <font color="#097BE9">r</font>
                        <font color="#0C7DEA">y</font>
                        <font color="#0F80EA">,</font>
                        <font color="#1182EB">&nbsp;</font>
                        <font color="#1484EB">w</font>
                        <font color="#1786EC">e</font>
                        <font color="#1988EC">&nbsp;</font>
                        <font color="#1C8BED">c</font>
                        <font color="#1F8DED">o</font>
                        <font color="#218FEE">u</font>
                        <font color="#2491EE">l</font>
                        <font color="#2793EF">d</font>
                        <font color="#2996EF">n</font>
                        <font color="#2C98F0">'</font>
                        <font color="#2F9AF1">t</font>
                        <font color="#319CF1">&nbsp;</font>
                        <font color="#349EF2">f</font>
                        <font color="#36A1F2">i</font>
                        <font color="#39A3F3">n</font>
                        <font color="#3CA5F3">d</font>
                        <font color="#3EA7F4">&nbsp;</font>
                        <font color="#41A9F4">y</font>
                        <font color="#44ACF5">o</font>
                        <font color="#46AEF5">u</font>
                        <font color="#49B0F6">r</font>
                        <font color="#4CB2F6">&nbsp;</font>
                        <font color="#4EB4F7">p</font>
                        <font color="#51B7F7">a</font>
                        <font color="#54B9F8">g</font>
                        <font color="#56BBF8">e</font>
                        <font color="#59BDF9">.</font>
                        <span class="clear"></span>
                    </p>
                    <p>
                        <font color="#0375E9">W</font>
                        <font color="#0677E9">e</font>
                        <font color="#0979EA">'</font>
                        <font color="#0C7CEA">v</font>
                        <font color="#0F7EEB">e</font>
                        <font color="#1281EB">&nbsp;</font>
                        <font color="#1583EC">c</font>
                        <font color="#1885EC">r</font>
                        <font color="#1B88ED">e</font>
                        <font color="#1E8AED">a</font>
                        <font color="#218DEE">t</font>
                        <font color="#248FEE">e</font>
                        <font color="#2791EF">d</font>
                        <font color="#2A94EF">&nbsp;</font>
                        <font color="#2D96F0">t</font>
                        <font color="#2F99F0">h</font>
                        <font color="#339BF1">e</font>
                        <font color="#369DF1">&nbsp;</font>
                        <font color="#39A0F2">l</font>
                        <font color="#3CA2F2">i</font>
                        <font color="#3EA5F3">n</font>
                        <font color="#42A7F3">k</font>
                        <font color="#45AAF4">&nbsp;</font>
                        <font color="#48ACF4">f</font>
                        <font color="#4BAEF5">o</font>
                        <font color="#4EB1F5">r</font>
                        <font color="#51B3F6">&nbsp;</font>
                        <font color="#54B6F6">y</font>
                        <font color="#57B8F7">o</font>
                        <font color="#5ABAF7">u</font>
                        <font color="#5CBDF8">r</font>
                        <font color="#60BFF8">&nbsp;</font>
                        <font color="#63C2F9">w</font>
                        <font color="#66C4F9">a</font>
                        <font color="#69C6FA">y</font>
                        <font color="#6BC9FA">o</font>
                        <font color="#6FCBFB">u</font>
                        <font color="#72CEFB">t</font>
                        <font color="#75D0FC">.</font>
                        <span class="clear"></span>
                    </p>
                    <h1 class="notfound">
                        <font color="#1685EC">.</font>
                        <font color="#208DEE">D</font>
                        <font color="#2A96F0">N</font>
                        <font color="#339EF2">U</font>
                        <font color="#3EA7F4">O</font>
                        <font color="#48AFF6">F</font>
                        <font color="#52B7F8">&nbsp;</font>
                        <font color="#5CC0FA">T</font>
                        <font color="#66C8FC">O</font>                    
                        <font color="#70D1FE">N</font>
                        <span class="clear"></span>
                    </h1>
                </div>
                <div class="gradient-line right-line"></div>
                <div class="clear"></div>
            </div>
            <div class="back">
                <a href="<?php echo $url; ?>" class="pintu"></a>
                <div class="arrow2"></div>
                <div class="wrapper-bubble"><div class="bubble"></div></div>
            </div>
        </div>
        <div class="logo"><a href="http://www.gositus.com" target="_blank"></a></div>
        <canvas id="myCanvas"></canvas>
    </div>
</body>
</html>