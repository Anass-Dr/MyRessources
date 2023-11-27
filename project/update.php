<?php include_once "../db.php";

function updateCategory ($obj) : string {
    $sql_query = $obj['query'] === 'add' ?
    'INSERT INTO projects VALUES (null, "' . $obj['project_name'] . '", "' . $obj['project_desc'] . '", "' . $obj['project_startdate'] . '", "' . $obj['project_enddate'] . '")'
    : 
    'UPDATE projects SET project_name = "' . $obj['project_name'] . '", project_description = "' . $obj['project_desc'] . '", project_startDate = "' . $obj['project_startdate'] . '", project_endDate = "' . $obj['project_enddate'] . '" WHERE project_id = "' . $obj['id'] . '"';
    
    return $sql_query;
}


if (isset($_POST['submit'])) { 
    updateCategory($_POST);
    $result = $db->query(updateCategory($_POST));
    mysqli_close($db);

    if ($result) header('location:../project.php');
    else echo 'Operation failed!';
};
