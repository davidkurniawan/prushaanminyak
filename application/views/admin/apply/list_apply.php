<style type="text/css">
    #content a.edit {
    width: inherit;
    display: inline-block;
}
</style>

<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>
        
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Date</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </thead>
        <tbody>
        	<?php
            if ($query) :
				$i = 1;
				foreach ($query as $item) :
					if ($item['flag'] == 1) $color = '#090';
					elseif ($item['flag'] == 2) $color = '#F00'; ?>
					<tr <?php if ($item['apply_read'] == 0) echo 'class="new-message"'; ?> >
						<td align="center"><?php echo $i; ?></td>
						<td><?php echo $item['apply_name']; ?></td>

                        <?php $job_name = $this->db->get_where('job_function',array('unique_id' =>$item['apply_job_function']))->row_array(); ?>
                        <td><?php echo $job_name['job_function_name']; ?></td>

                        <td><?php echo $item['apply_email']; ?></td>
                    
                        <td><?php echo $item['apply_date']; ?></td>
                        
                        
						<td id="item-<?php echo $item['unique_id']; ?>" class="flag <?php echo $item['flag']; ?>"><span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" /></td>
                        
						<td id="memo-<?php echo $item['unique_id']; ?>"><?php echo $item['flag_memo']; ?></td>

                        <td class="del">
                            <a title="Edit &quot;<?php echo $item['apply_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/apply/view/', $item['apply_id']; ?>" class="input-submit edit">View</a>
                        </td>
                        
                        <td style="text-align: center;">
                            <?php if (check_access($this->url, 'delete')) : ?>                        
                            <input class="deletechecked" type="checkbox" value="<?php echo $item['unique_id']; ?>" />
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
                <th width="35">No.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Date</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>

            </tr>
        </tfoot>
    </table>
</div>