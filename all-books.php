<?php 
    $conn = mysqli_connect("localhost", "root", "", "book_management");    

    $result = mysqli_query($conn, "SELECT * FROM books");
    
    while($row = mysqli_fetch_assoc($result)){
        echo " 
            <div>
                <h2>{$row['title']}</h2>
                <p>{$row['description']}</p>
            <div>
        ";        
    }
?>