<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<h1>Autoři</h1>
<?php
$query = "SELECT * FROM authors ";
$result = mysqli_query($connection, $query);
echo "<br>";
?>
<table border="2" cellpadding="5" cellspacing="4">
    <tr><td>ID</td><td>Celé Jméno</td></tr> <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?> <tr><th> <?php echo $row['id_author'] . ". "; ?> </th><th> <?php echo $row['author_name']; ?> </th></tr> <?php
    }
    ?>
</table>

<?php
include 'footer.php';
