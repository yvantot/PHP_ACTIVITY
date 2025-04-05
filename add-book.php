<?php 
    $conn = mysqli_connect("localhost", "root", "", "book_management");    

    $book_title = $_POST["title"];
    $book_description = $_POST["description"];
    $book_cover = $_POST["coverimage"];            

    if($book_title != "" && $book_description != ""){
        $query = "INSERT INTO books (title, description, cover_image) VALUES ('$book_title', '$book_description', '$book_cover')";

        try{
            mysqli_query($conn, $query);
        }catch(Exception $e){
            echo $e;
        }
    }

    header("Location: teacher-dashboard.php");
?>