<form method="get">
    Name: <input type="text" name="person" />
    <input type="submit" value="Submit"/>
</form>

<?php
if (isset($_GET['person'])){
    $person=htmlspecialchars($_GET['person']);
    echo "Hello, $person!";
}
?>