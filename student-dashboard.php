<?php
    session_start();        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container{
            display: flex;
            flex-direction: column;            
            border: 1px solid black;
            padding: 1rem;
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <h1>Student Dashboard</h1>
    <div class="links">						
        <a href="./login.php">Log out</a>
    </div>
    <br>
<?php 
    if(isset($_SESSION['user_id'])){
        $conn = mysqli_connect("localhost", "root", "", "book_management");
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($conn, "SELECT * FROM assignments WHERE user_id = '$user_id'");        

        if($row = mysqli_fetch_assoc($result)){
            $book_result = mysqli_query($conn, "SELECT * FROM books WHERE book_id = {$row['book_id']}");
            while($book_row = mysqli_fetch_assoc($book_result)){
                echo "
                    <div class='container'>
                        <p>Assignment ID: {$row['assignment_id']}</p>
                        <p>Book Title: {$book_row['title']}</p>                        
                        <p>Book Description: {$book_row['description']}</p>
                    </div>
                ";
            }                        
        } else {
            echo "You don't have any books assigned";
        }
    }
?>

</body>
</html>