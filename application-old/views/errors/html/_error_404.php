<?php $url = 'http://lab.gositus.com/cmsv2/'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>404 Error</title>
	<link rel="shortcut icon" href="<?php echo $url, 'favicon.ico'; ?>" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <!-- TAGCOMMANDER START //-->
<script type="text/javascript" src="//cdn.tagcommander.com/3140/tc_AGIIndonesia_1.js"></script>
<noscript><iframe src="//redirect3140.tagcommander.com/utils/noscript.php?id=1&amp;mode=iframe" width="1" height="1" rel="noindex,nofollow"></iframe></noscript>
<!-- TAG COMMANDER END //-->
    </head>
    <body>
<!-- TAGCOMMANDER START //-->
<script type="text/javascript">
var pages = ''
 var widthWindow = $(window).width();
 if (widthWindow > 1000) {
    var layout = 'desktop';
 } else {
    var layout = 'mobile'; 
 }


var tc_vars = {
page_name :       'page_not_found',
env_work :    '<?php echo ENVIRONMENT; ?>',
language :    'id',
responsive_layout :   layout,
site_name :        'corporate_site' 
}
</script>
    <div id="top">
        <img src="https://www.axa-insurance.co.id/images/404/line404.png" class="img-left"/>  
        <div id="not-found">
            <div class="wr-ct">
                <p class="ups">Oops!</p>
                <p class="n404">404</p>
                <p class="describe">We can't seem to find the page you're looking for</p>    
            </div>
            <a href="https://www.axa-insurance.co.id" class="red404">BACK TO HOME</a>  
        </div>
    </div>  
    <div id="bot">
                 
            <img src="https://www.axa-insurance.co.id/images/footer_logo_email.png"/>  
        
    </div>


  <script>
      $(function(){
        var heightWindow = $(window).height();
        var heightBot = $('#bot').height() + parseInt(40);

        // console.log(heightWindow);
      //  console.log(heightBot);
        $('#top').height(heightWindow - heightBot);
      });

      $(window).resize(function(){
            var heightWindow = $(window).height();
            var heightBot = $('#bot').height() + parseInt(40);
            $('#top').height(heightWindow - heightBot);       
      });
  </script>
  <script type="text/javascript" src="//cdn.tagcommander.com/3140/tc_AGIIndonesia_3.js"></script>
<noscript><iframe src="//redirect3140.tagcommander.com/utils/noscript.php?id=3&amp;mode=iframe" width="1" height="1" rel="noindex,nofollow"></iframe></noscript>
<!-- TAG COMMANDER END //-->

</body>
</html>
<style>

*,body{
    margin: 0;
    padding: 0
}
.container {
    margin: 0 auto;
    position: relative;
    width: 1180px;
    max-width: 1180px;
}

.img-left{
    position: absolute;
    left: 20px;
    top: 0;
}

#top {
    background-color: #103184;
    /*margin-bottom:200px;*/
    /*height: 90%;*/
}

#bot {
    padding: 20px 50px 20px 0;
    text-align: right;
    position: relative;
    display: block;
}

#bot img{
   /* display: block;*/
    text-align: right;
}

#not-found{
    color: white;
    font-family: ITC Franklin Gothic;
    text-align: center;    
    position: relative;
    top: 50%;
    
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
}

.wr-ct{
    position: relative;
    margin: 0 0 50px;    
}

p{
    padding:0;
    margin:0;
}

#top #not-found .ups {
    font-size: 50px;
}
#top #not-found .n404 {
    font-size: 150px;
}
#top #not-found .describe {
    font-size: 23px;
}
#top #not-found .red404{

    background: #ff1821;
    color: white;
    position: relative;
    border:thin solid transparent;
    padding: 10px 25px;
    border-bottom-left-radius:25px;
    border-bottom-right-radius:25px;
    border-top-left-radius:25px;
    border-top-right-radius:25px;
}
#top #not-found  .red404:hover {
    background: #ffa02f;
}
#top #not-found  a.red404 {
        display: inline-block;
        position: relative;
        text-decoration: none;
        font-size: 20px;
}

@media screen and (max-width: 1240px){
    #top #not-found .ups {
    font-size: 100px;
}
#top #not-found .n404 {
    font-size: 300px;
}
#top #not-found .describe {
    font-size: 50px;
}
#top #not-found  a.red404{
    font-size: 40px;
    }
}
</style>