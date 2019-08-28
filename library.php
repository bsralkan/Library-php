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
    switch(@ $_GET['is']){
        case 'view':
            view();
            break;
        case 'insert':
            insert();
            break;    
        case 'register':
            register();
            break;
        case 'check':
            check();
            break;
        case 'history':
            history();
            break;
        case 'status':
            status();
            break;
        default: homePage();
    }
    exit;    

    function homePage(){
        
        echo'
            <h2 class=display-2> HOMEPAGE </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=?is=view>View Books</a></li>
                        <li class="breadcrumb-item"><a href=?is=insert>Insert Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=register>Register Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=check>Checkout Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=history>History of the Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=status>Status of the Book</a></li>
                    </ol>
                </nav>
        ';
    }

    function view(){
        echo "
        <h2 class=display-3><a href=? is=homePage>HOMEPAGE</a></h2>
            <nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href=?is=view>View Books</a></li>
                    <li class='breadcrumb-item'><a href=?is=insert>Insert Book</a></li>
                    <li class='breadcrumb-item'><a href=?is=register>Register Book</a></li>
                    <li class='breadcrumb-item'><a href=?is=check>Checkout Book</a></li>
                    <li class='breadcrumb-item'><a href=?is=history>History of the Book</a></li>
                    <li class='breadcrumb-item'><a href=?is=status>Status of the Book</a></li>
                </ol>
            </nav>
        <h2>Books</h2> 
        <table class='table table-dark'> <thead><tr> <th>ID</th> <th>ISBN</th> <th>Book Name</th> <th>Author</th> <th>Register</th> <th>Last Checked Date</th>
        <th>Last Checked Person</th> </tr></thead><tbody>";
        $connection=mysqli_connect('localhost', 'root', '', 'library');
        $kayitKumesi = mysqli_query($connection, "SELECT * FROM books");
        while($satir = mysqli_fetch_array($kayitKumesi)){
            print "<tr> 
                <td>{$satir[0]}</td> 
                <td>{$satir[1]}</td> 
                <td>{$satir[2]}</td> 
                <td>{$satir[3]}</td> 
                <td>{$satir[4]}</td>
                <td>{$satir[5]}</td>
                <td>{$satir[6]}</td>
                </tr>";
        }
        print "</tbody></table>";
    }
    function insert(){
        echo'
        <h2 class=display-3><a href=? is=homePage>HOMEPAGE</a></h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=?is=view>View Books</a></li>
                    <li class="breadcrumb-item"><a href=?is=insert>Insert Book</a></li>
                    <li class="breadcrumb-item"><a href=?is=register>Register Book</a></li>
                    <li class="breadcrumb-item"><a href=?is=check>Checkout Book</a></li>
                    <li class="breadcrumb-item"><a href=?is=history>History of the Book</a></li>
                    <li class="breadcrumb-item"><a href=?is=status>Status of the Book</a></li>
                </ol>
            </nav>
        <div class="container">
            <div class="col-md-6">
                <form action="ins.php" method="get">
                    <label for="">ID</label>
                    <input class="form-control" type="text" name = "ID" >
                    <label for="">ISBN</label>
                    <input class="form-control" type="text" name = "ISBN">  
                    <label for="">Book Name</label>
                    <input class="form-control" type="text" name = "Book_Name">
                    <label for="">Author</label>
                    <input class="form-control" type="text" name = "Author">  
                    <label for="">register</label>
                    <select class="form-control" type="text" name = "register">
                        <option name="returned">Returned</option>
                        <option name="not_returned">Not Returned</option>
                        <option name="missing">Missing</option>
                    </select><br> 
                    <button class="form-control btn btn-primary" name="submit" type="submit">Add</button>  
                </form>
            </div>
        </div>
        ';
        }
        function register(){
            echo'
            <h2 class=display-3><a href=? is=homePage>HOMEPAGE</a></h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=?is=view>View Books</a></li>
                        <li class="breadcrumb-item"><a href=?is=insert>Insert Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=register>Register Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=check>Checkout Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=history>History of the Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=status>Status of the Book</a></li>
                    </ol>
                </nav>
            <div class="container">
                <div class="col-md-6">
                    <form action="register.php" method="get">
                        <label for="">ID</label>
                        <input class="form-control" type="text" name = "ID">
                        <label for="">Book Name</label>
                        <input class="form-control" type="text" name = "bookname">
                        <label for="">Your Name</label>
                        <input class="form-control" type="text" name = "name">
                        <label for="">Date</label>
                        <input class="form-control" type="date" name = "date"><br>
                        <button class="form-control btn btn-primary" type="submit">Register</button>   
                    </form>
                </div>
            </div>
            ';
        }
        function check(){
            echo'
            <h2 class=display-3><a href=? is=homePage>HOMEPAGE</a></h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=?is=view>View Books</a></li>
                        <li class="breadcrumb-item"><a href=?is=insert>Insert Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=register>Register Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=check>Checkout Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=history>History of the Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=status>Status of the Book</a></li>
                    </ol>
                </nav>
                <div class="container">
                    <div class="col-md-6">
                        <form action="check.php" class="was-validated" method="get">
                            <div class="mb-3">
                                <label for="bookid">Book ID</label>
                                <textarea class="form-control is-invalid" name="bookid"  required></textarea>
                                <div class="invalid-feedback">
                                Please enter Book ID!
                            </div><br>
                            <div class="mb-3">
                                <label for="name">Your Name</label>
                                <textarea class="form-control is-invalid" id="name" placeholder="Required example textarea" required></textarea>
                                <div class="invalid-feedback">
                                Please enter name!
                            </div><br>  
                            <div class="mb-3">
                                <label for="citizen">Citizen ID</label>
                                <textarea class="form-control is-invalid" id="citizen"  required></textarea>
                                <div class="invalid-feedback">
                                Please enter citizen ID!
                            </div><br>
                            <button class="form-control btn btn-primary" type="submit">Check</button>
                        </form>
                    </div>
                </div>

            ';
        }
        function history(){
            echo'
                <h2 class=display-3><a href=? is=homePage>HOMEPAGE</a></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=?is=view>View Books</a></li>
                        <li class="breadcrumb-item"><a href=?is=insert>Insert Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=register>Register Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=check>Checkout Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=history>History of the Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=status>Status of the Book</a></li>
                        </ol>
                    </nav>
                <div class="container">
                    <div class="col-md-6">
                        <form action="history.php" class="was-validated">
                            <label for="">Enter Book ID</label>
                            <input class="form-control" type="text" name = "ID"><br>
                            <button class="form-control btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            ';
        }
    function status(){
        echo'
            <h2 class=display-3><a href=? is=homePage>HOMEPAGE</a></h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=?is=view>View Books</a></li>
                        <li class="breadcrumb-item"><a href=?is=insert>Insert Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=register>Register Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=check>Checkout Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=history>History of the Book</a></li>
                        <li class="breadcrumb-item"><a href=?is=status>Status of the Book</a></li>
                    </ol>
                </nav>
                <div class="container">
                    <div class="col-md-6">
                        <form action="status.php" class="was-validated">
                            <label for="">Enter Book ID</label>
                            <input class="form-control" type="text" name = "ID"><br>
                            <button class="form-control btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            ';
    }

?>    
</body>
</html>