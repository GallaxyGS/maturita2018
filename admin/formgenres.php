<?php include 'header.php' ?>

<?php
$submit = filter_input(INPUT_POST, "submit");
$idGenre = filter_input(INPUT_GET, "id_genre");
$name = filter_input(INPUT_POST, "name");
if (isset($submit) && isset($idGenre)) {
$query = "UPDATE genres SET `name` = '$name' WHERE `id_genre` = '$idGenre'";
$vysledek = mysqli_query($connection, $query);
}

elseif(isset($submit)) {
$query = "INSERT INTO `genres` (`name`) VALUES ('$name')";
$vysledek = mysqli_query($connection, $query);
echo "Data byla úspěšně uložena do databáze.\n";
}

$name = "Přidáváš";

if(isset($idGenre)) {
  $query = "SELECT * FROM `genres` WHERE `id_genre` = $idGenre";
  $vysledek = mysqli_query($connection, $query);
  $genre = mysqli_fetch_assoc($vysledek);
  $name = $genre["name"];
}

?>

<FORM method="post">
<label for="genrename">Název žánru</label>
<input id="genrename" type="text" name="name" value="<?php echo $name; ?>">
<input type="Submit" name="submit" value="Odeslat">
</FORM>
<?php


?>




<?php include 'footer.php' ?>
