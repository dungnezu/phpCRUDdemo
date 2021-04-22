<?php


class Connection
{
    public $pdo;
    public function __construct()
    {
        try {
            session_start();
            $this->pdo= new PDO('mysql:server=localhost;dbname=crud','root','123456');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }
    public function getStudentList(){
        $sql="select * from students ORDER BY student_id ASC";
        $statement= $this->pdo->prepare($sql);
        $statement->execute();
        //trả về dữ liệu dạng mảng với key là tên cột của bảng trong CSDL
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    public function createStudent($student){
        $statement=$this->pdo->prepare("INSERT INTO students (student_name, email_address,contact, gender,country) VALUES ( :student_name, :email_address,:contact, :gender,:country)");
        $statement->bindValue('student_name',$student['student_name']);
        $statement->bindValue('email_address',$student['email_address']);
        $statement->bindValue('contact',$student['contact']);
        $statement->bindValue('gender',$student['gender']);
        $statement->bindValue('country',$student['country']);

        $result= $statement->execute();
        if($result){
            $_SESSION['message']="Successfully Created Student Info";
            $_SESSION['color']="green";
            header('Location: index.php');
        }else{
            $_SESSION['message']="Failed Created Student Info";
            $_SESSION['color']="red";
            header('Location: index.php');
        }
    }
    public function getStudentById($id){
        $sql="select * from students WHERE student_id=:student_id";

        $statement= $this->pdo->prepare($sql);
        $statement->bindValue('student_id',$id);
        $statement->execute();
        //trả về dữ liệu dạng mảng với key là tên cột của bảng trong CSDL
        return $statement->fetch(PDO::FETCH_ASSOC);

    }
    public function updateStudent($student){
        $statement=$this->pdo->prepare("UPDATE students SET student_name=:student_name,email_address=:email_address,contact=:contact,gender=:gender,country=:country WHERE  student_id=:student_id");
        $statement->bindValue('student_name',$student['student_name']);
        $statement->bindValue('email_address',$student['email_address']);
        $statement->bindValue('contact',$student['contact']);
        $statement->bindValue('gender',$student['gender']);
        $statement->bindValue('country',$student['country']);
        $statement->bindValue('student_id',$student['student_id']);
        $result= $statement->execute();
        if($result){
            $_SESSION['message']="Successfully Updated Student Info";
            $_SESSION['color']="green";
            header('Location: index.php');

        }else{
            $_SESSION['message']="Failed Updated Student Info";
            $_SESSION['color']="red";
            header('Location: index.php');
        }
    }
    public function deleteStudent($student_id){
        $statement=$this->pdo->prepare("DELETE FROM students WHERE student_id=:student_id");
        $statement->bindValue('student_id',$student_id);

        $result= $statement->execute();
        if($result){
            $_SESSION['message']="Successfully Deleted Student Info";
            $_SESSION['color']="green";
            header('Location: index.php');
        }else{
            $_SESSION['message']="Failed Deleted Student Info";
            $_SESSION['color']="red";
            header('Location: index.php');
        }
    }
}
return new Connection();