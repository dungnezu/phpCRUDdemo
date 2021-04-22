<?php
$connection= require_once './Connection.php';
    $student=[
            'student_id'=>'',
            'student_name'=>'',
            'email_address'=>'',
            'contact'=>'',
            'gender'=>'',
            'country'=>'',
            'datetime'=>''

    ];

   if(isset($_GET['id'])){
       $student=$connection->getStudentById($_GET['id']);
   }
   if(isset($_POST['update_student'])){
        $connection->updateStudent($_POST);
   }


?>
<?php include './header.php'?>
<div class="container">
    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a>
        <h3>Update Student Info</h3>
        <hr/>
        <form method="post" action="">
            <div class="form-group">
                <label for="student_name">Name:</label>
                <input type="hidden" name="student_id" value="<?php echo $student['student_id'] ?>">
                <input type="text" name="student_name"  class="form-control" required maxlength="50" value="<?php echo $student['student_name'] ?>"/>
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" name="email_address"  required maxlength="50"
                    value="<?php echo $student['email_address']?>"
                >
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact"   maxlength="50"
                    value="<?php echo $student['contact']?>"
                >
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">

                    <option value="" <?php if($student['gender']===null) {echo 'selected';} else {echo '';}  ?> >Select</option>
                    <option value="Male" <?php if($student['gender']==='Male') {echo 'selected';} else {echo '';}  ?>>Male</option>
                    <option value="Female" <?php if($student['gender']==='Female') {echo 'selected';} else {echo '';}  ?> >Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country"  class="form-control"  maxlength="50"
                       value="<?php echo $student['country']?>"
                >
            </div>
            <input type="submit" class="button button-green  pull-right" name="update_student" value="Submit"/>
        </form>
    </div>
</div>
<hr/>
<?php include './footer.php'?>
