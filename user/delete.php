<?php include_once '../db.php';

if (isset($_POST['dltbutton'])) {
    echo $_POST['id'];
    echo '<br>';
    $query = 'DELETE FROM users WHERE user_id = ' . $_POST['id'];
    $result = $db->query($query);
    mysqli_close($db);
    
    if ($result) header('location:../index.php');
    else echo 'Error accured in deleting!';
}
