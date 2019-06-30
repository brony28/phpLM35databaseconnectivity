<?php
class sensor{
 public $link='';
 function __construct($lm35val){
  $this->connect();
  $this->storeInDB($lm35val);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'lm35') or die('Cannot select the DB');
 }
 
 function storeInDB($lm35val){
  $query = "insert into sensor set lm35val='".$lm35val."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}

if($_GET['lm35val'] != ''){
 $sensor=new sensor($_GET['lm35val']);
}
?>