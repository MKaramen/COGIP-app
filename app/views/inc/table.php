<div class="content__table-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
                <tr>
                    <?php foreach ($dataTable['cols'] as $col) echo '<th scope="col">' . $col . '</th>'?>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($dataTable['rows'] as $row) 
                {
                    echo '<tr>';
                    foreach ($row as $col => $value) echo '<td>' . $value . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody> 
        </table>
    </div>
</div>