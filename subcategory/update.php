<?php include_once "../db.php";

function updateCategory ($obj) : string {
    $sql_query = $obj['query'] === 'add' ?
    'INSERT INTO subcategories VALUES (null, "' . $obj['sub_name'] . '", "' . $obj['category_id'] . '")'
    : 
    'UPDATE subcategories SET subcategory_name = "' . $obj['sub_name'] . '", category_id = ' . $obj['category_id'] . ' WHERE subcategory_id = "' . $obj['id'] . '"';
    
    return $sql_query;
}

if (isset($_POST['submit'])) { 
    updateCategory($_POST);
    $result = $db->query(updateCategory($_POST));
    mysqli_close($db);

    if ($result) header('location:../sub_category.php');
    else echo 'Operation failed!';
};
