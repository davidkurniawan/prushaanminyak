<div id="content">

    <form action="<?php echo base_url(), 'goadmin/', $url, '/add'; ?>" method="post" <?php if ($this->csr_image == TRUE) echo 'enctype="multipart/form-data"'; ?>>



    	<?php $this->load->view('admin/template/fixed_heading', array('type' => 'add')); ?>



    	<div id="form-content">

            <div id="form-left">

                <div class="form-div">

                    <h3>Information</h3>



                    <?php $x = 0; foreach (language()->result_array() as $lang) : ?>

                        <div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>

                            <p>

                                <label for="csr_name_<?=$lang['language_id']?>">Title</label>

                                <input type="text" class="input-text required" name="csr_name_<?=$lang['language_id']?>" id="csr_name_<?=$lang['language_id']?>" />

                            </p>

                        </div>

                    <?php $x++; endforeach; ?>



                    <?php /*

          					<p class="select">

                      <label for="csr_type">Type</label>

                      <select name="csr_type" class="input-text required" id="csr_type">

                          <option value="">-- Select Type --</option>

                          <option value="1">csr</option>

                          <option value="2">Event</option>

                          <option value="3">Announcement</option>

                      </select>

                      <span class="help">Pemilihan jenis berita</span>

                    </p>

                    */ ?>



                    <?php if ($this->csr_image == TRUE) : ?>

                    <p class="upload">

                        <label for="csr_image">Image</label>

                        <input type="text" class="input-text" />

                        <input type="file" class="input-file" name="csr_image" accept="jpg|jpeg|gif|png" size="36" />

                        <input type="button" class="input-button" value="Browse" />

                        <span class="help">Recommended Resolution: <?php echo $this->image_width, 'px * ', $this->image_height, 'px'; ?></span>

                    </p>

                    <?php endif; ?>



                    <p class="start-date">

                    	<label for="csr_start">Start Date</label>

                        <input type="text" id="csr_start" class="input-text datepicker required" name="csr_start" />

                    </p>



                    <p class="end-date">

                    	<label for="csr_end">End Date</label>

                        <input type="text" id="csr_end" class="input-text datepicker" name="csr_end" />

                    </p>

                </div>

                <div class="form-div">
                    <h3>CSR Image(s)</h3>
                   
                   <a id="add_multipleimage" class="input-submit" href="javascript:;">Add Images</a>

                </div>

            </div>



            <div id="form-right">

                <?php $this->load->view('admin/template/add_flag'); ?>

            </div>



            <div class="clear"></div>



            <?php $x = 0; foreach (language()->result_array() as $lang) : ?>

				<div class="language lang-<?=$lang['language_code']?>" <?php if ($x == 0) echo 'style="display:block"'; ?>>

                    <div class="form-div ckeditor">

                        <h3>Content</h3>

                        <textarea class="content" name="csr_content_<?=$lang['language_id']?>"></textarea>

                     </div>

                 </div>

             <?php $x++; endforeach; ?>

         </div>

    </form>

</div>

<style type="text/css">
.multipleimage .btn-remove {
    float: left;
    font-weight: bold;
    line-height: 1.5;
    width: 20px !important;
}
</style>