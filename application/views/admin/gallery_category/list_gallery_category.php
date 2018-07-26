<div id="content">
	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>

	<form class="filter" method="post" action="<?php echo current_url(); ?>">
    	<label for="gallery_filter">Filter By Type :</label>
    	<select class="input-text" name="gallery_filter" id="gallery_filter">
        	<option value="">-- Select Type --</option>
            <option value="1" <?php if ($this->input->post('gallery_filter') == '1') echo 'selected="selected"'; ?>>Photo</option>
            <option value="2" <?php if ($this->input->post('gallery_filter') == '2') echo 'selected="selected"'; ?>>Video</option>
        </select>
    </form>
    
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Name</th>
                <th>Parent</th>
                <th>Type</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </thead>
        <tbody>
        	<?php
            if ($query->result_array()) :
				$i = 1;
				foreach ($query->result_array() as $item) :
				
					// To get category parent's name.
					$parent = $this->db->group_by('unique_id')->get_where('gallery_category', array('unique_id' => $item['gallery_category_parent'], 'flag !=' => 3))->row_array();
					
					if ($item['flag'] == 1) $color = '#090';
					elseif ($item['flag'] == 2) $color = '#F00'; ?>
					<tr>
						<td align="center"><?php echo $i; ?></td>
						<td><?php echo $item['gallery_category_name']; ?></td>
                        <td><?php echo (isset($parent['gallery_category_name'])) ? $parent['gallery_category_name'] : '--'; ?></td>
                        <td><?php echo ($item['gallery_category_type'] == 1) ? 'Photo' : 'Video'; ?></td>
                        
						<td id="item-<?php echo $item['unique_id']; ?>" class="flag <?php echo $item['flag']; ?>"><span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" /></td>
                        
						<td id="memo-<?php echo $item['unique_id']; ?>"><?php echo $item['flag_memo']; ?></td>
                        
                        <td class="del">
                        	<a title="Edit &quot;<?php echo $item['gallery_category_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/', $url, '/view/', $item['unique_id']; ?>" class="input-submit edit">View</a>
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
                <th>Parent</th>
                <th>Type</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>