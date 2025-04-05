<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
        a{
            display: block;
            margin-bottom: 1rem;
            text-align: center;
        }
        .books-container{
            display: flex;            
            gap: 1rem;
            justify-content: center;
        }
        .book{
            border: 1px solid black;
            padding: 1rem;
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <h1>Books Cabinet</h1>
    <a href="./teacher-dashboard.php">Dashboard</a>
    <div class="books-container">
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "book_management");    

            $result = mysqli_query($conn, "SELECT * FROM books");
            
            while($row = mysqli_fetch_assoc($result)){
                echo " 
                    <div class='book'>
                        <p>Book Title: {$row['title']}</p>
                        <p>Book Description: {$row['description']}</p>
                    </div>
                    <br/>
                ";        
            }
        ?>    
    </div>

</body>
</html>
