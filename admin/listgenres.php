<?php include 'header.php' ?>

<?php
$query = "SELECT * FROM genres ";
$result = mysqli_query($connection, $query);
echo "<br>";
?>
<table border="2" cellpadding="5" cellspacing="4">
    <tr><th>ID</th><th>Celé Jméno</th><th>Upravit</th></tr> <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?> <tr><td> <?php echo $row['id_genre'] . ". "; ?> </td><td>
          <?php echo $row['genre_name']; ?> </td><td> <a href="./genres/<?php echo $row ['id_genre']?>">Upravit</a></input> </td></tr> <?php

    }
    ?>
</table>

<a href="./genres/new"><img src="add.png" width="250" height="100"></a></input>


<?php include 'footer.php' ?>
