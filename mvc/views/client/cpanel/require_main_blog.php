<?php 
    require_once "./mvc/views/client/include/head.php";
    
?>
<style>
    #footer {
        margin-top: 0px !important;
        padding-top: 30px;
    }
    .bg-light {
        padding-top: 100px;
    }
    .card img {
        height: 280px;
    }
    <?php 
    include "public/client/assets/css/bootstrap.min.css";?>
</style>
<body>
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>    
    <?php
        require_once "./mvc/views/client/include/front_main_blog.php";
    ?>
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?> 
</body>
