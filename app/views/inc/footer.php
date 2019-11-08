    <!-- footer -->
    <footer id="footer">
        <div class="footer__copy py-2">
            &copy; 2018-<?= date('Y') . ' ' . getenv('APP_NAME') ?> &ndash; All rights reserved.
        </div>
    </footer>
    <!-- footer-end -->

    <!-- javascript -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?= getenv('APP_URL') ?>/public/assets/js/app.js" async></script>

    </body>