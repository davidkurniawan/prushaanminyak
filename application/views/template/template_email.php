<div style="width:75%;font-family:Verdana">

    <img src="<?php echo base_url().'images/web-logo.png'; ?> " width="100%"> <br>

    <div style="padding:15px;">
        <?php echo $title; ?>
        
        <?php echo $message; ?>
        
        <?php if($link) { ?>
            <div style="text-align:center; margin-top:30px; margin-bottom:30px;">
                <a style="background-color:#1b1c20; color:white; padding:10px 30px; text-decoration:none;" href="<?php echo $link; ?>">
                    <?php echo $link_title; ?>
                </a>
            </div>
        <?php } ?>
     


        <hr style="color: red;">

        <img src="<?php echo base_url().'images/public/bg-footer.png';?>" style="float: right;padding:10px" width="100%">
      
        
    </div>
   </div>


<style type="text/css">
* { padding:0px; margin:0px; font-family: sans-serif; color: black; }
</style>