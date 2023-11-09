<?php
session_start();
session_destroy();
echo '<script type="text/javascript">
		alert("Obrigado e até logo!");
			window.location.href = "index.php";								
		</script>';
?>