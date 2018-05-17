<?php include 'header.php' ?>

<?php
$submit = filter_input(INPUT_POST, "submit");
$idBook = filter_input(INPUT_GET, "id_book");
$title = filter_input(INPUT_POST, "title");
$ean = filter_input(INPUT_POST, "ean");
$pages_count = filter_input(INPUT_POST, "pages_count");
$description = filter_input(INPUT_POST, "description");
$genre_name = filter_input(INPUT_POST, "genre_name");
$lended = filter_input(INPUT_POST, "lended");
$author = filter_input(INPUT_POST, "author_name");
$idGenre = filter_input(INPUT_POST, "id_genre");
$idAuthor = filter_input(INPUT_POST, "id_author");

var_dump ($idAuthor);
if (isset($submit) && isset($idBook)) {
$query =
"UPDATE `books` SET
`ean` = '$ean',
`title` = '$title',
`pages_count` = '$pages_count',
`description` = '$description',
`id_genre` = '$idGenre',
`lended` = '$lended'
WHERE `id_book` = '$idBook' "; echo $query; echo $query;
$vysledek = mysqli_query($connection, $query);
$query =
"UPDATE `book_authors` SET
`id_book` = '$idBook',
`id_author` = '$idAuthor'
WHERE `id_book` = '$idBook';"; echo $query;
$vysledek = mysqli_query($connection, $query);}

elseif(isset($submit)) {
$query = "INSERT INTO `books` (`ean`, `title`, `pages_count`, `description`, `genre_name`, `lended`)
VALUES ('$ean', '$title', '$pages_count', '$description', '$genre_name','$lended');";
$vysledek = mysqli_query($connection, $query);
echo "Data byla úspěšně uložena do databáze.";
}

$name = "Přidáváš";
$ean = "";
$pages_count = "";
$description = "Přidáváš";
$genre_name = "";
$lended = ""  ;
$query2 = "SELECT * FROM `genres`";
$vysledek2 = mysqli_query($connection, $query2);
$query3 = "SELECT * FROM `authors`";
$vysledek3 = mysqli_query($connection, $query3);


if(isset($idBook)) {
  $query = "SELECT * FROM `books`b JOIN `book_authors` ba ON b.`id_book`=ba.`id_book` WHERE b.`id_book` = $idBook " ;
  $vysledek = mysqli_query($connection, $query);
  $book = mysqli_fetch_assoc($vysledek);
  $name = $book["title"];
  $ean = $book["ean"];
  $pages_count = $book["pages_count"];
  $description = $book["description"];
  $lended = $book["lended"];
  $id_author = $book["id_book"];


}
?>

<FORM method="post">
<label for="ean">EAN:</label><input id="ean" type="text" name="ean" value="<?php echo $ean; ?>"></br>
<label for="title">Title:</label><input id="title" type="text" name="title" value="<?php echo $name; ?>"></br>
<label for="pages">Pages_count:</label><input id="pages" type="text" name="pages_count" value="<?php echo $pages_count; ?>"></br>
<label for="description">Description:</label><input id="description" type="text" name="description" value="<?php echo $description; ?>"></br>
Genre:<select name="id_genre">
  <?php while($row = mysqli_fetch_assoc($vysledek2)) { ?>
    <option value="<?php echo $row['id_genre']; ?>"<?php if($book['id_genre'] == $row['id_genre']) { ?> selected="selected" <?php }?>><?php
      echo $row['genre_name']; ?>
    </option><?php } ?>
  </select></br>
  Autor:<select name="id_author">
    <?php while($row = mysqli_fetch_assoc($vysledek3  )) { ?>
      <option value="<?php echo $row['id_author']; ?>"
        <?php if($book['id_author'] == $row['id_author']) { ?> selected="selected" <?php }?>><?php
        echo $row['author_name']; ?>
      </option><?php } ;?>
    </select></br>
<label for="lended1">Půjčeno:</label>
<input
  id="lended0"
  type="radio"  name="lended"
  value="1"
  <?php if($book['lended'] == 1) { ?>
    checked="checked"
  <?php } ?>
  >
</br>
<label for="lended">Volné:</label>
<input
  id="lended1"
  type="radio" name="lended"
  value="0"
<?php if($book['lended'] == 0) { ?>
  checked="checked"
 <?php }?>
 >
</br>
<input type="Submit" name="submit" value="Odeslat">
</FORM>
<?php


?>




<?php include 'footer.php';
