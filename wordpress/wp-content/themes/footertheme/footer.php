<footer class="bg-success text-white pt-5 pb-3">
    <div class="container">
        <div class="row">

            <!-- Cột 1 -->
            <div class="col-md-4">
                <h5 class="mb-3">Quick Links</h5>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer1',
                    'container' => false,
                    'menu_class' => 'list-unstyled',
                    'fallback_cb' => false
                ));
                ?>
            </div>

            <!-- Cột 2 -->
            <div class="col-md-4">
                <h5 class="mb-3">Quick Links</h5>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer2',
                    'container' => false,
                    'menu_class' => 'list-unstyled',
                    'fallback_cb' => false
                ));
                ?>
            </div>

            <!-- Cột 3 -->
            <div class="col-md-4">
                <h5 class="mb-3">Quick Links</h5>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer3',
                    'container' => false,
                    'menu_class' => 'list-unstyled',
                    'fallback_cb' => false
                ));
                ?>
            </div>

        </div>

        <!-- Social icons -->
        <div class="text-center mt-4">
            <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="text-white"><i class="fas fa-envelope"></i></a>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-3">
            <p class="mb-0">© <?php echo date('Y'); ?> All rights reserved. Your Company.</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
