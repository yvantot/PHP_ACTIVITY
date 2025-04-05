<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "book_management";

    $conn = mysqli_connect($host, $user, $pass, $db);
    $name = "John Doe";
    $email = "john@example.com";    

    // SQL QUERY v
    // $insert = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')"; 

    // Execute the query in the SQL server
    // mysqli_query($conn, $insert);
        
    // LOGIN --> Check whether the account exists in the database    
    if(isset($_POST["logOrSign"]) && $_POST["logOrSign"] == "Log in"){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $user_username = $_POST["username"];
            $user_password = $_POST["password"];

            if($user_username != "" && $user_password != ""){                

                $query = "SELECT * FROM users WHERE username = '$user_username'";
                $result = mysqli_query($conn, $query);

                if($row = mysqli_fetch_assoc($result)){
                    if($row["password"] === $user_password){
                        echo "Correct Password";
                    } else {
                        echo "Wrong Password";
                    }
                } else {
                    echo "This user doesn't exist";
                }
            } else {
                echo "Please complete the details";
            }
        }            
    } else if (isset($_POST["logOrSign"]) && $_POST["logOrSign"] == "Sign up"){
        // Checks whether the inputs are set
        if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["role"])){
            $user_username = $_POST["username"];
            $user_password = $_POST["password"];
            $user_role = $_POST["role"];

            if($user_username != "" && $user_password != ""){
                $query = "INSERT INTO users (username, password, role) VALUES ('$user_username', '$user_password', '$user_role')";
                // Use try-catch because PHP gives an error when there's SQL conflict and cut the execution of the program                
                try{
                    // Here, we check whether the user is created or not
                    // Not sure what mysqli_query returns for INSERT operation... 
                    // but it makes sense for this to return a value based on the execution outcome
                    $result = mysqli_query($conn, $query); 
                    if($result){
                        echo "Successfully create an account";    
                    } else {
                        echo "Failed to create an account";
                    }
                } catch(Exception $e){
                    echo "Oops, something wrong: $e";
                }                
            } else {
                echo "Please complete the details";
            }
        }
    } else {
        echo 'DEFAULT STATE';
    }
 

    // SIGN UP --> Create an account


    // Close the database connection
    // mysqli_close($conn);
?>
<?php 
    include("login.html");
?>