<?php include_once "../db.php";

function updateCategory ($obj) : string {
    $sql_query = $obj['query'] === 'add' ?
    'INSERT INTO categories VALUES (null, "' . $obj['category_name'] . '")'
    : 
    'UPDATE categories SET category_name = "' . $obj['category_name'] . '" WHERE category_id = "' . $obj['id'] . '"';
    
    return $sql_query;
}

if (isset($_POST['submit'])) { 
    $result = $db->query(updateCategory($_POST));
    mysqli_close($db);

    if ($result) header('location:../category.php');
    else echo 'Operation failed!';
};
