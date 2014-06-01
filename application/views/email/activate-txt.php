Selamat datang di portal <?php echo $site_name; ?>!

Terima kasih sudah mendaftar di <?php echo $site_name; ?>.
Untuk langkah verifikasi akun, silakan klik tautan di bawah ini :

<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>

Mohon untuk segera verifikasi akun anda dalam jangka waktu <?php echo $activation_period; ?> jam, 
jika tidak, akun anda menjadi tidak valid dan anda harus mendaftar kembali.

Gunakan e-mail di bawah ini untuk login di portal :
<?php if (strlen($username) > 0) { ?>User anda: <?php echo $username; ?>
<?php } ?>

Email anda: <?php echo $email; ?>
<?php if (isset($password)) { /* ?>Your password: <?php echo $password; ?><br /><?php */ } ?>


Terima kasih.
Tim <?php echo $site_name; ?>
