<?php
    require ("connect.php");
    $key1 = $_POST['id_d'];
    $sql1 = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = '$key1'";
    $query1 = $connect->query($sql1);
    $num1 = mysqli_num_rows($query1);
    if ($num1 > 0){
        while($row1 = mysqli_fetch_array($query1)){
            
    ?>
        <option value="<?php echo $row1['xaid']; ?>"><?php echo $row1['name']; ?></option>;
    <?php 
        }
    }
    ?>
