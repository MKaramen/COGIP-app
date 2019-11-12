<?php ob_start(); ?>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped table-sm">
        <?php $first_part = ob_get_clean(); ?>

        <?php ob_start(); ?>
    </table>
</div>

<?php $second_part = ob_get_clean(); ?>