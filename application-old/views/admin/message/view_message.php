<div id="content">
    <form action="<?php echo base_url(), 'goadmin/inbox/view/', $row['message_id']; ?>" method="post">
    	<input type="hidden" name="id" id="item-id" value="<?php echo $row['message_id']; ?>" />
        
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => $row['message_name'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="message_name">Name</label>
                        <input type="text" class="input-text" name="message_name" id="message_name" value="<?php echo $row['message_name']; ?>" readonly="readonly" />
                    </p>
                    <!-- <p>
                        <label for="message_address">Address</label>
                        <textarea readonly="readonly" class="input-text"><?php echo $row['message_address']; ?></textarea>
                    </p> -->
                    <p>
                        <label for="message_email">E-mail</label>
                        <input readonly="readonly" type="text" class="input-text" name="message_email" id="message_email" value="<?php echo $row['message_email']; ?>" />
                    </p>
                    <p>
                        <label for="message_phone">Phone</label>
                        <input readonly="readonly" type="text" class="input-text" name="message_phone" id="message_phone" value="<?php echo $row['message_phone']; ?>" />
                    </p>
                   <!--  <p>
                        <label for="message_company">Company</label>
                        <input readonly="readonly" type="text" class="input-text" name="message_company" id="message_company" value="<?php echo $row['message_company']; ?>" />
                    </p> -->
                </div>
            </div>
            
            <div id="form-right">
            	<div class="form-div">
                	<h3>Message Content</h3>
                   <!--  <p>
                    	<label for="message_subject">Subject</label>
                        <input readonly="readonly" type="text" class="input-text" name="message_subject" id="message_subject" value="<?php echo $row['message_subject']; ?>" />
                    </p> -->
                    <p>
                        <label for="message_content">Content</label>
                        <textarea readonly="readonly" style="height:164px" class="input-text"><?php echo $row['message_content']; ?></textarea>
                    </p>
                </div>
            </div>
            
            <div class="clear"></div>
            
            <?php if ($row['message_email']) : ?>
            <div class="form-div ckeditor">
                <h3>Reply to: <?php echo $row['message_email']; ?></h3>
                
                <?php if ($row['replied'] == 0) : ?>
                <textarea class="content" name="message_reply"><?php echo $row['message_reply']; ?></textarea>
                
                <?php else : ?>                
                <?php echo ($row['message_reply']); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </form>
</div>