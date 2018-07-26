        <div class="heading">
        	<?php if ($type == 'list') : ?>
                <a id="uncheck" class="input-submit" href="javascript:void(0);">Uncheck All</a>
                <a id="delcheck" class="input-submit" href="javascript:void(0);">Delete Selected</a>
                <h1>List <?php echo $title; ?> <?php if ($this->url == 'message') echo '(' , $unread , ')'; ?></h1>

                <?php if (check_access($url, 'add') && $this->uri->segment(2) != 'inbox' && $this->uri->segment(2) != 'apply') : ?>
                	<a class="input-submit" href="<?php echo base_url(), 'goadmin/', $url, '/add' ?>">Add <?php echo $title; ?></a>
                <?php endif; ?>    

                <?php if($this->uri->segment(2) == 'apply'):  ?>
                    <a class="input-submit" href="<?php echo base_url('goadmin/'.$this->url.'/export/'.$date_start.'/'.$date_end)?>">Export Data</a>
                <?php endif; ?>

        	<?php elseif ($type == 'add') : ?>
            
                <h1>Add <?php echo $title; ?></h1>
            
                <div class="form-action">
                
	            	<?php echo language_bar(); ?>
                    <input type="button" value="Back" class="input-submit back" />
                    <input type="reset" value="Reset" class="input-submit" />
                    <input type="submit" class="input-submit" value="Add" />
                </div>
                
            <?php elseif ($type == 'view') : ?>
            
            	<?php if ($this->url == 'message') : ?>
                <h1>Message from: <?php echo $row['message_name']; ?></h1>
                <?php else : ?>
                <h1>Edit <?php echo $title, ': ', $name; ?></h1>
                <?php endif; ?>
    
                <div class="form-action">
                	<?php echo language_bar(); ?>
                    <input type="button" value="Back" class="input-submit back" />
                    <?php if($this->uri->segment(2) != 'apply'): ?>
                        <input type="reset" value="Reset" class="input-submit" />
                    <?php endif; ?>
                    <?php if (check_access($this->url, 'edit') && $this->uri->segment(2) != 'apply') : ?>
                    <?php if ($this->url == 'message') : ?>
                    	<?php if ($row['replied'] == 0) : ?>
                    <input type="submit" class="input-submit" value="Reply Message" />
                    	<?php endif; ?>
                    <?php else : ?>
                    <input type="submit" class="input-submit" value="Update" />
                    <?php endif; ?>
                    
                    
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="clear"></div>
        </div>
        
        <?php if ($type == 'list') : ?>
          <form method="get">
            <table id="pager">
                <tr>
                    <td><img src="<?php echo base_url() , 'css/pager/first.png'; ?>" class="first"/></td>
                    <td><img src="<?php echo base_url() , 'css/pager/prev.png'; ?>" class="prev"/></td>
                    <td class="pagedisplay"></td>
                    <td><img src="<?php echo base_url() , 'css/pager/next.png'; ?>" class="next"/></td>
                    <td><img src="<?php echo base_url() , 'css/pager/last.png'; ?>" class="last"/></td>
                    <td style="width:30px; padding-left:10px;">Display</td>
                    <td class="choice">
                        <select class="pagesize">
                            <option value="10">10</option>
                            <option selected="selected" value="25">25</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                    </td>
                    <td width="35" align="center">data</td>

                    <?php if($this->uri->segment(2) == 'apply') { ?>
                        <td style="width:80px; padding-left:10px;">Range Date</td>
                        <td class="choice">
                            <input name="date_start" class="input-form datepicker" value="<?php echo $date_start ?>"></input>
                        </td>
                        <td> s/d</td>
                        <td class="choice">
                            <input name="date_end" class="input-form datepicker" value="<?php echo $date_end ?>"></input>
                            <button type="submit">Filter Date</button>
                            <input type="button" onclick="location.href='<?=base_url().'goadmin/apply'?>';" value="Reset Filter">
                        </td>
                    <?php } ?>
                </tr>
            </table>
            </form>
            <div class="clear"></div>

        <?php endif; ?>
<div id="dialog-confirm" style="display: none;" title="Delete selected items?">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-alert" title="Warning!" style="display: none;">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Please select item(s) to delete first.</p>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#uncheck').click(function(){
        $('.deletechecked').attr('checked',false);
    });
    $('#delcheck').click(function(){
        var n = $('input:checked').length;
        if(n>0){
            $('#dialog-confirm').dialog({
                resizable: false,
                height:140,
                modal: true,
                buttons: {
                    Yes: function() {
                        var id = '';
                        var table = $('.tablesorter').attr('id');
                        $('input:checked').each(function(){
                            id += '"' + $(this).val() + '",';
                        });
                        var idLen = id.length;
                        id = id.slice(0,idLen-1);
                        $.ajax({
                            type: 'POST',
                            data: 'id=['+id+']&table='+table,
                            dataType: 'JSON',
                            url: '<?php echo base_url('goadmin/sequential/delete'); ?>',
                            success:function(data){
                                $('.deletechecked').attr('checked',false);
                                location.reload();
                            }
                        });
                    },
                    No: function() {
                        $(this).dialog('close');
                    }
                }
            });
        }else{
             $('#dialog-alert').dialog({
                height: 90,
                modal: true
            });
        }
    });
});
</script>