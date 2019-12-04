<?php

class User {
	private $dbHost     = "localhost";
    private $dbUsername = "jaydeep";
    private $dbPassword = "Jaydeep9979";
    private $dbName     = "beebom";
   
	
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	

	function checkUser($userData = array())
    {
       
            //Check whether user data already exists in database
            print_r($userData);
            if(!empty($userData))
            {

            $fname=$userData['first_name'];
            $lname=$userData['last_name'];
            $email=$userData['email'];
            $arr="select * from customer where `email`=".$email;
            $fire=mysqli_query($this->db,$arr);
            $rowcount=mysqli_num_rows($fire);
            echo $rowcount;
            if(mysqli_num_rows($fire)==1)
            {
                $up="update customer set `f_name`='$fname',`l_name`='$lname',`email`='$email' ";
                $ups=mysqli_query($this->db,$up);
            }
            else
             {
                 $in="insert into customer(`f_name`,`l_name`,`email`) values('$fname','$lname','$email')";
                 $fet=mysqli_query($this->db,$in);

            }

        //     $prevQuery = "SELECT * FROM ".$this->customer." WHERE email = '".$userData['email']."'";
        //     $prevResult = $this->db->query($prevQuery);
        //     if($prevResult->num_rows > 0){
        //         //Update user data if already exists
        //         $query = "UPDATE ".$this->customer." SET f_name = '".$userData['first_name']."', l_name = '".$userData['last_name']."', email = '".$userData['email']."'";
        //         $update = $this->db->query($query);
        //     }else{
        //         //Insert user data
        //         $query = "INSERT INTO ".$this->customer." SET  f_name = '".$userData['first_name']."', l_name = '".$userData['last_name']."', email = '".$userData['email']."'";
        //         $insert = $this->db->query($query);
        //     }
            
        // //    Get user data from the database
        //     $result = $this->db->query($prevQuery);
        //     $userData = $result->fetch_assoc();
        }
        
        //Return user data
        // return $userData;
    }
}
?>