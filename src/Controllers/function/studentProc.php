<?php 
//get all STUDENT 
function getAllstudent($db) {

    
    $sql = 'Select * FROM student '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get STUDENT by id 
function getstudent($db, $studentId) {

    $sql = 'Select o.studentID, o.studentName, o.studentEmail, o.studentPhone, o.studentIntake FROM student o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $studentId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new STUDENT 
function createstudent($db, $form_data) { 
    //stop at sisni
    $sql = 'Insert into student ( studentID, studentName, studentEmail, studentPhone, studentIntake)'; 
    $sql .= 'values (:studentID, :studentName, :studentEmail, :studentPhone, :studentIntake)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':studentID', $form_data['studentID']);  
    $stmt->bindParam(':studentName', ($form_data['studentName']));
    $stmt->bindParam(':studentEmail', ($form_data['studentEmail']));
    $stmt->bindParam(':studentPhone', ($form_data['studentPhone']));
    $stmt->bindParam(':studentIntake', ($form_data['studentIntake']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete STUDENT by id 
function deletestudent($db,$studentId) { 

    $sql = ' Delete from student where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$studentId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update STUDENT by id 
function updatestudent($db,$form_dat,$studentId) { 

    
    $sql = 'UPDATE student SET studentID = :studentID, studentName = :studentName , studentEmail = :studentEmail , studentPhone = :studentPhone , studentIntake = :studentIntake'; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$studentId;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':studentID', $form_dat['studentID']);    
    $stmt->bindParam(':studentName', ($form_dat['studentName']));
    $stmt->bindParam(':studentEmail', ($form_dat['studentEmail']));
    $stmt->bindParam(':studentPhone', ($form_dat['studentPhone']));
    $stmt->bindParam(':studentIntake', ($form_dat['studentIntake']));
    $stmt->execute(); 
}