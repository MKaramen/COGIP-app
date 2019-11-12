<main class="error-500">
    <h1>An error occurred</h1>
    <p>Sorry, an error has occurred.</p>
    <div class="error-500__app">
        <p>Error app:</p> 
        <ul class="list-unstyled mt-0">
            <?php 
                if (isset($errors)) 
                {
                    foreach($errors as $error) echo '<li>' . $error . '</li>'; 
                }
            ?>
        </ul>
    </div>
</main>