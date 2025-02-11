<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header("Location: auth.php");
    exit();
}

$servername = "localhost";
$username = "u974036710_study";
$password = "Babita@111288";
$dbname = "u974036710_study";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM leads WHERE id = $delete_id";
    $conn->query($sql);
}

$sql = "SELECT id, firstName, lastName, email, phone, country, created_at FROM leads";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Data Table</title>
    <style>
        /* General styles */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom, #eef1ff, #d5dbff);
            margin: 0;
            padding: 20px;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        /* Container styling */
        .container {
            width: 100%;
            max-width: 1100px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        
        /* Header styling */
        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #222;
        }
        
        /* Table styling */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 15px;
        }
        
        .data-table th, .data-table td {
            padding: 14px;
            text-align: left;
            font-size: 14px;
        }
        
        .data-table th {
            background: #f9f9fc;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
        }
        
        .data-table tr {
            transition: all 0.3s ease-in-out;
        }
        
        .data-table tr:hover {
            background: rgba(0, 0, 255, 0.05);
        }
        
        .data-table td {
            border-bottom: 1px solid #e6e6e6;
        }
        
        /* Buttons */
        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        
        .delete-btn:hover {
            background-color: #c0392b;
        }
        
        /* No data message */
        .no-data {
            text-align: center;
            font-size: 16px;
            font-weight: 500;
            color: #999;
            padding: 20px;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        
            .data-table th, .data-table td {
                padding: 10px;
                font-size: 12px;
            }
        
            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lead Data</h1>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['firstName']); ?></td>
                            <td><?php echo htmlspecialchars($row['lastName']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['country']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <form method="post" action="index.php" style="display:inline;">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="no-data">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>