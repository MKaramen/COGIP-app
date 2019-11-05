<?php ob_start(); ?>
<section class="content__table">
    <h3 class="content__table-title">Last users</h3>
    <div class="content__table-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-sm">
                <?php $first_part = ob_get_clean(); ?>

                <?php ob_start(); ?>
            </table>
        </div>
    </div>
</section>
<?php $second_part = ob_get_clean(); ?>













<?php /*function makeTable($categoryName, $dataModel)
{
    echo "<thead>";
    foreach ($dataModel[$categoryName]['col'] as $colName) {
        echo "<th>" . $colName . "</th>";
    }
    echo "</thead>";

    echo "<tbody>";
    // Helper::dump($dataModel);
    foreach ($dataModel[$categoryName]['row'] as $user) {
        echo "<tr>";
        foreach ($user as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
} */ ?>