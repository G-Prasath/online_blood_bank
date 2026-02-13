<?php
require_once "./db.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Donor</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            background: #f4f4f4;
        }

        .box {
            width: 350px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px gray;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .register-btn {
            background: red;
        }

        .list-btn {
            background: darkblue;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <h2>Donor Registration Form</h2>

    <div class="box">
        <form method="post" action="./save.php">

            <input type="text" name="name" placeholder="Enter Name" required minlength="3">

            <input type="date" name="date" required>

            <select name="blood_group" required>
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>

            <input type="tel" name="contact" placeholder="Contact Number" required pattern="[0-9]{10}"
                title="Enter 10 digit mobile number">

            <input type="text" name="city" placeholder="City" required minlength="3">

            <div class="btn-group">
                <button type="submit" class="btn register-btn">Register</button>
                <a href="./doner-list.php" class="btn list-btn">Donor List</a>
            </div>

        </form>

    </div>

</body>

</html>