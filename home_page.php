

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
    <style>
        img {
            width: 150px;
            height: 250px;
            border-radius: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    ?>
    <h1>welcome to Home page</h1>
    <p><a href="logout.php">logout</a></p>
    <h5>Choose Template</h5>
   <div class="image-container">
        <a href="card.php?card_temp=<?php echo urlencode('https://trbahadurpur.com/wp-content/uploads/2022/11/wedding-invitation-card-design.jpg'); ?>">
            <img src="https://trbahadurpur.com/wp-content/uploads/2022/11/wedding-invitation-card-design.jpg" alt="">
        </a>
       
        <a href="card.php?card_temp=<?php echo urlencode('https://drevio.b-cdn.net/wp-content/uploads/2022/04/7-Lovely-Red-Floral-Gold-Wedding-Invitation-Templates-Two.jpg'); ?>">
            <img src="https://drevio.b-cdn.net/wp-content/uploads/2022/04/7-Lovely-Red-Floral-Gold-Wedding-Invitation-Templates-Two.jpg" alt="">
        </a>
    </div>
</body>
</html>