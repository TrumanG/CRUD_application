<?php
    //Function to create a record
    function deleteRecord(){
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'movieflix_database';

        //Connect to database
        $connection = mysqli_connect($server, $username, $password, $database);

        if(!$connection){
            die('Connection unsuccessful :'.mysqli_connect_error());
        }

        //Store user input
        $id = $_POST['delete-id'];

        //Insert into Database
        $sql = "DELETE FROM movieflix_table WHERE id='$id'";
        
        if(!mysqli_query($connection, $sql)){
            echo 'Error: '.$sql.mysqli_error($connection);
        }

        //Close connection
        mysqli_close($connection);

        header('location: index.php');
    }

    if(isset($_POST['submit-delete'])){
        deleteRecord();
    }
?>