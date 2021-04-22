<?php
$connection = require_once './Connection.php';
if(isset($_GET['id'])){
    $student=$connection->getStudentById($_GET['id']);
}else{
    header('Location: index.php');
}
?>
<?php include './header.php'?>
<div class="container " >

    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a>
        <h3>View Student Info</h3>
        <hr/>

        <label >Name:</label>
        <?php  if(isset($student['student_name'])){echo $student['student_name']; }?>

        <br/>
        <label>Email address:</label>
        <?php  if(isset($student['email_address'])){echo $student['email_address'];} ?>

        <br/>
        <label >Contact:</label>
        <?php  if(isset($student['contact'])){echo $student['contact'];} ?>
        <br/>
        <label >Gender:</label>
        <?php  if(isset($student['gender'])){echo $student['gender'];} ?>
        <br/>
        <label >Country:</label>
        <?php  if(isset($student['country'])){echo $student['country'];} ?>
        <br/>
        <a href="<?php echo 'updatestudent.php?id='.$student["student_id"] ?>" class="button button-blue">Edit</a>
    </div>
</div>
<hr/>
<?php include './footer.php'?>
