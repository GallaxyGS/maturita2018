<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php $lended = filter_input(INPUT_GET, 'lended') ?>
<?php if ($lended != NULL) {
    echo "<h1>Výpis všech dostupných knih</h1>" ;
} else {echo "<h1>Výpis všech knih</h1>";}


$query = "SELECT books.ean, books.title,authors.name, books.pages_count, genres.name
                      FROM books
                      JOIN book_authors USING (id_book)
                      JOIN authors USING (id_author)
                      JOIN genres USING (id_genre) ";
if ($lended != NULL) {
    $query = $query . "WHERE lended=0";
} echo $query;
$result = mysqli_query($connection, $query);
echo "<br>";
?><table border="2" cellpadding="5" cellspacing="4">
    <tr><td>EAN
        </td><td>Název knihy</td><td>Jméno Autora</td><td>Počet stránek</td><td>Žánr</td></tr> <?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <th> <?php echo $row['ean'] . " "; ?> </th>
            <th> <?php echo $row['title'] . " "; ?> </th>
            <th> <?php echo $row['name'] . " "; ?> </th>
            <th> <?php echo $row['pages_count'] . " "; ?> </th>
            <th> <?php echo $row['name'] . " "; ?> </th>
        </tr> <?php
}
?>
    <?php
    include 'footer.php';
