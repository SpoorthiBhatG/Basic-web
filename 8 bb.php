<?php 
$servername = "localhost"; 
$username = "root"; 
$password = "Sinc"; 
$dbname = "students"; 

$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

$sql = "SELECT * FROM students"; 
$result = $conn->query($sql); 
$students = []; 

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) { 
        $students[] = $row; 
    } 
} 

function selectionSort(&$arr, $key) 
{ 
    $n = count($arr); 
    for ($i = 0; $i < $n - 1; $i++) { 
        $minIndex = $i; 
        for ($j = $i + 1; $j < $n; $j++) { 
            if ($arr[$j][$key] < $arr[$minIndex][$key]) { 
                $minIndex = $j; 
            } 
        } 
        $temp = $arr[$i]; 
        $arr[$i] = $arr[$minIndex]; 
        $arr[$minIndex] = $temp; 
    } 
} 

selectionSort($students, 'marks'); // Sort by marks
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sort by Marks</title>
        <style>
            body { font-family: Arial, sans-serif; background-color: white; margin: 20px; }
            table { width: 50%; background-color: #ccc; border-collapse: collapse; margin: 20px auto; }
            th, td { border: 1px solid black; padding: 10px; text-align: center; }
            th { background-color: blue; color: white; }
            tr:nth-child(even) { background-color: lightgray; }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;">Sorted Student Marks</h1>
        <?php if (!empty($students)) : ?>
            <table>
                <tr>
                    <th>USN</th>
                    <th>Name</th>
                    <th>Marks</th>
                </tr>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><?= htmlspecialchars($student['usn']) ?></td>
                        <td><?= htmlspecialchars($student['name']) ?></td>
                        <td><?= htmlspecialchars($student['marks']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p style="text-align: center;">No records found.</p>
        <?php endif; ?>
    </body>
</html>