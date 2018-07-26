<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Title</th>
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
			<td align="center">
                <?php echo $i; ?>   
            </td>

	        <td>
                <?php echo $item['investment_name']; ?>
            </td>

            <td id="item-<?php echo $item['unique_id']; ?>" class="flag <?php echo $item['flag']; ?>">
                <span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" />
            </td>

			<td id="memo-<?php echo $item['unique_id']; ?>">
                <?php echo $item['flag_memo']; ?>                  
            </td>

            <td class="del">
            	<a title="Edit &quot;<?php echo $item['investment_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/', $url, '/view/', $item['unique_id']; ?>" class="input-submit edit">View</a>
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
            	<th>No.</th>
            	<th>Name</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>
