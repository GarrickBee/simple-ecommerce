<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<?php $this->load->view('shared/default/head'); ?>

<body class="body" data-baseUrl="<?php echo base_url() ?>">

	<?php $this->load->view('shared/default/nav'); ?>

	<main style="margin-top:100px">
		<?php echo !empty($content) ? $content : ''; ?>

		<!-- Login Modal -->
		<?php $this->load->view('shared/modal/login') ?>
		<!-- Signup Modal -->
		<?php $this->load->view('shared/modal/signup') ?>
	</main>

	<?php $this->load->view('shared/default/script'); ?>
</body>

</html>