<?php
require_once "views/shared/link.php";
?>
<link rel="stylesheet" href="libraries/css/sidenav.css">

<footer class="footer text-center navbar-fixed-bottom">
    <strong>Copyright &copy; <a href="#">NISCHAL & ROMAN</a>.</strong>
</footer>

<script type="text/javascript">
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
});
</script>
