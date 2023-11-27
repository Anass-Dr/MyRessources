<?php include_once '../db.php';

if (isset($_POST['dltbutton'])) {
    $query = 'DELETE FROM subcategories WHERE subcategory_id = ' . $_POST['id'];
    $result = $db->query($query);
    mysqli_close($db);
    
    if ($result) header('location:../sub_category.php');
    else echo 'Error accured in deleting!';
}
