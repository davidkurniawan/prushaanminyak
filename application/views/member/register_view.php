<script type="text/javascript">
$(document).ready(function(){
	$('form#register').validate();
});
</script>
<form id="register" method="post" action="<?=base_url()?>member/register">
	<p>
    	<label for="email">Email</label>
        <input type="text" class="input-text required email" name="email" id="email" />
    </p>
    <p>
    	<label for="password">Password</label>
        <input type="password" class="input-text required" name="password" id="password" />
    </p>
    <p class="submit">
    	<input type="submit" value="Register" />
    </p>
</form>