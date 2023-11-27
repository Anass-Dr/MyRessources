<?php include_once "../db.php";

function updateUser ($obj) : string {
    $user_role = $obj['user_role'] || 'null';
    $squad_id = $obj['squad_id'] || 'null';

    $sql_query = $obj['query'] === 'add' ? 'INSERT INTO users VALUES (null, "' . $obj['user_name'] . '","' . $obj['user_email'] . '","' . $user_role . '",' . $squad_id . ')'
        : 'UPDATE users SET user_name = "' . $obj['user_name'] . '", user_email = "' . $obj['user_email'] . '", user_role = "' . $obj['user_role'] . '", squad_id = "' . $obj['squad_id'] . '" WHERE user_id = "' . $obj['id'] . '"';
    
    return $sql_query;
}

if (isset($_POST['submit'])) { 
    $result = $db->query(updateUser($_POST));
    mysqli_close($db);

    if ($result) header('location:../index.php');
    else echo 'Operation failed!';
};
