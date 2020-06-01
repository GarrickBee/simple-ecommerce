<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container">

    <!-- Brand Name-->
    <a class="navbar-brand waves-effect" href="<?php echo base_url() ?>">
      <strong class="blue-text">Boost Shop</strong>
    </a>

    <!-- Collapse Toggler-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Items -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a class="nav-link waves-effect" href="#" onclick="toggleMember()">
            <?php echo !empty($_COOKIE['loginToken']) ? "Dashboard" : "Login before order"; ?>
          </a>
        </li>
        <?php
        if (!empty($_COOKIE['loginToken'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="<?php echo base_url("member/logout") ?> ">
              Log Out
            </a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>

  </div>
</nav>