<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liberty</title>
<link rel="stylesheet" href="css/lightSwitch.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
<link rel="stylesheet" href="css/custom.css">
<?php
    if (isset($_SESSION["user"])) {
        $sql = "SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
        $result = mysqli_query($con, $sql);
        $reg = mysqli_fetch_array($result);
        if ($reg["mode"]=="dark") {
            ?>
            <link rel="stylesheet" href="css/dark-mode.css">
            <link rel="stylesheet" href="css/scroll-dark.css">
            <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="css/scroll-light.css">
        <?php
    }
?>
<link rel="stylesheet" href="css/style.css">