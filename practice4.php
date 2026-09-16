<!--
php -S localhost:8000

http://localhost:8000/example4.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Multiplication Table</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
            width: 40px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .header-corner {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

    <h2>Multiplication Table Generator</h2>
    
    <!-- HTML Form to receive the number input -->
    <form method="POST" action="">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" min="1" required value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>">
        <button type="submit">Generate Table</button>
    </form>

    <?php
    // Check if the form is submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number'])) {
        
        // Sanitize and convert the input to an integer
        $max_num = intval($_POST['number']);
        
        if ($max_num >= 1) {
            echo "<h3>Multiplication Table from 1 to $max_num</h3>";
            echo "<table>";
            
            // 1. Print the Column Index Headers (Top Row)
            echo "<tr>";
            echo "<th class='header-corner'>X</th>"; // Top-left corner cell
            for ($col = 1; $col <= $max_num; $col++) {
                echo "<th>$col</th>";
            }
            echo "</tr>";
            
            // 2. Generate the Rows with Row Index Headers and Multiplications
            for ($row = 1; $row <= $max_num; $row++) {
                echo "<tr>";
                
                // Print the Row Index Header (First column of the current row)
                echo "<th>$row</th>";
                
                // Print the multiplication values for the current row
                for ($col = 1; $col <= $max_num; $col++) {
                    $result = $row * $col;
                    echo "<td>" . $result . "</td>";
                }
                
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p style='color: red;'>Please enter a positive number greater than or equal to 1.</p>";
        }
    }
    ?>

</body>
</html>
