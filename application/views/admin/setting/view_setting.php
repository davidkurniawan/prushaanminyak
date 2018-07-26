<div id="content">
    <form action="<?php echo base_url(), 'goadmin/' , $url; ?>" method="post" enctype="multipart/form-data">
    
		<?php $this->load->view('admin/template/fixed_heading', array('type' => 'view', 'name' => '')); ?>
        
        <div id="form-content">
	    <?php echo $this->session->flashdata('success'); ?>
            <div id="form-left">
                <div class="form-div">
                    <h3>General</h3>
                    <p>
                        <label for="setting_web_title">Website Title</label>
                        <input type="text" class="input-text required" name="setting_web_title" id="setting_web_title" maxlength="100" value="<?php echo $row['0']['setting_web_title']; ?>" />
                        <span class="help">Nama Website untuk tampilan di window / Tab</span>
                    </p>            
                    <p>
                        <label for="setting_meta_key">Meta Keywords</label>
                        <textarea class="input-text required" name="setting_meta_key" id="setting_meta_key"><?php echo $row[0]['setting_meta_key']; ?></textarea>
                        <span class="help">Meta Keywords untuk SEO</span>
                    </p>
                    
                    <p>
                        <label for="setting_meta_desc">Meta Description</label>
                        <textarea class="input-text required" name="setting_meta_desc" id="setting_meta_desc"><?php echo $row[0]['setting_meta_desc']; ?></textarea>
                        <span class="help">Meta Description untuk SEO</span>
                    </p>
                    
                   <!--  <p class="upload">
                        <label for="setting_favicon">Favicon</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="setting_favicon" accept="png|ico" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Resolution must be <strong>16px * 16px</strong></span>
                    </p> -->
                  
                </div>
                
                <div class="form-div">
                    <h3>Website Logo</h3>
                    <img style="display:block; margin:0 auto;" src="<?php echo base_url() . 'images/' . $row[0]['setting_web_logo']; ?>" />
                    <p class="upload">
                        <label for="setting_web_logo">Upload File</label>
                        <input type="text" class="input-text" />
                        <input type="file" class="input-file" name="setting_web_logo" id="setting_web_logo" accept="jpg|jpeg|gif|png" size="36" />
                        <input type="button" class="input-button" value="Browse" />
                        <span class="help">Logo Website. Recommended Resolution: <?php echo $this->logo_width, 'px * ', $this->logo_height, 'px'; ?></span>
                    </p>
                </div>
                
                <div class="form-div">
                    <h3>Google Information</h3>
                    <p>
                        <label for="setting_google_analytics">Analytics Account</label>
                        <input type="text" class="input-text" name="setting_google_analytics" id="setting_google_analytics" maxlength="100" value="<?php echo $row[0]['setting_google_analytics']; ?>" />
                        <span class="help">Masukkan kode Google Analytics (contoh: <strong>UA-12345678-9</strong>)
                    </p>
                    <p>
                        <label for="setting_google_map">latitude Maps</label>
                        <input type="text" class="input-text" name="setting_latitude" id="setting_latitude" maxlength="100" value="<?php echo $row[0]['setting_latitude']; ?>" />
                        <span class="help">Koordinat Google Maps (contoh: <strong>-6.13773</strong>)</span>
                    </p>
                     <p>
                        <label for="setting_google_map">longitude Maps</label>
                        <input type="text" class="input-text" name="setting_longitude" id="setting_longitude" maxlength="100" value="<?php echo $row[0]['setting_longitude']; ?>" />
                        <span class="help">Koordinat Google Maps (contoh: <strong>106.80690</strong>)</span>
                    </p>
                    <p>
                        <label for="setting_recaptcha_site">Recaptha Site Key</label>
                        <input type="text" class="input-text" name="setting_recaptcha_site" id="setting_recaptcha_site" maxlength="100" value="<?php echo $row[0]['setting_recaptcha_site']; ?>" />
                    </p>
                    <p>
                        <label for="setting_recaptcha_secret">Recaptha Secret Key</label>
                        <input type="text" class="input-text" name="setting_recaptcha_secret" id="setting_recaptcha_secret" maxlength="100" value="<?php echo $row[0]['setting_recaptcha_secret'];?>" />
                    </p>
                </div>
                
            </div>
            <div id="form-right">
                <div class="form-div">
                    <h3>Company Information</h3>
                    <p>
                        <label for="setting_name">Name</label>
                        <input type="text" class="input-text required" name="setting_name" id="setting_name" maxlength="100" value="<?php echo $row[0]['setting_name']; ?>" />
                    </p>  
                    <p>
                        <label for="setting_web_motto">Motto</label>
                        <input type="text" class="input-text required" name="setting_web_motto" id="setting_web_motto" maxlength="100" value="<?php echo $row[0]['setting_web_motto']; ?>" />
                    </p> 
                    <p>
                        <label for="setting_address">Address</label>
                        <textarea class="input-text required" name="setting_address" id="setting_address"><?php echo $row[0]['setting_address']; ?></textarea>
                    </p> 
                    <p>
                        <label for="setting_country">Country</label>
                        <input type="text" class="input-text" name="setting_country" id="setting_country" maxlength="50" value="<?php echo $row[0]['setting_country']; ?>" />
                    </p>
                    <p>
                        <label for="setting_city">City</label>
                        <input type="text" class="input-text" name="setting_city" id="setting_city" maxlength="50" value="<?php echo $row[0]['setting_city']; ?>" />
                    </p> 
                    <p>
                        <label for="setting_postcode">Postal Code</label>
                        <input type="text" class="input-text digits" name="setting_postcode" id="setting_postcode" maxlength="10" value="<?php echo $row[0]['setting_postcode']; ?>" />
                        <span class="help">Hanya boleh diisi dengan angka</span>
                    </p>
                </div>
                
                <div class="form-div">
                    <h3>Contact Information</h3>
                    <p>
                        <label for="setting_phone">Phone</label>
                        <input type="text" class="input-text" name="setting_phone" id="setting_phone" maxlength="100" value="<?php echo $row[0]['setting_phone']; ?>" />
                    </p>
                   <!--  <p>
                        <label for="setting_mobile">Mobile</label>
                        <input type="text" class="input-text" name="setting_mobile" id="setting_mobile" maxlength="100" value="<?php echo $row[0]['setting_mobile']; ?>" />
                    </p>
                    <p>
                        <label for="setting_bb_pin">BB Pin</label>
                        <input type="text" class="input-text" name="setting_bb_pin" id="setting_bb_pin" maxlength="15" value="<?php echo $row[0]['setting_bb_pin']; ?>" />
                    </p> -->
                    <p>
                        <label for="setting_fax">Fax</label>
                        <input type="text" class="input-text" name="setting_fax" id="setting_fax" maxlength="100" value="<?php echo $row[0]['setting_fax']; ?>" />
                    </p>
                    <p>
                        <label for="setting_email">E-mail</label>
                        <input type="text" class="input-text" name="setting_email" id="setting_email" maxlength="100" value="<?php echo $row[0]['setting_email']; ?>" />
                        <span class="help">Isi dengan format yang benar: (contoh: user@domain.com)</span>
                    </p>
                    <p>
                        <label for="setting_career_email">Career E-mail</label>
                        <input type="text" class="input-text" name="setting_career_email" id="setting_career_email" maxlength="100" value="<?php echo $row[0]['setting_career_email']; ?>" />
                        <span class="help">Penerima email notifikasi karir</span>
                    </p>
                    <!-- <p>
                        <label for="setting_ym">YM</label>
                        <input type="text" class="input-text" name="setting_ym" id="setting_ym" maxlength="100" value="<?php echo $row[0]['setting_ym']; ?>" />
                        <span class="help">Masukkan YM ID saja</span>
                    </p>
                    <p>
                        <label for="setting_msn">MSN</label>
                        <input type="text" class="input-text" name="setting_msn" id="setting_msn" maxlength="100" value="<?php echo $row[0]['setting_msn']; ?>" />
                        <span class="help">Masukkan alamat MSN</span>
                    </p>
                    <p>
                        <label for="setting_facebook">Facebook</label>
                        <input type="text" class="input-text" name="setting_facebook" id="setting_facebook" maxlength="150" value="<?php echo $row[0]['setting_facebook']; ?>" />
                        <span class="help">Link ke Facebook Page (jika facebook page adalah www.facebook.com/gositus, masukkan <strong>gositus</strong> saja)</span>
                    </p> -->
                    <!-- <p>
                        <label for="setting_twitter">Twitter</label>
                        <input type="text" class="input-text" name="setting_twitter" id="setting_twitter" maxlength="50" value="<?php echo $row[0]['setting_twitter']; ?>" />
						<span class="help">Masukkan username Twitter</span>
                    </p> -->
                    <p>
                        <label for="setting_website">Website</label>
                        <input type="text" class="input-text" name="setting_website" id="setting_website" maxlength="50" value="<?php echo $row[0]['setting_website']; ?>" />
                        <span class="help">Masukkan username Website</span>
                    </p>
                   <!--  <p>
                        <label for="setting_instagram">Instagram</label>
                        <input type="text" class="input-text" name="setting_instagram" id="setting_instagram" maxlength="50" value="<?php echo $row[0]['setting_instagram']; ?>" />
                        <span class="help">Masukkan username Instagram</span>
                    </p>
                    <p>
                        <label for="setting_linkedin">Linkedin</label>
                        <input type="text" class="input-text" name="setting_linkedin" id="setting_linkedin" maxlength="50" value="<?php echo $row[0]['setting_linkedin']; ?>" />
                        <span class="help">Masukkan username Linkedin</span>
                    </p>
                    <p>
                        <label for="setting_youtube">Youtube</label>
                        <input type="text" class="input-text" name="setting_youtube" id="setting_youtube" maxlength="50" value="<?php echo $row[0]['setting_youtube']; ?>" />
                        <span class="help">Masukkan username Youtube</span>
                    </p> -->
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
    </form>
</div>