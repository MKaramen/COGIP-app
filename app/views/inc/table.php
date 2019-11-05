<?php ob_start(); ?>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped table-sm">
        <?php $first_part = ob_get_clean(); ?>

        <?php ob_start(); ?>
    </table>
</div>

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