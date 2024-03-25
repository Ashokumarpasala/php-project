<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
</head>
<body>
      <form method="post" action="pdf_generate.php"  >


    <label for="g_name">Groom's Name  : </label>
    <input type="text" name="g_name" id="g_name">
    <label for="g_age">Groom's Age : </label>
    <input type="number" name="g_age" id="g_age">
    <label for="b_name">Bride's Name : </label>
    <input type="text" name="b_name" id="b_name">
    <label for="b_age">Bride's Age :</label>
    <input type="number" name="b_age" id="b_age">
    <button type="submit">Generate PDF</button>
    </form>
    <?php
    if (isset($_GET['card_temp'])) {
    $card_temp = urldecode($_GET['card_temp']);
    echo "<img src='$card_temp' alt=''>";
    } else {
        echo "No image selected";
    }
    ?>
</body>
</html>