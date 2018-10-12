<?php

include ('connect_db.php');

if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $statement=$mysqli->prepare('DELETE from posts WHERE post_id=?');
    $statement->bind_param('i',$id);
    $statement->execute();

    if($statement->affected_rows==1){
        echo "Post deleted successful";
    }

    header("Location: index.php"); //redirect to index.php after success
}

?>