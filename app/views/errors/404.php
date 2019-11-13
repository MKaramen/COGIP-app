<main class="error-404">
    <h1>Error 404: Page not found </h1>
    <p>Sorry, that page doesn't exist.</p>
    <div class="error-404__app">
        <p>Error app:</p> 
        <ul class="list-unstyled mt-0">
            <?php if (isset($errors)) {foreach($errors as $error) echo '<li>' . $error . '</li>';}?>
        </ul>
    </div>
</main>