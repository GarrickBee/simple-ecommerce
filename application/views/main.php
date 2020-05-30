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
	<main style="margin-top:100px">
		<?php
		echo !empty($content) ? $content : '';
		?>
	</main>
	<?php
	$this->load->view('shared/script');
	?>
</body>

</html>