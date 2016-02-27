<?php
    require_once('functions/reviews.php');
    $name = explode("/", $_GET['img_name']);
    $name = $name[1];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Photo</title>
</head>
<body style="text-align:center;">
    <img src="<?php echo $_GET['img_name']; ?>" width="70%" />
    <p>Количество просмотров: <?php echo get_reviews($name); ?></p>
</body>
</html>

<?php
    review_plus($name);
?>