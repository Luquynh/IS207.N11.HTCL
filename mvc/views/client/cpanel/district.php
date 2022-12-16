<?php
    include ("connect.php");
    $key = $_POST['id_city'];
    $sql = "SELECT * FROM devvn_quanhuyen WHERE matp = '$key'";
    $query = $connect->query($sql);
    $num = mysqli_num_rows($query);
    if ($num > 0){
        while($row = mysqli_fetch_array($query)){
            
    ?>
        <option value="<?php echo $row['maqh']; ?>"><?php echo $row['name']; ?></option>;
    <?php 
        }
    }
    ?>
