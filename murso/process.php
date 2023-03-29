<?php
include "config.php";

if (isset($_POST['search'])) {
    $value = $_POST['search'];
    $getSearch = "SELECT * FROM student_information WHERE CONCAT(student_id,firstname,lastname,mi,course,level,gender) LIKE '%$value%'";
    $searchRes = $mysql->query($getSearch);


?>
    <table class="table table-dark table-striped ">
        <thead>
            <tr>
                <th style="display:none">ID</th>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>MI</th>
                <th>Course</th>
                <th>Level</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($searchRes->num_rows > 0) :
                while ($searchRow = $searchRes->fetch_assoc()) : ?>
                    <tr>
                        <td style="display:none"><?= $searchRow['org_id'] ?></td>
                        <td><?= $searchRow['student_id'] ?></td>
                        <td><?= $searchRow['firstname'] ?></td>
                        <td><?= $searchRow['lastname'] ?></td>
                        <td><?= $searchRow['mi'] ?></td>
                        <td><?= $searchRow['course'] ?></td>
                        <td><?= $searchRow['level'] ?></td>
                        <td><?= $searchRow['gender'] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" value="<?= $searchRow['student_id'] ?>" name="stud-id">
                                <button type="submit" class="btn btn-success btn-edit" id="editORG" name="addMem">Add</button>
                            </form>
                            
                        </td>
                    </tr>
                <?php endwhile;
            else : ?>
                <tr>
                    <td colspan="8" style="text-align: center;">No Student Found!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php
} ?>