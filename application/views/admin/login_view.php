<a id="website-logo" href="<?php echo base_url(); ?>" title="<?php echo $web['setting_name']; ?>">
    <img style="padding-left: 20px;width:11%;" src="<?php echo base_url() , 'images/', $web['setting_web_logo']; ?>" />
</a>

<div id="login-container">
    <fieldset>
        <span id="login_error"><?php echo $this->session->flashdata('message'); ?></span>
        
        <legend>Login <label id="date"></label><label id="jclock"></label></legend>
        <form id="logins" method="post" action="<?php echo base_url('goadmin/login/validate'); ?>">
            <p>
                <label for="username">Username</label>
                <input type="text" class="input-text required" name="username" id="username"  autocomplete="off" />
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" class="input-text required" name="password" id="password"   autocomplete="off"/>
             </p>
             
             <p>
                <input type="submit" class="input-submit" value="Login" />
                <img class="load" src="<?php echo base_url(); ?>images/admin/ajax-loader.gif" />
             </p>
        </form>
    </fieldset>
</div>
