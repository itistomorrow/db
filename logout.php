<?php
include "includes/session.php";

session_destroy();
?>
<script language="javascript">
	window.location.replace("index.php");
</script>