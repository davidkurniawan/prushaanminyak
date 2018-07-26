<div id="content">
    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post"enctype="multipart/form-data">
    
    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>
    
    	<div id="form-content">
            <div id="form-left">
                <div class="form-div">
                    <h3>Information</h3>
                    
                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>
                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>
                            <p>
                                <label for="video_name_<?=$lang['language_id']?>">Name</label>
                                <input type="text" class="input-text required" name="video_name_<?=$lang['language_id']?>" id="video_name_<?=$lang['language_id']?>" />
                            </p>
                        </div>
                    <?php $x++; endforeach; ?>
               <!--      <p class="select">
                        <label for="video_category">Category</label>
                        <select name="video_category" id="video_category" class="input-text">
                        	<option value="">-- Select Category --</option>
                            <?php foreach ($category->result_array() as $item) : ?>
                            <option value="<?php echo $item['unique_id']; ?>"><?php echo $item['gallery_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p> -->
                    <p>
                    	<label for="video_link">Youtube Link</label>
                        <input type="text" class="input-text required" name="video_link" id="video_link" />
                        <span class="help">Jika full link http://www.youtube.com/watch?v=STPwAla5LBk<br />cukup tuliskan <strong>STPwAla5LBk</strong> saja</span>
                    </p>
                </div>
            </div>
            
            <div id="form-right">
                <?php $this->load->view('admin/template/add_flag'); ?>
            </div>
            
            <div class="clear"></div>
         </div>
    </form>
</div>