<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title, ' | ' ,$web['setting_web_title'] ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php if ($web['setting_meta_desc']) echo '<meta name="description" content="', keywords($title,false) , $web['setting_meta_desc'] , '" />'; ?>
<?php if ($web['setting_meta_key']) echo '<meta name="keywords" content="', $web['setting_meta_key'] , '" />'; ?>


<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(), 'favicon.png'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(), 'css/bootstrap.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(), 'css/slick/slick.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(), 'css/slick/slick-theme.css'; ?>" />
<?php foreach ($css as $style) echo '<link rel="stylesheet" type="text/css" href="', base_url(), 'css/', $style ,'.css" />'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(), 'css/fonts/fonts.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(), 'css/style.css'; ?>" />

<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="<?php echo base_url(), 'js/jquery-3.2.1.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(), 'js/slick/slick.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(), 'js/custom.js'; ?>"></script>
<?php /*
<script type="text/javascript" src="<?php echo base_url(), 'js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(), 'js/jquery-ui-1.8.16.custom.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(), 'js/function.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(), 'js/global.js'; ?>"></script>
*/?>
<?php foreach ($js as $script) echo '<script type="text/javascript" src="', base_url(), 'js/', $script ,'.js"></script>'; ?>
<?php $lang = $this->config->config['language_abbr']; ?>

</head>
<body>
   <header id="header">
      <div id="top-hdr">
         <div class="container">
            <div class="row">
               <div class="col-xs-6 col-md-2 l-hover">
                  <div class="logo">
                     <div class="tbl">
                        <div class="cell">
                           <a href="<?php echo site_url('home');?>"><img src=" <?php echo base_url('images/web-logo.png');?> "/></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xs-9 hidden-xs hidden-sm bg-blue">
                  <div class="h60">
                     <div class="tbl">
                        <div class="cell">
                           <ul class="main-menu">
                              <li class="nodropdown">
                                 <a href="<?php echo site_url('home');?>" class="nav-home">Home</a>
                              </li>
                              <li class="dropdown">
                                 <a href="#" class="nav-about">About Us</a>
                              </li>
                              <li class="nodropdown">
                                 <a href="<?php echo site_url('our_business');?>" class="nav-our">Our Business</a>
                              </li>
                              <li class="dropdown">
                                 <a href="#" class="nav-sustainable">Sustainable Development</a>
                              </li>
                              <li class="dropdown">
                                 <a href="<?php echo site_url('news');?>" class="nav-news">News & Media</a>
                              </li>
                              <li class="dropdown">
                                 <a href="#" class="nav-career">Career</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="dropdown-content">
                     <div class="in-dropdown">
                        <div class="inline-block w195">
                           <ul class="l-menu">
                              <li><a href="<?php echo site_url('vision_mission');?>">Vision, Misson <br/>& Values</a></li>
                              <li><a href="http://www.pttep.com/en/Aboutpttep.aspx" target="_blank">PTTEP Group</a></li>
                              <li><a href="<?php echo site_url('contact');?>">Contact Us</a></li>
                           </ul>
                        </div>
                        <div class="inline-block w180">
                           <ul class="l-menu">
                              <li><a href="<?php echo site_url('csr');?>">CSR</a></li>
                              <li><a href="#">Awards & Recoginitions</a></li>
                              <li><a href="#">Safety, Security , Health and <br/>Environment (SSHE)</a></li>
                           </ul>
                        </div>
                        <div class="inline-block w106">
                           <ul class="l-menu">
                              <li><a href="<?php echo site_url('news');?>">News</a></li>
                              <li><a href="<?php echo site_url('news');?>">Publications</a></li>
                              <li><a href="<?php echo site_url('news');?>">Video</a></li>
                           </ul>
                        </div>
                        <div class="inline-block">
                           <ul class="l-menu">
                              <li><a href="#">Working at PTTEP</a></li>
                              <li><a href="#">Job Vacancy</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="clearfix">
                        <div class="bdr-l-menu"></div>
                        <div class="bdr-r-menu"></div>
                     </div>
                  </div>
               </div>
               <div class="col-xs-6 col-md-1 r-hover">
                  <div class="h60 pos-rel">
                     <div class="tbl">
                        <div class="cell">
                           <div class="hidden-xs hidden-sm">
                              <ul class="tabs-language inline-block">
                                 <li class="<?php echo ($lang == 'id') ? 'current' : ''; ?>"><a href="<?php echo str_replace(base_url(), base_url() . 'id/', current_url()); ?>">ID</a>
                                 </li>
                                 <li class="<?php echo ($lang == 'en') ? 'current' : ''; ?>"><a href="<?php echo str_replace(base_url(), base_url() . 'en/', current_url()); ?>">EN</a>
                                 </li>
                              </ul>
                              <div class="inline-block t-language clearfix">Language</div>
                           </div>
                           <div class="hidden-md hidden-lg text-right">
                              <div class="inline-block">
                                 <ul class="tabs-language">
                                <li class="<?php echo ($lang == 'id') ? 'current' : ''; ?>"><a href="<?php echo str_replace(base_url(), base_url() . 'id/', current_url()); ?>">ID</a>
                                 </li>
                                 <li class="<?php echo ($lang == 'en') ? 'current' : ''; ?>"><a href="<?php echo str_replace(base_url(), base_url() . 'en/', current_url()); ?>">EN</a>
                                 </li>
                                 </ul>
                              </div>
                              <div class="toggle-menu inline-block"><img src=" <?php echo base_url('images/icons/toggle-menu.png');?> "/></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix box-background">
         <div class="l-hdr"></div>
         <div class="r-hdr"></div>
      </div>
   </header>


   <div id="sliding-menu">
      <ul class="smenu">
         <li><a href="<?php echo site_url('home');?>">Home</a></li>
         <li class="smenu-parent hassub"><a href="#"><span>About Us</span> <span class="caret"></span></a>
            <ul class="smenu" style="right: -140%;">
               <li class="smenu-title"><a onclick="javascript:;" href="#">Back</a></li>
               <li><a href="<?php echo site_url('vision_mission');?>">Vision, Misson & Values</a></li>
               <li><a href="http://www.pttep.com/en/Aboutpttep.aspx" target="_blank">PTTEP Group</a></li>
               <li><a href="<?php echo site_url('contact');?>">Contact Us</a></li>
            </ul>
         </li>
         <li><a href="<?php echo site_url('our_business');?>">OUR BUSINESS</a></li>
         <li class="smenu-parent hassub"><a href="#"><span>SUSTAINABLE DEVELOPMENT</span> <span class="caret"></span></a>
            <ul class="smenu" style="right: -140%;">
               <li class="smenu-title"><a onclick="javascript:;" href="#">Back</a></li>
               <li><a href="<?php echo site_url('csr');?>">CSR</a></li>
               <li><a href="#">Awards & Recoginitions</a></li>
               <li><a href="#">Safety, Security , Health and Environment (SSHE)</a></li>
            </ul>
         </li>
         <li class="smenu-parent hassub"><a href="<?php echo site_url('news');?>"><span>NEWS & MEDIA</span> <span class="caret"></span></a>
            <ul class="smenu" style="right: -140%;">
               <li class="smenu-title"><a onclick="javascript:;" href="#">Back</a></li>
               <li><a href="<?php echo site_url('news');?>">News</a></li>
               <li><a href="<?php echo site_url('news');?>">Publications</a></li>
               <li><a href="<?php echo site_url('news');?>">Video</a></li>
            </ul>
         </li>
         <li class="smenu-parent hassub"><a href="#"><span>CAREER</span> <span class="caret"></span></a>
            <ul class="smenu" style="right: -140%;">
               <li class="smenu-title"><a onclick="javascript:;" href="#">Back</a></li>
               <li><a href="#">Working at PTTEP</a></li>
               <li><a href="#">Job Vacancy</a></li>
            </ul>
         </li>
      </ul>
   </div>
