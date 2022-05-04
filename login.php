<?php 
session_start();
        if(isset($_POST['Username'])){
				//connection
                  include("connection.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = md5($_POST['Password']);

                  echo $Username;
                  echo $Password;
				//query 
                  $sql="SELECT * FROM user Where Username='".$Username."' and Password='".$Password."' ";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["ID"];
                      $_SESSION["User"] = $row["Username"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];
                      $_SESSION["Depratment"] = $row["Depratment"];

                      echo $_SESSION["Userlevel"];
                      	

                      if($_SESSION["Userlevel"]){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        if($_SESSION["Userlevel"] == "Z"){
                          Header("Location: addmin.php");
                        }else{

                        Header("Location: index.php");

                      }
                    }

                    
                      

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: formlogin.php"); //user & password incorrect back to login again

        }
?>