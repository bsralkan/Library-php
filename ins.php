<?php
    $ID=$_GET['ID'];
    $ISBN=$_GET['ISBN'];
    $name=$_GET['Book_Name']; 
    $author=$_GET['Author'];
    
    if(isset($_GET['submit'])){
        $rg = $_GET['register'];        
        }
    $sql = "INSERT INTO books VALUES('$ID', '$ISBN', '$name', '$author', '$rg', '', '')";
        //echo "<br/>SQL: $sql<br/>";
        $connection = mysqli_connect('localhost', 'root', '', 'library');
        if(! $connection)
            exit(mysqli_error($connection));
        $sonuc = mysqli_query($connection, $sql);
        if(! $sonuc)
            exit(mysqli_error($connection));
        else {
            echo "<center><b>Success!</b></center>";           	
            header('Location: library.php');
            header('HTTP/1.1 200 OK');
        }
        


?>