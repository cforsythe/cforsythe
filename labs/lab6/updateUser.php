<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}
function getUserInfo($userId){
    global $conn;
    $sql = "SELECT * FROM tc_user
            WHERE userId=$userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    
    return $record;
}


if (isset($_GET['userId'])) {
    
    $userInfo = getUserInfo($_GET['userId']);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Updating User Info </h2>

    <fieldset>
        
        <legend> Update User </legend>
        
        <form>
            
            First Name: <input type="text" name="firstName" value="<?=$userInfo['firstName']?>" required /> <br>
            Last Name: <input type="text" name="lastName" value="<?=$userInfo['lastName']?>" required/> <br>
            Email: <input type="text" name="email" value="<?=$userInfo['email']?>"/> <br>
            University Id: <input type="text" name="universityId" value="<?=$userInfo['universityId']?>" required/> <br>
            Phone: <input type="text" name="phone" value="<?=$userInfo['phone']?>" required/> <br>
            Gender: <input type="radio" name="gender" value="F" id="genderF" required/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM"  required/> 
                    <label for="genderM">Male</label><br>
            Role:   <select name="role">
                        <option value=""> Select One </option>
                        <option>Faculty</option>
                        <option>Student</option>
                        <option>Staff</option>
                    </select>
            <br />
            Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="updateUserForm" value="Update User!"/>
        </form>
        
    </fieldset>


    </body>
</html>