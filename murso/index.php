<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MURSO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- font awesoome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body id="body-pd">
    <!-- alert box -->
    <?php
    if (isset($_SESSION["message-type"])) : ?>
        <div class="alert-content">
            <?php
            if ($_SESSION["message-type"] === "success") : ?>
                <div class="alert-<?= $_SESSION["message-type"] ?> alertBox">
                    <?php
                    echo $_SESSION["message"];
                    unset($_SESSION["message-type"]);
                    unset($_SESSION["message"]);
                    ?>

                </div>
            <?php
            elseif ($_SESSION["message-type"] === "warning") : ?>
                <div class="alert-<?= $_SESSION["message-type"] ?> alertBox">
                    <?php
                    echo $_SESSION["message"];
                    unset($_SESSION["message-type"]);
                    unset($_SESSION["message"]);
                    ?>
                </div>
            <?php endif; ?>
        </div>

    <?php
    endif;
    ?>
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="./img/MU_LOGO.png" alt="logo of misamis university"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">MU Murso</span> </a>
                <div class="nav_list">
                    <a href="index.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Organizations</span> </a>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a href="add.php" class="nav_link"> <i class='bx bxs-plus-circle'></i> <span class="nav_name">Manage Organizations</span> </a>
                    <?php endif ?>
                    <a href="view.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">View Organizations</span> </a>
                </div>
            </div>
            <?php if (isset($_SESSION['user'])) : ?>
                <form action="" method="get">
                    <a href="?logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
                </form>
            <?php else : ?>
                <a href="login.php" class="nav_link"> <i class='bx bx-log-in nav_icon'></i> <span class="nav_name">Login</span> </a>
            <?php endif; ?>
        </nav>
    </div>
    <!--Container Main start-->
    <?php
    $getOrg = "SELECT a.*, COUNT(b.org_id) AS num_members
                    FROM organization a
                    LEFT JOIN orgs_mem b ON a.org_id = b.org_id
                    GROUP BY a.org_id;";
    $getOrgRes = $mysql->query($getOrg);

    ?>
    <div class="content" style="margin-top: 70px;">
        <section class="main-section">
            <div class="top-section">
                <h4>Murso Organizations</h4>
                <p style="padding-left: 20px;">A list of approved Organizations</p>
                <hr style="border: 1px solid white">
            </div>
            <div class="card-content">
                <?php while ($row = $getOrgRes->fetch_assoc()) : ?>
                    <div class="cards">
                        <div class="infos">
                            <div class="image">
                                <!-- SET THE LOGO IF THERE IS A LOGO UPLOADED -->
                                <?php if(!empty($row['filename'])): ?>
                                    <img class="image-holder"src="./img/<?php echo $row['filename'] ?>" alt="">
                                <?php endif;?>
                            </div>
                            <div class="info">
                                <div>
                                    <p class="name"><?= $row['org_name'] ?></p>
                                    <p class="function"><?= $row['org_dept'] ?></p>
                                </div>
                                <div class="stats">
                                    <p class="flex">Members<span class="state-value"><?= $row['num_members'] ?></span></p>
                                </div>
                            </div>
                        </div>
                        <a href="view.php?id=<?= $row['org_id'] ?>">
                            <button class="request" type="button">More Info</button>
                        </a>
                    </div>
                <?php endwhile;   ?>
            </div>
        </section>
    </div>
    <!--Container Main end-->
    <?php
    if (isset($_GET['logout'])) {
        session_destroy();
        echo '<script>window.location.replace("login.php");</script>';
    }
    ?>
    <!-- boostrap 5 bundle with jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
</body>

</html>
<script src="index.js"></script>