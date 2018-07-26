<?php $first = (isset($first)) ? $first : 0; ?>
        <div class="form-div" id="status">
        	<h3>Status</h3>
            <div id="flag">
                <div class="option">
                    <input id="flag-1" type="radio" value="1" <?php if ($row[$first]['flag'] == 1) echo 'checked="checked"'; ?> name="flag" />
                    <label for="flag-1"><span style="background:#090"></span>Active</label>
                    <div class="clear"></div>
                </div>
                <div class="option">
                    <input id="flag-2" type="radio" value="2" <?php if ($row[$first]['flag'] == 2) echo 'checked="checked"'; ?> name="flag" />
                    <label for="flag-2"><span style="background:#F00;"></span>Inactive</label>
                    <div class="clear"></div>
                </div>
                <?php if (check_access($this->url, 'delete')) : ?>
                <div class="option">
                    <input id="flag-3" type="radio" value="3" <?php if ($row[$first]['flag'] == 3) echo 'checked="checked"'; ?> name="flag" />
                    <label for="flag-3"><span style="background:#000;"></span>Delete</label>
                    <div class="clear"></div>
                </div>
                <?php endif; ?>
                </div>
                
            <div id="flagmemo">
            	<p>
                	<label for="flag_memo">Memo</label>
                    <textarea class="input-text" id="flag_memo" name="flag_memo"><?php echo $row[$first]['flag_memo']; ?></textarea>
                </p>
            </div>
            <div class="clear"></div>
        </div>