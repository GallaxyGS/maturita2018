<?php include 'header.php' ?>
<?php $lended = filter_input(INPUT_GET, 'lended') ?>
<?php if ($lended != NULL) {
    echo "<h1>Výpis všech dostupných knih</h1>" ;
} else {echo "<h1>Výpis všech knih</h1>";}


$query = "SELECT books.ean, books.title,authors.name AS authors_name, books.pages_count, genres.name AS genres_name
                      FROM books
                      JOIN book_authors USING (id_book)
                      JOIN authors USING (id_author)
                      JOIN genres USING (id_genre) ";
if ($lended != NULL) {
    $query = $query . "WHERE lended=0";
}
$result = mysqli_query($connection, $query);
echo "<br>";
?><table border="2" cellpadding="5" cellspacing="4">
    <tr><th>EAN
    </th><th>Název knihy</th><th>Jméno Autora</th><th>Počet stránek</th><th>Žánr</th><th>Upravit</th></tr> <?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td> <?php echo $row['ean'] . " "; ?> </td>
            <td> <?php echo $row['title'] . " "; ?> </td>
            <td> <?php echo $row['authors_name'] . " "; ?> </td>
            <td> <?php echo $row['pages_count'] . " "; ?> </td>
            <td> <?php echo $row['genres_name'] . " "; ?> </td>
            <td> <a href="formbooks.php">Upravit</a> </td>
        </tr> <?php
}
?>


<?php include 'footer.php' ?>
