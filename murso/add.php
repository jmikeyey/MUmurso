<?php
include "config.php";
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}
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
    <style>
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

        .container-input {
            position: relative;
        }

        .input {
            width: 300px;
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
            width: 500px;
        }

        @media (max-width: 480px) {
            .input {
                width: 100px;
            }

            .input:focus {
                opacity: 1;
                width: 120px;
            }
        }
    </style>
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
                    <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Organizations</span> </a>
                    <a href="add.php" class="nav_link active"> <i class='bx bxs-plus-circle'></i> <span class="nav_name">Manage Organizations</span> </a>
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
    <div class="content" style="margin-top: 70px;">
        <section class="main-section">
            <div class="top-section">
                <a href="#org-form" style="text-decoration:none;color:white" data-bs-toggle="collapse" aria-expanded="false" aria-controls="org-form">
                    <h4>Add Organization</h4>
                </a>
                <hr style="border: 1px solid white">
            </div>
            <div class="container collapse" id="org-form">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Organization Logo</label>
                        <input class="form-control" type="file" id="formFile" name="add_logo">
                    </div>
                    <div class="mb-3">
                        <label for="org_name" class="form-label">Organization Name</label>
                        <input type="text" class="form-control" name="add_name">
                    </div>
                    <div class="mb-3">
                        <label for="org_desc" class="form-label">Organization Description</label>
                        <textarea class="form-control" id="org_desc" rows="3" name="add_desc"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="org_name" class="form-label">Organization Adviser</label>
                            <input type="text" class="form-control" name="add_adv">
                        </div>
                        <div class="col-md-6">
                            <label for="org_desc" class="form-label">Organization Department</label>
                            <select class="form-control mb-3 form-select-lg" aria-label="Disabled select example" name="add_dept">
                                <option selected>Department Selection</option>
                                <option value="Agriculture and Forestry">Agriculture and Forestry</option>
                                <option value="Arts and Sciences">Arts and Sciences</option>
                                <option value="Business and Management">Business and Management</option>
                                <option value="Criminology">Criminology</option>
                                <option value="Dentistry">Dentistry</option>
                                <option value="Education">Education</option>
                                <option value="Engineering and Technology">Engineering and Technology</option>
                                <option value="Law">Law</option>
                                <option value="Maritime Education">Maritime Education</option>
                                <option value="Medical Technology">Medical Technology</option>
                                <option value="Nursing, Midwifery & Radiologic Technology">Nursing, Midwifery & Radiologic Technology</option>
                                <option value="High School">High School</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="add_date" class="form-label">Creation Date</label>
                        <input type="date" class="form-control" name="add_date" id="add_date">
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_org">Submit</button>
                </form>
            </div>
            <div class="edit-form" style="margin-top:50px">
                <h4>Edit Organization</h4>
                <hr style="border: 1px solid white">
            </div>
            <div class="container">
                <!-- CONTENT OF SEARCH -->
                <form method="POST">
                    <div class="container-input" style="margin-bottom: 20px;">
                        <input type="text" placeholder="Search for an organization" name="search" class="input">
                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                            <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th style="display:none">ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Department</th>
                                <th>Adviser</th>
                                <th>Action</th>
                                <th style="display:none">Filename</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $searchRes = '';
                            if (isset($_POST['search'])) :
                                $value = $_POST['search'];
                                $getSearch = "SELECT * FROM organization WHERE CONCAT(org_name,org_desc,org_dept,org_adviser) LIKE '%$value%' ";
                                $searchRes = $mysql->query($getSearch);
                                if (mysqli_num_rows($searchRes) > 0) :
                                    while ($searchRow = $searchRes->fetch_assoc()) :

                            ?>
                                        <tr>
                                            <td style="display:none"><?= $searchRow['org_id'] ?></td>
                                            <td><?= $searchRow['org_name'] ?></td>
                                            <td><?= $searchRow['org_desc'] ?></td>
                                            <td><?= $searchRow['org_dept'] ?></td>
                                            <td><?= $searchRow['org_adviser'] ?></td>
                                            <td style="display:none"><?= $searchRow['filename'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-edit" id="editORG" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editBTN(this)">Edit</button>
                                                <button type="button" class="btn btn-danger btn-edit" id="deleteORG" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="delBTN(this)">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                else :
                                    ?>
                                    <tr>
                                        <td colspan="8" style="text-align: center;">No Organization Found!</td>
                                    </tr>
                            <?php endif;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!--Container Main end-->
    <!-- EDIT Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <!-- Add your form or input fields here -->
                        <input type="hidden" class="form-control" id="org-id" name="id">
                        <div class="mb-3">
                            <label for="org_name" class="form-label">Organization Name</label>
                            <input type="text" class="form-control" id="names" name="names">
                        </div>
                        <div class="mb-3">
                            <label for="org_desc" class="form-label">Organization Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="org_adv" class="form-label">Organization Adviser</label>
                                <input type="text" class="form-control" id="org_adv" name="org_adv">
                            </div>
                            <div class="col-md-6">
                                <label for="org_dept" class="form-label">Organization Department</label>
                                <select id="org_dept" class="form-control mb-3 form-select-lg" aria-label="Disabled select example" name="org_dept">
                                    <option selected>Department Selection</option>
                                    <option value="Agriculture and Forestry">Agriculture and Forestry</option>
                                    <option value="Arts and Sciences">Arts and Sciences</option>
                                    <option value="Business and Management">Business and Management</option>
                                    <option value="Criminology">Criminology</option>
                                    <option value="Dentistry">Dentistry</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering and Technology">Engineering and Technology</option>
                                    <option value="Law">Law</option>
                                    <option value="Maritime Education">Maritime Education</option>
                                    <option value="Medical Technology">Medical Technology</option>
                                    <option value="Nursing, Midwifery & Radiologic Technology">Nursing, Midwifery & Radiologic Technology</option>
                                    <option value="High School">High School</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="saveEditOrg">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove <span id="span_" style="font-weight:bold;font-style:italic"></span> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="" method="POST">
                        <input type="hidden" name="org_id_delete" id="org_id_delete">
                        <button type="submit" class="btn btn-danger" name="deleteOrg"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- PHP QUERY FOR UPDATE AND DELETE -->
    <?php
    // LOGOUT
    if (isset($_GET['logout'])) {
        session_destroy();
        echo '<script>window.location.replace("login.php");</script>';
    }
    // ADD
    if (isset($_POST['add_org'])) {
        $name = $_POST['add_name'];
        $desc = $_POST['add_desc'];
        $dept = $_POST['add_dept'];
        $adv = $_POST['add_adv'];
        $date = $_POST['add_date'];

        // Get the filename of the uploaded image
        $filename = $_FILES["add_logo"]["name"];
        $tempname = $_FILES["add_logo"]["tmp_name"];
        $folder = "./img/" . $filename;
        // Move the uploaded file to the target directory
        move_uploaded_file($tempname, $folder);
        $add_org = "INSERT INTO organization (filename,org_name,org_desc,org_dept,org_adviser,creation_date) VALUES('$filename','$name','$desc','$dept','$adv','$date')  ";
        // Save the filename in the database
        $add_res = $mysql->query($add_org);

        if ($add_res === true) {
            $_SESSION["message-type"] = "success";
            $_SESSION["message"] = "Organization added!";
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            $_SESSION["message-type"] = "warning";
            $_SESSION["message"] = "Failed to add!";
            echo '<meta http-equiv="refresh" content="0">';
        }
    }

    // UPDATE
    if (isset($_POST["saveEditOrg"])) {
        $id = $_POST["id"];
        $name = $_POST["names"];
        $adviser = $_POST["org_adv"];
        $description = $_POST["description"];
        $dept = $_POST["org_dept"];

        $update_org = $mysql->prepare("UPDATE organization SET org_name = ?, org_desc = ?,org_dept= ?, org_adviser = ?  
                                            WHERE org_id = ?");
        $update_org->bind_param("ssssi", $name, $description, $dept, $adviser, $id);

        if ($update_org->execute()) {
            $_SESSION["message-type"] = "success";
            $_SESSION["message"] = "Update successful!";
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            $_SESSION["message-type"] = "warning";
            $_SESSION["message"] = "Update failed!";
            echo '<meta http-equiv="refresh" content="0">';
        }
        $update_org->close();
    }

    // DELETE QUERY
    if (isset($_POST['deleteOrg'])) {
        $org_id = $_POST['org_id_delete'];

        $delete_org = $mysql->prepare("DELETE FROM organization WHERE org_id = ?");
        $delete_org->bind_param("i", $org_id);

        if ($delete_org->execute()) {
            $_SESSION["message-type"] = "success";
            $_SESSION["message"] = "Organization deleted!";
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            $_SESSION["message-type"] = "warning";
            $_SESSION["message"] = "Delete failed!";
            echo '<meta http-equiv="refresh" content="0">';
        }
        $delete_org->close();
    }

    ?>
    <!-- boostrap 4 bundle with jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="index.js"></script>
<script>
    //edit button
    function editBTN(btn) {
        // Get the row that contains the clicked button
        const row = btn.closest("tr");
        // Get the data from the row
        let id = row.cells[0].textContent;
        let name = row.cells[1].textContent;
        let desc = row.cells[2].textContent;
        let dept = row.cells[3].textContent;
        let adviser = row.cells[4].textContent;

        // transfeering the data in the modal
        $('#org-id').val(id);
        $('#names').val(name);
        $('#description').val(desc);
        $('#org_dept').val(dept);
        $('#org_adv').val(adviser);


    }
    //deete button
    function delBTN(btn) {
        // Get the row that contains the clicked button
        const row = btn.closest("tr");
        console.log(row);
        // Get the data from the row
        let ids = row.cells[0].textContent;
        let name_org = row.cells[1].textContent;
        $('#span_').text(name_org);
        $('#org_id_delete').val(ids);
    }
    // alertbox animation
    setTimeout(() => {
        $(".alertBox").hide();
    }, 2000);
</script>