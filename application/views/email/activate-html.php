<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Selamat datang di portal <?php echo $site_name; ?>!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Selamat datang di portal <?php echo $site_name; ?>!</h2>
Terima kasih sudah mendaftar di <?php echo $site_name; ?>.<br />
Untuk langkah verifikasi akun, silakan klik tautan di bawah ini :<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;">Verifikasi akun...</a></b></big><br />
<br />
Jika tautan di atas tidak bisa digunakan, salin alamat dibawah ini dan tempel di peramban web anda:<br />
<nobr><a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?></a></nobr><br />
<br />
Mohon untuk segera verifikasi akun anda dalam jangka waktu <?php echo $activation_period; ?> jam, jika tidak, akun anda menjadi tidak valid dan anda harus mendaftar kembali.<br />
<br />
<br />
Gunakan e-mail di bawah ini untuk login di portal :<br>
<?php if (strlen($username) > 0) { ?>User anda: <?php echo $username; ?><br /><?php } ?>
Email anda: <?php echo $email; ?><br />
<?php if (isset($password)) { /* ?>Your password: <?php echo $password; ?><br /><?php */ } ?>
<br />
<br />
Terima kasih. <br />
Tim <?php echo $site_name; ?>
</td>
</tr>
</table>
</div>
</body>
</html>