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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- font awesoome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");

        /* ALERT BOX STYLE */
        .alert-success {
            position: absolute;
            z-index: 99;
            top: 20px;
            left: 50%;
            background-color: #3e8e41;
            padding: 10px;
            border-radius: 6px;
            color: white;
            font-size: 12px;
        }

        .alert-warning {
            position: absolute;
            z-index: 99;
            top: 20px;
            left: 50%;
            background-color: #db4848;
            padding: 10px;
            border-radius: 6px;
            font-size: 12px;
            color: white;
        }

        .faq-container {
            font-family: "Poppins", sans-serif;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            background-color: #666;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .faq {
            box-sizing: border-box;
            background: transparent;
            padding: 30px 20px;
            position: relative;
            overflow: hidden;
        }

        .faq:not(:first-child) {
            border-top: 1px solid #e6e6e6;
        }

        .faq-title {
            margin: 0 35px 0 0;
        }

        .faq-text {
            margin: 30px 0 0;
            display: none;
            line-height: 1.5rem;
        }

        .faq.active {
            background-color: #666;
            box-shadow: inset 4px 0px 0px 0px var(--accent-color);
        }

        .faq.active .faq-title {
            color: var(--accent-color);
        }

        .faq.active .faq-text {
            display: block;
        }

        .faq-toggle {
            background-color: transparent;
            border: 1px solid #e6e6e6;
            color: inherit;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            padding-top: 3px;
            position: absolute;
            top: 30px;
            right: 30px;
            height: 30px;
            width: 30px;
            transition: 0.3s ease;
        }

        .faq-toggle:focus {
            outline: none;
        }

        .faq.active .faq-toggle {
            transform: rotate(180deg);
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: #fff;
        }

        .top-section {
            height: 60px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .top-section-nav {
            display: flex;
            position: relative;
            z-index: 1;
        }

        .top-section-nav h6 {
            margin: 0;
        }

        .top-img {
            position: absolute;
        }

        .top-message {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            margin-left: 80px;
        }

        .top-message h6,
        p {
            margin: 0;
        }

        .btn-edit {
            font-size: 12px;
        }

        .table-up {
            display: flex;
            justify-content: space-between;
            margin: 0;
        }

        .container-input {
            position: relative;
        }

        .input {
            width: 200px;
            padding: 10px 0px 10px 40px;
            border-radius: 9999px;
            border: solid 1px #333;
            transition: all .2s ease-in-out;
            outline: none;
            opacity: 0.8;
        }

        .container-input svg {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translate(0, -50%);
        }

        .input:focus {
            opacity: 1;
            width: 300px;
        }
    </style>
</head>

<body id="body-pd" onload="">

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
                    <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Organizations</span> </a>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a href="add.php" class="nav_link"> <i class='bx bxs-plus-circle'></i> <span class="nav_name">Manage Organizations</span> </a>
                    <?php endif ?>
                    <a href="" class="nav_link active"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">View Organizations</span> </a>
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
    <div class="content" style="margin-top: 70px;">
        <?php
        // GLOBAL ORG ID
        if (isset($_GET['id'])) :
            $org_id_glob = $_GET['id'];
            $org_id = $_GET['id'];
            $getOrg = "SELECT * FROM organization WHERE org_id = $org_id";

            $getOrgRes = $mysql->query($getOrg);
            $row = $getOrgRes->fetch_assoc();
        ?>
            <section class="main-section">
                <div class="top-section">
                    <div class="top-section-nav ">
                        <div class="top-img ">
                            <img src="./img/MU_LOGO.png" alt="logo of the organization" height="70px" width="70px">
                        </div>
                        <div class="top-message ">
                            <h6><?= $row['org_name'] ?></h6>
                            <p style="font-style:italic"><?= $row['org_dept'] ?></p>
                            <p><i>Date of Creation:</i> <?= date('F j, Y', strtotime($row['creation_date'])) ?></p>
                        </div>
                    </div>
                    <div class="actions">
                        <?php if(isset($_SESSION['user'])): ?>
                            <form method="post">
                                <input type="hidden" value="<?= $row['org_id'] ?>" name="id_org">
                                <button type="submit" class="btn btn-danger" name="delORG">Delete</button>
                            </form>
                        <?php endif;?>
                    </div>
                </div>
                <hr style="border: 1px solid white">
                <!-- CONTAINER -->
                <div class="container px-2">
                    <div class="row gx-3">
                        <div class="col-md-4">
                            <div class="p-2 ">
                                <div class="faq-container">
                                    <div class="faq">
                                        <h6 class="faq-title">Description</h6>
                                        <p class="faq-text"><?= $row['org_desc'] ?></p>
                                        <button class="faq-toggle">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                    <div class="faq">
                                        <h6 class="faq-title">Adviser</h6>
                                        <p class="faq-text"><?= $row['org_adviser'] ?></p>
                                        <button class="faq-toggle">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-2">
                                <div class="table-up">
                                    <h5><span style="font-weight: bold"><?= $row['org_name'] ?></span> members</h5>
                                    <!-- HIDDING BUTTON WHEN NOT LOGGED IN -->
                                    <?php if (isset($_SESSION['user'])) : ?>
                                        <form action="POST">
                                            <button type="button" class="btn btn-primary btn-edit" id="addMem">
                                                Add Members
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                                <hr style="border: 1px solid white">
                                <?php
                                $members = "SELECT a.*,b.* FROM orgs_mem a INNER JOIN student_information b ON a.student_id = b.student_id 
                                                    WHERE a.org_id = $org_id";
                                $membersRes = $mysql->query($members);
                                ?>
                                <!-- responsive table -->
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped content-show">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>MI</th>
                                                <th>Course</th>
                                                <th>Level</th>
                                                <th>Gender</th>
                                                <!-- HIDING ACTION WHEN NOT LOOGED IN -->
                                                <?php if (isset($_SESSION['user'])) : ?>
                                                    <th>Action</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($membersRes) > 0) :
                                                while ($memRow = $membersRes->fetch_assoc()) :
                                            ?>
                                                    <tr>
                                                        <td><?= $memRow['student_id'] ?></td>
                                                        <td><?= $memRow['firstname'] ?></td>
                                                        <td><?= $memRow['lastname'] ?></td>
                                                        <td><?= $memRow['mi'] ?></td>
                                                        <td><?= $memRow['course'] ?></td>
                                                        <td><?= $memRow['level'] ?></td>
                                                        <td><?= $memRow['gender'] ?></td>
                                                        <?php if (isset($_SESSION['user'])) : ?>
                                                            <td>
                                                                <form method="POST">
                                                                    <input type="hidden" name="id_student" value="<?= $memRow['student_id'] ?>">
                                                                    <button type="submit" class="btn btn-danger btn-edit" name="removeMem">Remove</button>
                                                                </form>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php
                                                endwhile;
                                            else :
                                                ?>
                                                <tr>
                                                    <td colspan="8" style="text-align: center;">No Members Yet!</td>
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="content-hide" style="display: none">
                                    <h6>Please search the student before adding as a member</h6>
                                    <hr style="border: 1px solid #5e5e5e;">
                                    <!-- CONTENT OF SEARCH -->
                                    <form method="POST">
                                        <div class="container-input" style="margin-bottom: 20px;">
                                            <input type="text" placeholder="Search a student" name="search" class="input" id="search-input">
                                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </form>
                                    <div id="search-results"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        else :
        ?>
            <center>
                <h1 style="color: white;margin-top: 100px">No Organization Selected</h1>
                <a href="index.php">Select Organization</a>
            </center>
        <?php endif ?>
    </div>
    <!--Container Main end-->
    <?php
    // DELETE ORG
    if (isset($_POST['delORG'])) {
        $id_org = $_POST['id_org'];
        // DELETE MEMBERS FROM THE ORG FIRST TO AVOID ERRORS
        $remove_mem = $mysql->prepare("DELETE FROM orgs_mem WHERE org_id = ?");
        $remove_mem->bind_param('i', $id_org);
        $remove_mem->execute();

        // then proceed to delete the org
        $remove_org = $mysql->prepare("DELETE FROM organization WHERE org_id = ?");
        $remove_org->bind_param('i', $id_org);
        if ($remove_org->execute()) {
            echo '<script>window.location.replace("index.php")</script>';
            $_SESSION["message-type"] = "success";
            $_SESSION["message"] = "Organization Removed";
        } else {
            $_SESSION["message-type"] = "warning";
            $_SESSION["message"] = "Failed to remove!";
            echo '<meta http-equiv="refresh" content="0">';
        }
        $remove_org->close();
    }
    // add members
    if (isset($_POST['addMem'])) {
        $org_id = $org_id_glob;
        $stud_id = $_POST['stud-id'];

        // CHECKING IF THE USER ALREADY EXIST
        $check_members_q = "SELECT * FROM orgs_mem WHERE org_id = $org_id and student_id = $stud_id ";
        $query_check = $mysql->query($check_members_q);

        if (mysqli_num_rows($query_check) > 0) {
            $_SESSION["message-type"] = "warning";
            $_SESSION["message"] = "Member already exist!";
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            // prepare statement with placeholders
            $add_student_org = $mysql->prepare("INSERT INTO orgs_mem (org_id, student_id, position) VALUES (?, ?, 'Member')");
            // bind parameters with values, using data types corresponding to the columns in the table
            $add_student_org->bind_param("ii", $org_id, $stud_id);
            if ($add_student_org->execute()) {
                $_SESSION["message-type"] = "success";
                $_SESSION["message"] = "Member added!";
                echo '<meta http-equiv="refresh" content="0">';
            } else {
                $_SESSION["message-type"] = "warning";
                $_SESSION["message"] = "Failed to add!";
                echo '<meta http-equiv="refresh" content="0">';
            }
            // close prepared statement
            $add_student_org->close();
        }
        $check_mem->close();
    }

    // REMOVE MEMBERS
    if (isset($_POST['removeMem'])) {
        $id_stud = $_POST['id_student'];

        $remove_student = $mysql->prepare("DELETE FROM orgs_mem WHERE student_id = ? ");
        $remove_student->bind_param('i', $id_stud);

        if ($remove_student->execute()) {
            $_SESSION["message-type"] = "success";
            $_SESSION["message"] = "Member removed!";
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            $_SESSION["message-type"] = "success";
            $_SESSION["message"] = "Failed to remove!";
            echo '<meta http-equiv="refresh" content="0">';
        }

        $remove_student->close();
    }
    // LOGOUT
    if (isset($_GET['logout'])) {
        session_destroy();
        echo '<script>window.location.replace("login.php");</script>';
    }
    ?>
    <!-- boostrap 4 bundle with jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
<script>
    const buttons = document.querySelectorAll(".faq-toggle");
    buttons.forEach((button) => {
        button.addEventListener("click", () =>
            button.parentElement.classList.toggle("active")
        );
    });
    $(document).ready(function() {
        $('#addMem').click(function() {
            $('.content-hide').toggle();
            $('.content-show').toggle();
            if ($('.content-hide').is(':visible')) {
                $(this).text('Back');
            } else {
                $(this).text('Add Members');
            }
        });
    });
    $('#search-input').on('input', function() {
        let searchQuery = $(this).val();
        if (searchQuery !== '') { // check if the searchQuery is not empty
            $.ajax({
                url: 'process.php',
                method: 'POST',
                data: {
                    search: searchQuery
                },
                success: function(response) {
                    $('#search-results').html(response); // Update the search results container with the new data
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        } else {
            $('#search-results').html(''); // clear the search results container if the searchQuery is empty
        }
    });

    // alertbox animation
    setTimeout(() => {
        $(".alertBox").hide();
    }, 2000);
</script>
<script src="index.js"></script>