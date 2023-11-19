<?php

    include 'config/db.php';
    $id = $_GET['idbarang'];
    $ambilData = mysqli_query($db_connect, "SELECT * FROM products WHERE id='$id' ");
    $data = mysqli_fetch_array($ambilData)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <a href="show.php">Lihat Data Produk</a>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $data['name']?>" placeholder="input nama produk">
        <input type="number" name="price" value="<?php echo $data['price']?>" placeholder="input harga produk">
        <input type="file" name="image" value="<?php echo $data['image']?>">
        <input type="submit" value="simpan" name="submit">
    </form>
</body>
</html>


<?php
    if(isset($_POST['submit'])) {
        global $db_connect;

        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        $randomFilename = time().'-'.md5(rand()).'-'.$image;

        $updatePath = $_SERVER['DOCUMENT_ROOT'].'/update/'.$randomFilename;

        $update = move_uploaded_file($tempImage,$updatePath);

        // if($update) {
        mysqli_query($db_connect,"UPDATE products 
        SET name='$name', price='$price', image='$image'
        WHERE id='$id'");
        
        echo "<div align='center'><h5> Silahkan Tunggu Data Sedang Di Update..... <h5></div>";
        echo "<meta http-equiv= 'refresh' content='1;url=http://localhost/Pemweb_UTS/web-programming-course/show.php'>";
        // } 
    

    }