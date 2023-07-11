<?php

session_start();

class User{
    private $email;
    private $pass;

    public function __construct($email, $pass)
    {
        $this->email = $email;
        $this->pass = $pass;

        
    }


    public function validateCredentials(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            // echo "Working";
            $sql = "SELECT * FROM USERS WHERE Email='$this->email' ";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);
            
            if ($numrows == 1){
                $row = mysqli_fetch_assoc($result);

                if ($row['Password'] == $this->pass){
                    $_SESSION['FirstName'] = $row['FirstName'];
                    $_SESSION['LastName'] = $row['LastName'];
                    $_SESSION['ProfileImage'] = $row['ProfileImage'];
                    return true;
                }

                else{
                    return false;
                }
            }
        }
    }

    public static function getNumUsers(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT COUNT(*) AS numUsers FROM USERS";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows == 1){
                $row = mysqli_fetch_assoc($result);
                $count = $row['numUsers'];
                return $count;
            }
        }
    }

    public function message(){
        echo "Username: " . $this->email;
    }


}


// echo User::getNumUsers();
?>