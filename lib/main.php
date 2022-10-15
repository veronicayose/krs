<?php
function start_page()
{
    $menu = file_get_contents('layouts/menu.php');
    $navbar = file_get_contents('layouts/navbar.php');
    echo "
        <div class=\"layout-wrapper layout-content-navbar\">
            <div class=\"layout-container\">
            $menu

            <!-- Layout container -->
            <div class=\"layout-page\">
                <!-- Navbar -->
                $navbar
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class=\"content-wrapper\">
                    <div class=\"container-xxl flex-grow-1 container-p-y\">
    ";
}

function end_page()
{
    echo "
                    </div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class=\"layout-overlay layout-menu-toggle\"></div>
        </div>
    ";
}
?>
