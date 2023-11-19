<?php

    include 'config/db.php';
    $id = $_GET['idbarang'];
    $ambilData = mysqli_query($db_connect, "DELETE FROM products WHERE id='$id' ");
    echo "<meta http-equiv= 'refresh' content='1;url=http://localhost/Pemweb_UTS/web-programming-course/show.php'>";

?>