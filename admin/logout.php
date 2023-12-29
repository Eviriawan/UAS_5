<?php

session_destroy();

// Tampilkan pesan kesalahan
echo "<div class='alert alert-danger'>Log Out Berhasil</div>";

echo "<meta http-equiv='refresh' content='1;url=login.php'>";
exit();
