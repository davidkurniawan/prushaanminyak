<div id="content">
	<?php $this->load->view('admin/template/fixed_heading2', array('type' => 'list')); ?>
        
    <table class="tablesorter" id="<?php echo $url; ?>">
    	<thead>
        	<tr>
            	<th width="35">No.</th>
            	<th>Name</th>
                <th>Section</th>
                <?php $this->load->view('admin/template/list_table_heading2'); ?>
            </tr>
        </thead>
        <tbody>
        	<?php
            if ($query->result_array()) :
                $i = 1;
                foreach ($query->result_array() as $item) :
                    $section = $this->db->select('section_name')->from('section')->where('section_id', $item['article_section'])->get()->row_array();
                    
                    if ($item['flag'] == 1) $color = '#090';
                    elseif ($item['flag'] == 2) $color = '#F00'; ?>
                    <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td><?php echo $item['article_name']; ?></td>
                        <td><?php echo $section['section_name']; ?></td>
                        <td id="item-<?php echo $item['unique_id']; ?>" class="flag <?php echo $item['flag']; ?>"><span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" /></td>
                        <td id="memo-<?php echo $item['unique_id']; ?>"><?php echo $item['flag_memo']; ?></td>
                        
                        <td class="del">
                            <a title="Edit &quot;<?php echo $item['article_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/', $url, '/view/', $item['unique_id']; ?>" class="input-submit edit">View</a>
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
                <th>Section</th>
                <?php $this->load->view('admin/template/list_table_heading2'); ?>
            </tr>
        </tfoot>
    </table>
</div>