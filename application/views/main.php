<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">


<?php
$this->load->view('shared/head');
?>

<body class="body">

	<?php
	$this->load->view('shared/nav');
	?>
	<?php
	echo !empty($content) ? $content : '';
	?>

	<?php
	$this->load->view('shared/script');
	?>
</body>

</html>