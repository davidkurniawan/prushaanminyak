<div id="content">
    <form method="post" enctype="multipart/form-data">
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    <p>
                        <label for="message_to">Email</label>
                        <input type="text" class="input-text" name="message_to" id="message_to" value="" />
                    </p>
                    <p>
                        <label for="message_subject">Subject</label>
                        <input type="text" class="input-text" name="message_subject" id="message_subject" />
                    </p>
                    <p>
                        <label for="message_cc">CC</label>
                        <input type="text" class="input-text" name="message_cc" id="message_cc" />
                    </p>
                    <p>
                        <label for="message_bcc">BCC</label>
                        <input type="text" class="input-text" name="message_bcc" id="message_bcc" />
                    </p>
                    <p class="upload">
                        <label for="message_attach">Attachment</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" id="message_attach" name="message_attach" accept="pdf|doc|docx|txt|xls|xlsx" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Extension Allowed: </span>
                    </p>
                </div>
            </div>
            <div class="clear"></div>

            <div class="form-div ckeditor">
                <h3>Message</h3>
                <textarea class="content" name="message"></textarea>
            </div>

        </div>
    </form>
</div>