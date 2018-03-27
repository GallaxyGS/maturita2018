<?php include 'header.php' ?>

<?php
$submit = filter_input(INPUT_POST, "submit");
$idBook = filter_input(INPUT_GET, "id_book");
$title = filter_input(INPUT_POST, "title");
$ean = filter_input(INPUT_POST, "ean");
$pages_count = filter_input(INPUT_POST, "pages_count");
$description = filter_input(INPUT_POST, "description");
$id_genre = filter_input(INPUT_POST, "id_genre");
$lended = filter_input(INPUT_POST, "lended");

if (isset($submit) && isset($idBook)) {
$query =
"UPDATE `books` SET
`ean` = $ean,
`title` = $title,
`pages_count` = $pages_count,
`description` = $description,
`id_genre` = $id_genre,
`lended` = $lended
WHERE `id_book` = '$idBook'";
$vysledek = mysqli_query($connection, $query);
}

elseif(isset($submit)) {
$query = "INSERT INTO `books` (`ean`, `title`, `pages_count`, `description`, `id_genre`, `lended`)
VALUES ('$ean', '$title', '$pages_count', '$description', '$id_genre','$lended')";
$vysledek = mysqli_query($connection, $query);
echo "Data byla úspěšně uložena do databáze.\n";
}

$name = "Přidáváš";
$ean = "";
$pages_count = "";
$description = "Přidáváš";
$id_genre = "";
$lended = ""  ;

if(isset($idBook)) {
  $query = "SELECT * FROM `books` WHERE `id_book` = $idBook";
  $vysledek = mysqli_query($connection, $query);
  $book = mysqli_fetch_assoc($vysledek);
  $name = $book["title"];
  $ean = $book["ean"];
  $pages_count = $book["pages_count"];
  $description = $book["description"];
  $id_genre = $book["id_genre"];
  $lended = $book["lended"];


}
?>

<FORM method="post">
<label for="ean">EAN:</label><input id="ean" type="text" name="name" value="<?php echo $ean; ?>"></br>
<label for="title">Title:</label><input id="title" type="text" name="name" value="<?php echo $name; ?>"></br>
<label for="pages">Pages_count:</label><input id="pages" type="text" name="name" value="<?php echo $pages_count; ?>"></br>
<label for="description">Description:</label><input id="description" type="text" name="name" value="<?php echo $description; ?>"></br>
<label for="id_genre">Genre:</label><input id="id_genre" type="text" name="name" value="<?php echo $id_genre; ?>"></br>
<label for="lended">Lended:</label><input id="lended" type="text" name="name" value="<?php echo $lended; ?>"></br>
<input type="Submit" name="submit" value="Odeslat">
</FORM>
<?php


?>




<?php include 'footer.php' ?>
