<<<<<<< HEAD
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
=======
Welcome to <?php echo $site_name; ?>,

Thanks for joining <?php echo $site_name; ?>. We listed your sign in details below, make sure you keep them safe.
To verify your email address, please follow this link:

<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>


Please verify your email within <?php echo $activation_period; ?> hours, otherwise your registration will become invalid and you will have to register again.
<?php if (strlen($username) > 0) { ?>

Your username: <?php echo $username; ?>
<?php } ?>

Your email address: <?php echo $email; ?>
<?php if (isset($password)) { /* ?>

Your password: <?php echo $password; ?>
<?php */ } ?>



Have fun!
The <?php echo $site_name; ?> Team
>>>>>>> 4bbeca48094b277d496aba35fa0fb942585b03e0
