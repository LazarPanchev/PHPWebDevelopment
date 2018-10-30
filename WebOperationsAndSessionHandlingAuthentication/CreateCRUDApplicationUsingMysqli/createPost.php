<h2>CREATE POST</h2>
<form method="post">
    Post Title: <input type="text" name="title"/><br />
    Post Content: <input type="text" name="content"/><br />
    <input type="submit" value="Create Post">
</form>

<?php
include ('connect_db.php');

if(isset($_POST['title']) && isset($_POST['content'])){
    $title=$_POST['title'];
    $content=$_POST['content'];

    try {
        if($title=='' || $content==''){
            throw new Error('Empty title or content!');
        }
        $date = (new DateTime())->format('Y-m-d H:i:s'); // current date and time

        $statement = $mysqli->prepare('INSERT INTO posts(title,content,date) VALUES(?,?,?)');
        $statement->bind_param("sss", $title, $content, $date);
        $statement->execute();

        if($statement->affected_rows==1){
            echo "Post created successfully";
        }else{
            throw new Error("Error due create Post!");
        }

        header('Location: index.php');  //redirect to index.php after success

    }catch (Error $err){
        echo $err->getMessage();
    }
}





?>