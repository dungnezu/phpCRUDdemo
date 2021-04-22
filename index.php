<?php
$connection= require_once './Connection.php';

$students=$connection->getStudentList();

?>
<?php include './header.php'?>
<div class="container">
    <div class="row content">
        <h3>Student list</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert' style='background:" .$_SESSION['color']."'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <a href="createstudent.php" class="button button-purple mt-12 pull-right">Create Student</a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Gender</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <th scope="row"><?php echo $student['student_id'];?></th>
                <td><?php echo $student['student_name'];?></td>
                <td><?php echo $student['email_address'];?></td>
                <td><?php echo $student['contact'];?></td>
                <td><?php echo $student['gender'];?></td>
                <td> <a  href="<?php echo 'deletestudent.php?id=' . $student["student_id"] ?>" class="button button-red">Delete</a></td>
                <td><a  href="<?php echo 'updatestudent.php?id=' . $student["student_id"] ?>" class="button button-blue">Edit</a></td>
                <td><a href="<?php echo 'read-student-info.php?id=' . $student["student_id"] ?>" class="button button-green">View</a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include './footer.php'?>
