<?php
session_start();
include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <style>
        body{
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        #main {
            width: 600px;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h1 {
            background-color: #a7b9ef;
            color: white;
            padding: 10px;
            margin: 0;
            font-size: 18px;
            text-align: center;
        }

        .output {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
            background-color: #f6f8ff;
        }

        .message {
            background-color: #f2f2f2;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        textarea {
            width: calc(100% - 41px);
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }

        .send{
            width: calc(100% - 18px);
            padding: 10px;
            margin: 10px;
            background-color:  #512da8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }

        .send:hover {
            background-color: green;
        }
        .logout-button{
            width: calc(100% - 18px);
            padding: 10px;
            margin: 10px;
            background-color:  #512da8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
            text-align: center;
            margin-top: -13px;
        }

        .logout-button:hover {
            background-color: red;
        }
        .bb{
            font-size: 12px;
            color: #777;
            margin-top: 5px;
            font-style: italic;
            text-align: center;
        }
        .aa{
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            max-width: 70%;
            background-color: #c9d6ff;
        }
    </style>
    <title>Home Page</title>
</head>
<body>
    <div id="main">
        <h1 style="background-color: #512da8; color: white; padding: 20px;">
        <?php
        echo $_SESSION['name'] . " -Online";
        ?>
        </h1>
        <div class="output">
            <?php
            $sql = "SELECT * FROM posts";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                // Check if there are rows in the result set
                while ($row = $result->fetch_assoc()) {
                    // Loop through each row in the result set
                    echo $row['name'] . " : <div class=\"aa\">" . $row['msg'] . "</div> <div class=\"bb\">-- " . $row['date'] . "</div><br>";
                    // Print the values of 'name', 'msg', and 'date' from the current row
                }
            } else {
                // If there are no rows in the result set
                echo "No messages yet";
            }
            $conn->close();
            ?>
        </div>
        <form method="post" action="send.php">
            <textarea name="msg" placeholder="Type your message here..." class="form-control"></textarea><br>
            <input type="submit" value="Send" class="send">
        </form><br>

        <form action="logout.php">
            <input type="submit" value="Logout" class="logout-button">
        </form>
    </div>
</body>
</html>
