<?php
require_once '../init.php';
$ps = $db->prepare("UPDATE users SET verification_key = null WHERE verification_key = ?");
$ps->execute(array($_GET['key']));

?>
<script>
    alert("Verification successful.");
    location = "index.php";
</script>
