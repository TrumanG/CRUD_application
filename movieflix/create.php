<?php

                //Function to create a record
                function createRecord(){
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
                    $movieTitle = $_POST['create-title'];
                    $movieGenre = $_POST['create-genre'];
                    $movieDirector = $_POST['create-director'];

                    //Insert into Database
                    $sql = "INSERT INTO movieflix_table (title, genre, director) VALUES ('$movieTitle', '$movieGenre', '$movieDirector')";
                    
                    if(!mysqli_query($connection, $sql)){
                        echo 'Error: '.$sql.mysqli_error($connection);
                    }

                    //Close connection
                    mysqli_close($connection);

                    header('location: index.php');
                }

                if(isset($_POST['submit-create'])){
                    createRecord();
                }

?>