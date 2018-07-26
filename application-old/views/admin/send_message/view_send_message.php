<style type="text/css">
#content p{
    line-height: 2;
}
#msg_content{
    background: #fff;
    border: 1px solid #999999;
    border-radius: 3px 3px 3px 3px;
    margin-bottom: 20px;
    padding: 10px 15px 20px;
    width: 1000px;
}
</style>
<div id="content">
        <?php $this->load->view('admin/template/fixed_heading', array('type' => 'look', 'name' => $row['send_message_subject'])); ?>
        
        <div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Receiver Info</h3>
                    <p><label>Email : </label><?php echo $row['send_message_to']; ?></p>
                    <p><label>CC : </label><?php echo $row['send_message_cc']?$row['send_message_cc']:'-'; ?></p>
                    <p><label>BCC : </label><?php echo $row['send_message_bcc']?$row['send_message_bcc']:'-'; ?></p>
                    <p><label>Subject : </label><?php echo $row['send_message_subject']; ?></p>
                    <p><label>Attachment : </label><?php echo $row['send_message_attach']?'<a href="'.base_url('images/mail_attachment/'.$row['send_message_attach']).'">'.$row['send_message_attach'].'</a>':'-'; ?></p>
                    <p><label>Date : </label><?php echo date('d-M-Y H:i:s', strtotime($row['send_message_date'])); ?></p>
                </div>
            </div>
            
            <div id="form-right">
            	<div class="form-div">
                    <h3>Sender Info</h3>
                    <p><label>Name : </label><?php echo $user['admin_name']; ?></p>
                    <p><label>Email : </label><?php echo $user['admin_email']; ?></p>
                </div>
            </div>
            
            <div class="clear"></div>
            <div id="msg_content">
                <h3>Message Content: </h3><br />
                <?php echo $row['send_message_content']; ?>
            </div>
        </div>
</div>