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
    $bookname=$_GET['bookname'];
    $name =$_GET['name'];
    $date =$_GET['date'];


    $sql = "SELECT * FROM `books` WHERE ID=$ID";
        //echo "<br/>SQL: $sql<br/>";
        $connection = mysqli_connect('localhost', 'root', '', 'library');
        if(! $connection)
            exit(mysqli_error($connection));
        $sonuc = mysqli_query($connection, $sql);
        if(! $sonuc)
            exit(mysqli_error($connection));
        echo "
            
            <h2>Books</h2> 
            <table class='table table-dark'> <thead><tr> <th>ID</th> <th>ISBN</th> <th>Book Name</th> <th>Author</th> <th>Register</th> <th>Last Checked Date</th>
            <th>Last Checked Person</th> </tr></thead><tbody>";
            $connection=mysqli_connect('localhost', 'root', '', 'library');
            $kayitKumesi = mysqli_query($connection, $sql);
            $satir = mysqli_fetch_array($kayitKumesi);
                print "<tr> 
                    <td>{$satir[0]}</td> 
                    <td>{$satir[1]}</td> 
                    <td>{$satir[2]}</td> 
                    <td>{$satir[3]}</td> 
                    <td>{$satir[4]}</td>
                    <td>{$satir[5]}</td>
                    <td>{$satir[6]}</td>
                    </tr>
                    
                    ";
        
        print "</tbody></table>";
        
        if($satir[4]=='Returned'){
            $kayitKumesi1= mysqli_query($connection, "UPDATE books SET Register='Not Returned', LastCheckedDate='$date', LastCheckedPerson='$name' WHERE ID=$ID");
            //$kayitKumesi2= mysqli_query($connection, "UPDATE books SET LastCheckedDate='$date' WHERE ID=$ID");
            //$kayitKumesi3= mysqli_query($connection, "UPDATE books SET LastCheckedPerson='$name' WHERE ID=$ID");
            $kayitKumesi4= mysqli_query($connection, "INSERT INTO bookdetails VALUES ('$ID', '$bookname', '$date', '$name')");
                echo'
                <form action="library.php">
                <div class="alert alert-success" role="alert">
                    Registered success!
                </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Continue Home Page</button>
                </form>';
        }else{
            echo 'This book could not register because it have been already registered ';
            
        }
        

   
?>
</body>
</html>