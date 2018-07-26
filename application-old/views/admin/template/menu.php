<div id="header">
    <div id="menu">
        <ul>
            <?php echo show_menu(); ?>
            <li id="most-right" class="right"><a href="<?php echo base_url(); ?>goadmin/logout">Logout</a></li>
            <li class="right"><a href="<?php echo base_url() . 'goadmin/admin/view/' . $this->session->userdata('admin_unique_id'); ?>"><?php echo $this->session->userdata('admin_name'); ?> - <span id="jclock"></span></a></li>
            <li class="right"><a target="_blank" href="<?php echo base_url(); ?>">Front Page</a></li>
            <div class="clear"></div>
        </ul>
    </div>
    <div id="menu-border"></div>
</div>