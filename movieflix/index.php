<!DOCTYPE html>
<html>
    <head>
        <title>MovieFlix</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>

            * {
                background-color: #EFFAFF;
            }

            body {
                font-family: 'Roboto', sans-serif;
            }

            #create-form, #update-form, #delete-form {
                display: none;
            }

            .main-div {
                width: 80vw;
                margin: 0 auto;
            }

            h2 {
                text-align: center;
            }

            table {
                margin: 15px auto;
                width: 50vw;
                text-align: center;
            }

            table tr td {
                padding: 12px;
            }

            .content-wrapper {
                width: 100%;
                margin: 0 auto;
                text-align: center;
            }

            #create-button, #edit-button, #delete-button {
                width: 140px;
                height: 37.5px;
                background-color: #196bfa;
                color: #EFFAFF;
                border-radius: 4px;
                border: 1.5px solid black;
                letter-spacing: 1.5px;
                cursor: pointer;
            }

            .submit {
                width: 76px;
                height: 30px;
                background-color: #196bfa;
                color: #EFFAFF;
                border-radius: 3px;
                border: none;
                cursor: pointer;
            }

            input[type="text"] {
                margin: 6px;
                width: 260px;
                height: 32px;
                padding: 3px;
            }

        </style>
    </head>
    <body>
        <div class="main-div">
        <?php require_once 'create.php'; ?>
        <div>
            <h2>MovieFlix</h2>
            <?php
                $server = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'movieflix_database';

                //Connect to database
                $connection = mysqli_connect($server, $username, $password, $database);

                if(!$connection){
                    die('Connection unsuccessful :'.mysqli_connect_error());
                }

                //Query the table for the records
                $sql = "SELECT * FROM movieflix_table";
                $result = mysqli_query($connection, $sql);
                $rowCount = mysqli_num_rows($result);
                
                if($rowCount > 0){
                    echo "
                        <table>
                            <thead>
                                <tr>
                                    <th>Record ID</th>
                                    <th>Title</th>
                                    <th>Genre</th>
                                    <th>Director</th>
                                </tr>
                            </thead>
                    ";
                }
            ?>
            <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['genre'] ?></td>
                        <td><?php echo $row['director'] ?></td>
                    </tr>
                <?php endwhile ?>
            </table>
        </div>
        <div class="content-wrapper">
            <button id="create-button">Create Record</button>
            <button id="edit-button">Edit Record</button>
            <button id="delete-button">Delete Record</button>

            <form action="create.php" method="POST" id="create-form">
                <input type="text" placeholder="Enter movie title" name="create-title"/><br/>
                <input type="text" placeholder="Enter movie genre" name="create-genre"/><br/>
                <input type="text" placeholder="Enter movie director" name="create-director"/><br/>
                <input type="submit" value="Save" name="submit-create" class="submit"/>
            </form>

            <form action="update.php" method="POST" id="update-form">
                <input type="text" placeholder="Enter record ID" name="update-id"/><br/>
                <input type="text" placeholder="Enter movie title" name="update-title"/><br/>
                <input type="text" placeholder="Enter movie genre" name="update-genre"/><br/>
                <input type="text" placeholder="Enter movie director" name="update-director"/><br/>
                <input type="submit" value="Save" name="submit-update" class="submit"/>
            </form>

            <form action="delete.php" method="POST" id="delete-form">
                <input type="text" placeholder="Enter record ID" name="delete-id"/><br/>
                <input type="submit" value="Save" name="submit-delete" class="submit"/>
            </form>

        </div>

        </div>
        <script src="script.js"></script>
    </body>
</html>