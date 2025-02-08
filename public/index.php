<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel to Word Converter</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        form { margin-top: 20px; }
        input[type="file"] { margin: 10px 0; }
        button { padding: 10px 15px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Upload Excel File</h2>

<form action="process.php" method="post" enctype="multipart/form-data">
    <input type="file" name="excel_file" accept=".xls, .xlsx" required>
    <br>
    <button type="submit">Convert to Word</button>
</form>

</body>
</html>
