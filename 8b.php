<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Student Records</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        table { width: 50%; border-collapse: collapse; margin: 20px auto; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #007bff; color: #fff; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Student Records (Sorted by Marks)</h2>

    <?php
    $conn = new mysqli("localhost", "root", "", "school");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 $result = $conn->query("SELECT id, name, marks FROM students ORDER BY marks ASC");
if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Marks</th></tr>";
        while ($student = $result->fetch_assoc()) {
            echo "<tr><td>{$student['id']}
            </td><td>{$student['name']}
            </td><td>{$student['marks']}
            </td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>No records found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>