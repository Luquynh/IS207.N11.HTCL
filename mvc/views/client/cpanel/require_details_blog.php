<?php 
    require_once "./mvc/views/client/include/head.php";
?>
<style>
    #footer {
        margin-top: 0px !important;
        padding-top: 30px;
    }
    .details_blog {
        text-align: center;
        margin-top: 150px;
        letter-spacing: .02em;
    }
    .details_blog .tieude_blog {
        /* font-family: cursive; */
        font-weight: 600;
        text-transform: capitalize;
    }
    .details_blog .img_blog {
        margin: 30px 50px 0;
        max-width: 80%;
        box-sizing: border-box;
    }
    .details_blog .noidung_blog {
        /* font-family: cursive; */
        font-size: 16px;
        font-weight: 600;
        margin: 50px;
        text-align: justify;
    }
</style>
<body>
    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>    
    <?php
        require_once "./mvc/views/client/include/front_details_blog.php";
    ?>
    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?> 
</body>