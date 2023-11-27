<?php include_once "../db.php";

function updateCategory ($obj) : string {
    $sql_query = $obj['query'] === 'add' ?
    'INSERT INTO projectressources VALUES ("' . $obj['project_id'] . '", "' . $obj['ressource_id'] . '")'
    : 
    'UPDATE projectressources SET project_id = "' . $obj['project_id'] . '", ressource_id = "' . $obj['ressource_id'] . '" WHERE project_id = "' . $obj['id'] . '" AND ressource_id = "' . $obj['id2'] . '"';
    
    return $sql_query;
}


if (isset($_POST['submit'])) { 
    updateCategory($_POST);
    $result = $db->query(updateCategory($_POST));
    mysqli_close($db);

    if ($result) header('location:../project_ressource.php');
    else echo 'Operation failed!';
};
