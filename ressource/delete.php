<?php include_once '../db.php';

if (isset($_POST['dltbutton'])) {
    $query = 'DELETE FROM ressources WHERE ressource_id = ' . $_POST['id'];
    $result = $db->query($query);
    mysqli_close($db);
    
    if ($result) header('location:../ressource.php');
    else echo 'Error accured in deleting!';
}
