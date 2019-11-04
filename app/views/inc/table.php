<section class="content__table">
    <h3 class="content__table-title">Last users</h3>
    <div class="content__table-body">
        <?php
        function makeTable($data)
        {
            echo "<table>";
                echo "<tr>";
                foreach ($data as $value) {
                    echo "<td class='table_value'>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } ?>
    </div>
</section>