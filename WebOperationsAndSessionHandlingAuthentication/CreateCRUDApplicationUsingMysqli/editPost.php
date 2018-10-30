<h2>EDIT POST</h2>
<form method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    New Title: <input type="text" name="title" /><br />
    New Content: <input type="text" name="content" /><br />
    <input type="submit" value="EditPost">
</form>

<?php

include('connect_db.php');

if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content'])){
    try {
        $id = intval($_POST['id']);
        $title = $_POST['title'];
        $content = $_POST['content'];
        if($title=='' || $content==''){
            throw new Error('Empty title or content!');
        }
        echo $id;
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $statement = $mysqli->prepare('UPDATE posts SET title=?, content=?, `date`=? WHERE post_id=?;');
        $statement->bind_param('sssi', $title, $content, $date, $id);
        $statement->execute();

        if ($statement->affected_rows == 1) {
            echo "Post edited successful";
            header("Location: index.php"); //redirect to index.php after success
        }else{
            throw new Error("Error due create Post!");
        }

    }catch (Error $err){
        echo $err->getMessage();
    }


}




?>