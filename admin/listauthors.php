<?php include 'header.php' ?>

<?php
$query = "SELECT * FROM authors ";
$result = mysqli_query($connection, $query);
echo "<br>";
?>
<table border="2" cellpadding="5" cellspacing="4">
    <tr><th>ID</th><th>Celé Jméno</th><th>Upravit</th></tr> <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?> <tr><td> <?php echo $row['id_author'] . ". "; ?> </td><td> <?php echo $row['author_name']; ?>
        </td><td><a href="./autor/<?php echo $row['id_author']?>">Upravit</a></td></tr> <?php
    }
    ?>
</table>

<a href="./autor/new"><img src="add.png" width="250" height="100"></a></input>


<?php include 'footer.php' ?>
