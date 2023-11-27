<?php include_once '../db.php';

if (isset($_POST['dltbutton'])) {
    $query = 'DELETE FROM projectressources WHERE project_id = "' . $_POST['id'] . '" AND ressource_id = ' . $_POST['id2'];
    $result = $db->query($query);
    mysqli_close($db);
    
    if ($result) header('location:../project_ressource.php');
    else echo 'Error accured in deleting!';
}
