<?php 
    $conn = mysqli_connect("localhost", "root", "", "book_management");    

    $book_title = $_POST["title"];
    $user_username = $_POST["username"];

    // Get the book if it exists
    // Get the user if it exists & should be a student    
    // If all true, assign it
    if($book_title != "" && $user_username != ""){
        $result_user = mysqli_query($conn, "SELECT * from users WHERE username = '$user_username'");
        $user = mysqli_fetch_assoc($result_user);        
        if(!$user || $user['role'] == "teacher") header("teacher-dashboard.php");        

        $result_book = mysqli_query($conn, "SELECT * from books WHERE title = '$book_title'");
        $book = mysqli_fetch_assoc($result_book);
        if(!$book) header("teacher-dashboard.php"); // Return if the book doesn't exist        
        
        $user_id = $user['user_id'];
        $book_id = $book['book_id'];        
        
        try{
            mysqli_query($conn, "INSERT INTO assignments(book_id, user_id) VALUES('$book_id', '$user_id')");
        } catch(Exception $e){
            echo $e;
        }        
    }

     header("Location: teacher-dashboard.php");   
?>