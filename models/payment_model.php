<?php

class Payment{
    private $paymentDate;
    private $paymentTime;
    private $amount;
    private $studentID;

    public function __construct($paymentDate, $paymentTime, $amount, $studentID)
    {
        $this->paymentDate = $paymentDate;
        $this->paymentTime = $paymentTime;
        $this->amount = $amount;
        $this->studentID = $studentID;
    }

    public static function getTotalRevenue(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT SUM(Amount) AS totalRevenue FROM Payment";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows == 1){
                $row = mysqli_fetch_assoc($result);
                $count = $row['totalRevenue'];
                return $count;

            }

        }

    }


    public static function getDailyRevenue(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT SUM(Amount) AS DailyRevenue FROM Payment WHERE PaymentDate = CURDATE()";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows > 0){
                $row = mysqli_fetch_assoc($result);
                $count = $row['DailyRevenue'];
                // echo "In here";
                return $count;

            }
            
            

        }

    }


    public static function retrievePayments(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT * FROM Payment ORDER BY PaymentDate LIMIT 6";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows > 1){
                // $row = mysqli_fetch_assoc($result);
                // mysqli_close($conn);
                return $result;
            }
        }

    }

    public static function getPaymentByDate($date){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $query = "SELECT * FROM Payment WHERE PaymentDate = '$date'";
            $result = mysqli_query($conn, $query);
            $numrows = mysqli_num_rows($result);

            if ($numrows >  0){
                $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $payments;


            }

            else{
                return [];
            }

        }


    }
    

    public static function getPaymentStats(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $startRange = date('Y-m-d', strtotime('-7 days'));
            $endRange = date('Y-m-d');
    
            $query = "SELECT DAYNAME(PaymentDate) as day, COUNT(*) as count FROM Payment WHERE PaymentDate BETWEEN '$startRange' AND '$endRange' GROUP BY day";
            $result = mysqli_query($conn, $query);

            $data = array();
            $columns = array('day', 'count');

            while ($row = mysqli_fetch_assoc($result)){
                foreach ($columns as $column){
                    if (array_key_exists($column, $row)){
                        $value = $row[$column];
                        $data[$column][] = $value;
                    }
                    else{
                        $data[$column] = array();
                    }
                }
            }

            mysqli_close($conn);
            return $data;
        }
    }

    public static function getMonthlyPaymentStats(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $query = "SELECT MONTHNAME(PaymentDate) as month, COUNT(*) as count FROM Payment WHERE YEAR(PaymentDate) = YEAR(CURRENT_DATE) GROUP BY month;";
            $result = mysqli_query($conn, $query);

            $data = array();
            $columns = array('month', 'count');

            while ($row = mysqli_fetch_assoc($result)){
                foreach ($columns as $column){
                    if (array_key_exists($column, $row)){
                        $value = $row[$column];
                        $data[$column][] = $value;
                    }
                    else{
                        $data[$column] = array();
                    }
                }
            }

            mysqli_close($conn);
            return $data;
        }
    }
}

// Payment::getDailyRevenue();
// Payment::getPaymentStats();
// Payment::getPaymentByDate('2023-07-10');

?>