<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Name</th>
                <th>Email</th>
				<th>Phone</th>
                <th>Company</th>
				<th>Subject</th>
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
					<tr <?php if ($item['flag'] == 2) echo 'class="new-message"'; ?><?php if ($item['replied'] == 1) echo 'class="replied"'; ?>>

						<td  align="center"><?php echo $i; ?></td>
						<td><?php echo $item['message_name']; ?></td>
                        <td><?php echo $item['message_email']; ?></td>
                        <td><?php echo $item['message_phone']; ?></td>
                        <td><?php echo $item['message_company']; ?></td>
                        <td><?php echo $item['message_subject']; ?></td>
                        <td><?php echo date('l, d F Y', strtotime($item['message_date'])); ?></td>

						<td><span style="background:<?php echo $color; ?>;"></span></td>

						<td id="memo-<?php echo $item['message_id']; ?>"><?php echo $item['flag_memo']; ?></td>

                        <td class="del">
                        	<a title="Edit &quot;<?php echo $item['message_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/inbox/view/', $item['message_id']; ?>" class="input-submit edit">View</a>
                        </td>
                        <td style="text-align: center;">
                            <?php if (check_access($this->url, 'delete')) : ?>                        
                            <input class="deletechecked" type="checkbox" value="<?php echo $item['message_id']; ?>" />
                            <?php endif; ?>
                        </td> 

					</tr>
				<?php
                $i++;#000000
				endforeach;
			else :
				echo '<tr><td colspan="100%" align="center">No Data</td></td>';
			endif;
			?>
        </tbody>
        <tfoot>
        	<tr>
            	<th>No.</th>
            	<th>Name</th>
                <th>Email</th>
				<th>Phone</th>
                <th>Company</th>
				<th>Subject</th>
                <th>Date</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>