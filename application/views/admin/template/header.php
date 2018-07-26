<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?> | Go Online Solusi CMS</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.8.16.custom.css" />
<?php foreach ($css as $style) echo '<link rel="stylesheet" type="text/css" href="' . base_url() . 'css/' . $style . '.css" />', "\n"; ?>
<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jclock.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/function.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/global.js"></script>
<?php foreach ($js as $script) echo '<script type="text/javascript" src="' . base_url() . 'js/' . $script . '.js"></script>', "\n"; ?>
</head>

<body>