<div id="content">
    <?php $this->load->view('admin/template/fixed_heading', array('type' => 'list')); ?>

    <table class="tablesorter" id="<?php echo $url; ?>">
        <thead>
            <tr>
                <th width="35">No.</th>
                <th>Title</th>
                <th width="85">Job Function</th>
                <th width="">Employment Type</th>
                <th width="">Work Location</th>
                <th width="">Country</th>
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
                            <?php echo $item['career_name']; ?>
                        </td>
                        
                        <td>
                            <!-- job function -->
                            <?php  
                                $job_function = $this->db->select('job_function_name')->from('job_function')->where('unique_id', $item['career_job_function'])->get()->row_array(); 
                                echo $job_function['job_function_name'];
                            ?>  
                        </td>

                        <td>
                            <!-- employment type -->
                            <?php  
                                $employment_type = $this->db->select('employment_type_name')->from('employment_type')->where('unique_id', $item['career_employment_type'])->get()->row_array(); 
                                echo $employment_type['employment_type_name'];
                            ?> 
                        </td>

                        <td>
                            <!-- work location -->
                             <?php  
                                $work_location = $this->db->select('work_location_name')->from('work_location')->where('unique_id', $item['career_work_location'])->get()->row_array(); 
                                echo $work_location['work_location_name'];
                            ?> 
                        </td>

                        <td>
                            <!-- country -->
                            <?php  
                                $country = $this->db->select('country_name')->from('country')->where('unique_id', $item['career_country'])->get()->row_array(); 
                                echo $country['country_name'];
                            ?> 
                        </td>

                        <td id="item-<?php echo $item['unique_id']; ?>" class="flag <?php echo $item['flag']; ?>">
                            <span style="background:<?php echo $color; ?>;"></span><img class="load" src="<?php echo base_url(), 'images/admin/ajax-loader.gif' ?>" />
                        </td>

                        <td id="memo-<?php echo $item['unique_id']; ?>">
                            <?php echo $item['flag_memo']; ?>                  
                        </td>
                        
                        <td class="del">
                            <a title="Edit &quot;<?php echo $item['career_name']; ?>&quot;" href="<?php echo base_url(), 'goadmin/', $url, '/view/', $item['unique_id']; ?>" class="input-submit edit">View</a>
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
                <th>Title</th>
                <th width="85">Job Function</th>
                <th width="">Employment Type</th>
                <th width="">Work Location</th>
                <th width="">Country</th>
                <?php $this->load->view('admin/template/list_table_heading'); ?>
            </tr>
        </tfoot>
    </table>
</div>
