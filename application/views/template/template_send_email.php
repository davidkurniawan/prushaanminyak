 <div style="width:600px; margin:0 ; font-family:Arial, Helvetica, sans-serif">
    <table style="width:100%; border-collapse:collapse; border-spacing:0; height:3px">
        <tr>
            <td width="295" style="width:295px; background:#00aef0; margin:0; "></td>
            <td style="width:190px; background:#00aef0; margin:0; "></td>
            <td style="width:115px; background:#00aef0; margin:0; "></td>
        </tr>
    </table>
    
    <div style="padding:10px 15px 15px 15px">
        <p><?=$message?></p>
    </div>
    
    <div style="">
        <p><strong>Best Regards,</strong><br />
        <?php echo $this->session->userdata('admin_name'); ?>
        </p>

        <div style="margin-top:30px">
            <div style="float:left;width">
            <img style="width:100px;height:71px;" src="<?php echo base_url('images/web-logo.png'); ?>" alt="Logo <?php echo $web['setting_name']; ?>" />
            <div style="float:right;width: 425px;">
                <p style="margin-bottom:5px"><strong><?php echo $web['setting_name']?$web['setting_name']:''; ?><br /><?php echo substr_replace(str_replace("http://", "", base_url()) ,"",-1); ?></strong></p>
                <div style="float:left; width:150px">
                    <!-- <?php echo $admin['admin_mobile']?'<span style="display: inline-block; width: 20px;">m. </span>'.$admin['admin_mobile'].'<br />':''; ?> -->
                    <?php echo $web['setting_phone']?'<span style="display: inline-block; width: 20px;">p. </span>'.$web['setting_phone'].'<br />':''; ?>
                    <?php echo $web['setting_fax']?'<span style="display: inline-block; width: 20px;">f. </span>'.$web['setting_fax']:''; ?>
                </div>
                <div style="float:left; width:270px; text-align: justify">
                    <?php echo $web['setting_address']?str_replace(", ","<br />",$web['setting_address']).' '.$web['setting_postcode']. '<br />':''; ?>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>

    </div>
    <table style="margin-top: 20px" height="5px" style="width:100%; border-collapse:collapse; border-spacing:0; height:5px" >
        <tr>
            <td style="width:600px; background:#00aef0; height:5px"></td>
    </table>
</div>
<style>
    * { color:#58585a}
</style>