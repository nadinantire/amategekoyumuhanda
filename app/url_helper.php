<?php

  // Simple page redirect
  function redirect($username,$password,$type){
    
    global $db;
    $page ="";
    $loginPage    = "login";
    $adminPage  = "admin/";
    $instructorPage = "instructor/";
    $studentPage = "student/";
    if ($username == '' || $username == null) {
      $page = $loginPage;
    }else{

      if($password == 'true'){

        switch($type){

          case 1:

            if($db->check("SELECT * FROM `users` WHERE `users`.`phone` = ?",["$username"]) == true){
              $page = $adminPage;
            }
          break;

          case 2:

            if($db->check("SELECT * FROM `users` WHERE `users`.`phone` = ?",["$username"]) == true){
              $page = $instructorPage;
              
            }
          break;

          case 3:
            if($db->check("SELECT * FROM `users` WHERE `users`.`phone` = ?",["$username"]) == true){
              $page = $studentPage;
            }
          break;

          default:

            $page = $loginPage;
          break;

      }
        
      }else{
  
        $page = $homepage;
      }
    }

    header('Location: ' . URLROOT . $page);
  }