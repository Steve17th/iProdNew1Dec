<?php
function emptyInputSignUp($name, $email, $password, $repeatpassword){
    // $result;
    if(empty($name) || empty($email) || empty($password) || empty($repeatpassword)){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUserId($email){
    // $result;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result =false;
    }else{
        $result=true;
    }
    return $result;
}

function pwdMatch($password, $repeatpassword){
    // $result;
    if($password !== $repeatpassword){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function emailExists($conn, $name, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ? OR usersName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php/error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $name);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
       $result = false;
       return $result; 
    }

    mysqli_stmt_close($stmt);
}

function passwordStrength($password){
    // Validate password 
    if (strlen($password)<5){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createUser($conn, $name, $email, $password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ? );";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }



    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);

    header("location: ../signup.php?error=none");
    exit();

    mysqli_stmt_close($stmt);
}

function emptyInputLogin($name, $email, $password){
    // $result;
    if(empty($name) || empty($email) || empty($password)){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function loginUser($conn, $name, $email, $password){
    $emailExists = emailExists($conn, $name, $email);

    if($emailExists === false){
        header("location: ../index.php?error=account_not_indexed");
        exit();
    }
 
    $pwdHashed = $emailExists["usersPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false){
        header("location: ../index.php?error=wronglogin");
    }else if ($checkPwd === true){
        session_start();
        $_SESSION["userId"] = $emailExists["usersId"];
        $_SESSION["userEmail"] = $emailExists["usersEmail"];
        $_SESSION["userName"] = $emailExists["usersName"];
        header("location: ../userHome.php");
        exit();
    }
}

function emptyTaskFields($title, $startTime, $endTime){
    // $result;
    if(empty($title) || empty($startTime) || empty($endTime)){
        $result =true;
    }else{
        $result=false;
    }
    return $result;
}

function timeError($startTime, $endTime){
    // $result;

    $timeDiff = date_diff(date_create($startTime),date_create($endTime));
    $diff = $timeDiff ->format('%r%h');//%r to show iff negative
    $dayDiff= $timeDiff ->format('%r%a');
    if($diff <0){
        $result = true;
    }else{
        if($dayDiff <0){
            $result = true;
        }else {
            $result= false;
        }
    }
    return $result;
}

//       // Calculates the difference between DateTime objects
//   $interval = date_diff($datetime1, $datetime2);
 
//   // Printing result in years & months format
//   echo $interval->format('%R%y years %m months');
// 


function createTask($conn, $title, $startTime, $endTime, $taskDescription, $submittable, $userId){
    $sql = "INSERT INTO tasks (taskTitle, startTime, endTime, taskDescription, submittables,  userId) VALUES ( ?, ?, ?, ?, ?, ?);";   
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../newTask.php?error=stmtfailed". mysqli_error($conn));
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssssss", $title, $startTime, $endTime, $taskDescription, $submittable, $userId);
    mysqli_stmt_execute($stmt);
    
    $error=mysqli_error($conn);

    header("location: ../profile.php?task_created".$error);
    exit();
    mysqli_stmt_close($stmt);


    
    
}
// function createTaskDup($conn, $taskId, $userId){
//     $sqlCopyTask = "INSERT INTO alltasks(taskId, userId) VALUES(?, ?);";
//     $stmtC = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmtC, $sqlCopyTask)){
//         header("location: ../newTask.php?error=stmtfailed". mysqli_error($conn));
//         exit();
//     }


//     mysqli_stmt_bind_param($stmtC, "sssss", $title, $userId);
//     mysqli_stmt_execute($stmtC);
    
// }

function deleteTask($conn, $taskID){
    $sqlDelete = "DELETE FROM tasks WHERE taskId = $taskID;";

    // $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt, $sqlDelete)){
    //     header("location: ../viewTask.php?error=stmtfailed". mysqli_error($conn));
    //     exit();
    // }


    // mysqli_stmt_bind_param($stmt, "sssssss", $taskID, $title, $begin, $endTime, $description, $submittable, $userId);
    // mysqli_stmt_execute($stmt);

    mysqli_query($conn, $sqlDelete);
    
}

function refreshComplete($conn, $userId, $taskID){
    $sql = "DELETE FROM complete WHERE userId = $userId;";
    mysqli_query($conn, $sql);
}

function completeTask($conn, $taskID, $title, $userId, $timeCompleted, $timeTaken){
    $sql="INSERT INTO complete (taskId, taskTitle, userId, timeCompleted, timeTaken) VALUES ( ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../viewTask.php?error=stmtfailed". mysqli_error($conn));
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssss", $taskID, $title, $userId, $timeCompleted, $timeTaken);
    mysqli_stmt_execute($stmt);
    
    $error=mysqli_error($conn);
    deleteTask($conn, $taskID);

    echo("<script  type=\"text/javascript\">alert(\"Task Complete!\");</script>");

    header("location: ../userHome.php?task_completed". $error);
    exit();

    mysqli_stmt_close($stmt);   
}

function editTask($conn, $title, $startTime, $endTime, $taskDescription, $submittable, $userId){
    $sql="UPDATE tasks SET taskTitle = '$title', startTime = '$startTime', endTime = '$endTime', taskDescription = '$taskDescription', submittables = '$submittable' WHERE userId = $userId;";
    // $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt, $sql)){
    //     header("location: ../newTask.php?error=stmtfailed". mysqli_error($conn));
    //     exit();
    // }

    // mysqli_stmt_bind_param($stmt, "sssss", $title, $startTime, $endTime, $taskDescription, $submittable);
    // mysqli_stmt_execute($stmt);
    
    // $error=mysqli_error($conn);
    mysqli_query($conn, $sql);

    header("location: ../profile.php?task_edited");
    exit();


}