<div style="width:600px; margin:0 ; font-family:Arial, Helvetica, sans-serif">
    <table style="width:100%; border-collapse:collapse; border-spacing:0; height:3px">
    	<tr>
        	<td width="295" style="width:295px; background:#2993d1; margin:0; "></td>
            <td style="width:190px; background:#99ca3c; margin:0; "></td>
            <td style="width:115px; background:#ffcb08; margin:0; "></td>
        </tr>
    </table>
    
    <div style="padding:10px 15px 15px 15px">
        <p><?=$message?></p>
    </div>
    
    <div style="margin:20px 15px 15px 15px;">
    	<p><strong>Best Regards,</strong><br />
        <?php echo $this->session->userdata('admin_name'); ?>
		</p>
        <div style="margin-top:30px">
        	<img src="<?php echo base_url('images/'.$web['setting_web_logo']); ?>" alt="Logo <?php echo $web['setting_name']; ?>" />
            <div style="float:right">
            	<p style="margin-bottom:5px"><?php echo $web['setting_name']?$web['setting_name']:''; ?><br /><strong><?php echo substr_replace(str_replace("http://", "", base_url()) ,"",-1); ?></strong></p>
                <div style="float:left; width:150px">
                    <?php echo $web['setting_mobile']?'m. '.$web['setting_mobile'].'<br />':''; ?>
                    <?php echo $web['setting_phone']?'p. '.$web['setting_phone'].'<br />':''; ?>
                    <?php echo $web['setting_fax']?'f. '.$web['setting_fax']:''; ?>
                </div>
                <div style="float:left; width:150px">
                	Jln. Pejagalan 1  
                    No. 1B-B, 2nd floor 
                    Jakarta Barat 11240
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
    <table height="5px" style="width:100%; border-collapse:collapse; border-spacing:0; height:5px" >
    	<tr>
        	<td style="width:295px; background:#2993d1; height:5px"></td>
            <td style="width:190px; background:#99ca3c; height:5px"></td>
            <td style="width:115px; background:#ffcb08; height:5px"></td>
        </tr>
    </table>
</div>
<style>
	* { color:#58585a}
</style>