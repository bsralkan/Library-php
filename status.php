<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<?php
    $ID=$_GET['ID'];
    
        $sql = "SELECT * FROM `books` WHERE ID=$ID";
    
        //echo "<br/>SQL: $sql<br/>";
        $connection = mysqli_connect('localhost', 'root', '', 'library');
        if(! $connection)
            exit(mysqli_error($connection));
        $sonuc = mysqli_query($connection, $sql);
        if(! $sonuc)
            exit(mysqli_error($connection));
    
            echo "
            <form action='library.php'>
                <button type='submit' class='btn btn-secondary btn-lg btn-block'>Continue Home Page</button>
            </form>'; 
            ";
            $connection=mysqli_connect('localhost', 'root', '', 'library');
            $kayitKumesi = mysqli_query($connection, $sql);
            $satir = mysqli_fetch_array($kayitKumesi);
            if($satir[4]==''){
                @print"
                    <div class='alert alert-warning' role='alert'>
                        This book cannot found!
                    </div>
                ";
            }else{
                @print"
                    <div class='alert alert-warning' role='alert'>
                        This book is '{$satir[4]}'!
                    </div>
                ";
            }
            
                
    
        print "</tbody></table>";
        

   
?>
</body>
</html>