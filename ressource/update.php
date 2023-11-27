<?php include_once "../db.php";

function updateCategory ($obj) : string {
    $sql_query = $obj['query'] === 'add' ?
    'INSERT INTO ressources VALUES (null, "' . $obj['ressource_name'] . '", "' . $obj['subcat_id'] . '")'
    : 
    'UPDATE ressources SET ressource_name = "' . $obj['ressource_name'] . '", subcategory_id = ' . $obj['subcat_id'] . ' WHERE ressource_id = "' . $obj['id'] . '"';
    
    return $sql_query;
}

if (isset($_POST['submit'])) { 
    updateCategory($_POST);
    $result = $db->query(updateCategory($_POST));
    mysqli_close($db);

    if ($result) header('location:../ressource.php');
    else echo 'Operation failed!';
};
