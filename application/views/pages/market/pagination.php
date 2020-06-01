<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<nav class="d-flex justify-content-center wow fadeIn">
    <ul class="pagination pg-blue">
        <li class="page-item <?php echo $previousPage ? '' : 'disabled'; ?>">
            <a class="page-link" href="<?php echo current_url() . '?page=' . ($currentPage - 1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            $pageActive = '';
            if ($currentPage == $i) {
                $pageActive = 'active';
            }
        ?>
            <li class="page-item <?php echo $pageActive ?>">
                <a class="page-link" href="<?php echo current_url() . '?page=' . $i; ?> "><?php echo $i ?> </a>
            </li>
        <?php
        }
        ?>
        <li class="page-item <?php echo $nextPage ? '' : 'disabled'; ?>">
            <a class="page-link" href="<?php echo current_url() . '?page=' . ($currentPage + 1); ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>