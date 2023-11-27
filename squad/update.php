<?php include_once "../db.php";

function updateCategory ($obj) : string {
    $sql_query = $obj['query'] === 'add' ?
    'INSERT INTO squads VALUES (null, "' . $obj['squad_name'] . '", "' . $obj['project_id'] . '")'
    : 
    'UPDATE squads SET squad_name = "' . $obj['squad_name'] . '", project_id = ' . $obj['project_id'] . ' WHERE squad_id = "' . $obj['id'] . '"';
    
    return $sql_query;
}

if (isset($_POST['submit'])) { 
    updateCategory($_POST);
    $result = $db->query(updateCategory($_POST));
    mysqli_close($db);

    if ($result) header('location:../squad.php');
    else echo 'Operation failed!';
};
