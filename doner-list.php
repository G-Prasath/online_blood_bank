<?php
require_once "db.php";

if (isset($_GET['blood_group']) && !empty($_GET['blood_group'])) {

    $blood_group = $_GET['blood_group'];

    // Secure Prepared Statement
    $stmt = $conn->prepare("SELECT * FROM donors WHERE blood_group = ?");
    $stmt->bind_param("s", $blood_group);
    $stmt->execute();
    $result = $stmt->get_result();

} else {

    $sql = "SELECT * FROM donors ORDER BY id DESC";
    $result = $conn->query($sql);
}


?>



<!DOCTYPE html>
<html>

<head>
    <title>Online Blood Bank</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            background-color: #f4f4f4;
            text-align: center;
        }

        header {
            background-color: darkred;
            color: white;
            padding: 15px;
        }

        .search-box {
            margin: 20px;
        }

        select,
        button {
            padding: 8px;
            margin: 5px;
        }

        table {
            margin: auto;
            width: 80%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid gray;
        }

        th {
            background-color: red;
            color: white;
        }

        .register-btn {
            margin: 20px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Online Blood Banking System</h1>
    </header>

    <div class="search-box">
        <h3 style="margin:5px 0px;">Search Blood Group</h3>

        <form method="GET">
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

            <button type="submit">Search</button>
        </form>
    </div>


    <div class="register-btn">
        <a href="./index.php">
            <button>Register as Donor</button>
        </a>
    </div>

    <h3 style="margin: 10px 0px;">Available Donors</h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Blood Group</th>
                <th>Contact</th>
                <th>City</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><?= $row['donor_name']; ?></td>
                        <td><?= $row['blood_group']; ?></td>
                        <td><?= $row['contact']; ?></td>
                        <td><?= $row['reg_date']; ?></td>
                        <td><?= $row['city']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">No donors found</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>