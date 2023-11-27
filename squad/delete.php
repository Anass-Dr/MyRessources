<?php include_once '../db.php';

if (isset($_POST['dltbutton'])) {
    $query = 'DELETE FROM squads WHERE squad_id = ' . $_POST['id'];
    $result = $db->query($query);
    mysqli_close($db);
    
    if ($result) header('location:../squad.php');
    else echo 'Error accured in deleting!';
}
