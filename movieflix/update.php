<?php
    
    function updateRecord(){
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
        $id = $_POST['update-id'];
        $title = $_POST['update-title'];
        $genre = $_POST['update-genre'];
        $director = $_POST['update-director'];

        //Update query
        $sql = "UPDATE movieflix_table SET title='$title', genre='$genre', director='$director' WHERE id='$id'";

        if(!mysqli_query($connection, $sql)){
            echo 'Error: '.$sql.mysqli_error($connection);
        }

        //Close connection
        mysqli_close($connection);

        header('location: index.php');
    }

    if(isset($_POST['submit-update'])){
        updateRecord();
    }
?>