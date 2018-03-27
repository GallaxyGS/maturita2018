<?php include 'header.php' ?>

<?php
$submit = filter_input(INPUT_POST, "submit");
if ($submit) {

$name = filter_input(INPUT_POST, "name");
$query = "INSERT INTO `authors` (`name`) VALUES ('$name')";
$vysledek = mysqli_query($connection, $query);
echo "Data byla úspěšně uložena do databáze.\n";
}
else {


?>

<FORM method="post" action="http://localhost/maturita2018/admin/formbooks.php">
Jméno autora:<INPUT type="Text" name="name"><br>
<INPUT type="Submit" name="submit" value="Odeslat">
</FORM>
<?php

}

?>



<?php include 'footer.php' ?>
