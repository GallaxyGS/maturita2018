<?php include 'header.php' ?>

<?php
$submit = filter_input(INPUT_POST, "submit");
$idAuthor = filter_input(INPUT_GET, "id_author");
$name = filter_input(INPUT_POST, "author_name");
if (isset($submit) && isset($idAuthor)) {
$query = "UPDATE authors SET `author_name` = '$name' WHERE `id_author` = '$idAuthor'";
$vysledek = mysqli_query($connection, $query);
}

elseif(isset($submit)) {
$query = "INSERT INTO `authors` (`author_name`) VALUES ('$name')";
$vysledek = mysqli_query($connection, $query);
echo "Data byla úspěšně uložena do databáze.\n";
}

$name = "Přidáváš";

if(isset($idAuthor)) {
  $query = "SELECT * FROM `authors` WHERE `id_author` = $idAuthor";
  $vysledek = mysqli_query($connection, $query);
  $autor = mysqli_fetch_assoc($vysledek);
  $name = $autor["author_name"];
}

?>

<FORM method="post">
<label for="auhtorname">Název autora:</label>
<input id="auhtorname" type="text" name="author_name" value="<?php echo $name; ?>">
<input type="Submit" name="submit" value="Odeslat">
</FORM>
<?php


?>




<?php include 'footer.php' ?>
