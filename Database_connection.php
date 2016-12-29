<?php

class Database_connection {
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "crud_assignment";
    public $link;
    
    public function __construct() {
        $this->makeconnect();
    }

    public function makeconnect(){
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            echo 'Connection Error! '.$this->link->connect_error;
        } else {
//            echo '<script>window.alert("Database Connected!");</script>';
        }
    }
    
    public function insert($PostedData){
        $error = [];
        if(!empty($PostedData['name'])){
            $name = $PostedData['name'];
        }else{
            $error['name_error'] = "*Name field is empty!";
        }
        if(!empty($PostedData['age'])){
            $age = $PostedData['age'];
        }else{
            $error['age_error'] = "*Age field is empty!";
        }
        if(!empty($PostedData['gender'])){
            $gender = $PostedData['gender'];
        }else{
            $error['gender_error'] = "*Select your gender!";
        }
        if(!empty($PostedData['address'])){
            $address = $PostedData['address'];
        }else{
            $error['address_error'] = "*Address field is empty!";
        }
        
        if(count($error)>0){
            $msg = $error;
            return $msg;
        }else{
            $sql = "INSERT INTO user_info(name,age,gender,address) VALUES ('$name','$age','$gender','$address')";
            $is_insert = $this->link->query($sql);
            if($is_insert){
                $msg = "<script>window.alert('Data Inserted!');</script>";
                return $msg;
            }
        }
    }
    public function update($PostedData){
        $error = [];
        if(!empty($PostedData['name'])){
            $name = $PostedData['name'];
        }else{
            $error['name_error'] = "*Name field is empty!";
        }
        if(!empty($PostedData['age'])){
            $age = $PostedData['age'];
        }else{
            $error['age_error'] = "*Age field is empty!";
        }
        if(!empty($PostedData['gender'])){
            $gender = $PostedData['gender'];
        }else{
            $error['gender_error'] = "*Select your gender!";
        }
        if(!empty($PostedData['address'])){
            $address = $PostedData['address'];
        }else{
            $error['address_error'] = "*Address field is empty!";
        }
        $id = $PostedData['id'];
        if(count($error)>0){
            $msg = $error;
            return $msg;
        }else{
            $sql = "UPDATE user_info SET name = '$name',age = '$age',gender = '$gender',address = '$address' WHERE id = '$id'";
            $is_update = $this->link->query($sql);
            if($is_update){
                header("LOCATION: http://localhost/CombinedLectures/crud_assignment");
            }
        }
    }
    
    public function retrieve(){
        $sql = "SELECT * FROM user_info";
        $result = $this->link->query($sql);
        if($result->num_rows>0){
            return $result;
        }
    }
    
    public function edit($id){
        $sql = "SELECT * FROM user_info WHERE id='$id'";
        $result = $this->link->query($sql);
        if($result->num_rows>0){
            $alldata = $result->fetch_assoc();
            return $alldata;
        }
    }
    
    public function delete($id){
        $sql = "DELETE FROM user_info WHERE id='$id'";
        $is_delete = $this->link->query($sql);
        if($is_delete){
            header("LOCATION: http://localhost/CombinedLectures/crud_assignment");
        }
    }
}
