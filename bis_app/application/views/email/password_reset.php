<h2>BIS Password Reset System</h2>
<p></p>
<p>You are receiving this email because we have received a request to reset your password at this email address: <?php echo $email_address; ?>.</p>
<p>If you haven't requested a password change, you can safely ignore this email.</p>
<p>This password reset request will expire after 24 hours.</p>
<p></p>
<p>To reset your password, please follow this link:</p>
<p>
	<a href='<?php echo "http://localhost/bis_app/login/password_reset/".$hash."/".$email_address; ?>' target='_blank' title='Password reset link'>".<?php echo "http://localhost/bis_app/login/password_reset/".$hash."/"; ?></a>
</p>
<p>If your email client has cut off the link, you may also enter the code in manually:</p>
<p>Visit: http://localhost/bis_app/login/password_reset</p>
<p>Reset code: <?php echo $hash; ?></p>
<p></p>
<p>Yours sincerely,</p>
<p></p>
<p>BIS</p>