<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>To</th>
                <th>Subject</th>
				<th>Content</th>
                <th>Date</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </thead>
        <tbody>
        	<?php
            if ($query->result_array()) :
				$i = 1;
				foreach ($query->result_array() as $item) :
					if ($item['flag'] == 1) $color = '#090';
					elseif ($item['flag'] == 2) $color = '#F00'; ?>
					<tr>
						<td align="center"><?php echo $i; ?></td>
						<td><?php echo $item['send_message_to']; ?></td>
                        <td><?php echo $item['send_message_subject']; ?></td>
                        <td><?php echo $item['send_message_content']; ?></td>
                        <td><?php echo date('l, d F Y', strtotime($item['send_message_date'])); ?></td>
						<td><span style="background:<?php echo $color; ?>;"></span></td>
						<td id="memo-<?php echo $item['send_message_id']; ?>"><?php echo $item['flag_memo']; ?></td>

                        <td class="del">
                        	<a title="Edit &quot;<?php echo $item['send_message_to']; ?>&quot;" href="<?php echo base_url(), 'goadmin/inbox/view/', $item['send_message_id']; ?>" class="input-submit edit">View</a>
                        </td>
                        <td style="text-align: center;">
                            <?php if (check_access($this->url, 'delete')) : ?>                        
                            <input class="deletechecked" type="checkbox" value="<?php echo $item['send_message_id']; ?>" />
                            <?php endif; ?>
                        </td>  
					</tr>
				<?php
                $i++;
				endforeach;
			else :
				echo '<tr><td colspan="100%" align="center">No Data</td></td>';
			endif;
			?>
        </tbody>
        <tfoot>
        	<tr>
            	<th>No.</th>
            	<th>To</th>
                <th>Subject</th>
				<th>Content</th>
                <th>Date</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>