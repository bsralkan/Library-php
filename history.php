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
    
        $sql = "SELECT * FROM `bookDetails` WHERE ID=$ID";
    
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
            <h2>Book History</h2> 
            <table class='table table-dark'> <thead><tr> <th>ID</th> <th>Book Name</th> <th>All Checked Date</th> <th>Person Name</th> </tr></thead><tbody>";
            $connection=mysqli_connect('localhost', 'root', '', 'library');
            $kayitKumesi = mysqli_query($connection, $sql);
            while($satir = mysqli_fetch_array($kayitKumesi)){
                print "<tr> 
                    <td>{$satir[0]}</td> 
                    <td>{$satir[1]}</td>
                    <td>{$satir[2]}</td>
                    <td>{$satir[3]}</td>
                    </tr>";
            
        }
        print "</tbody></table>";
        

   
?>
</body>
</html>