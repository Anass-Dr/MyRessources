<?php include_once '../db.php';

if (isset($_POST['dltbutton'])) {
    $query = 'DELETE FROM projects WHERE project_id = ' . $_POST['id'];
    $result = $db->query($query);
    mysqli_close($db);
    
    if ($result) header('location:../project.php');
    else echo 'Error accured in deleting!';
}
