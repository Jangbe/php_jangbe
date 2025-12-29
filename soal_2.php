<?php

$conn = mysqli_connect("localhost", "root", "", "testdb");

$query = "SELECT hobi.hobi, COUNT(*) as total FROM person JOIN hobi ON person.id = hobi.person_id";

if (!empty($_GET["search"])) {
    $query .= " WHERE hobi.hobi LIKE '%" . mysqli_escape_string($conn, $_GET['search']) . "%'";
}

$query .= " GROUP BY hobi.hobi ORDER BY COUNT(*) DESC";

$reports = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2: Laporan Jumlah Hobi</title>
</head>

<body>
    <form action="" method="get">
        <div>
            <label for="search">Cari berdasarkan hobi: </label>
            <input type="text" id="search" name="search" value="<?= $_GET['search'] ?>">
            <button>Cari</button>
        </div>
    </form>

    <br>

    <table border="1" style="border-collapse: collapse; min-width: 500px;">
        <thead style="text-align: center; font-weight: bold;">
            <tr>
                <td>Hobi</td>
                <td>Jumlah orang</td>
            </tr>
        </thead>
        <tbody>
            <?php while($data = mysqli_fetch_assoc($reports)): ?>
                <tr>
                    <td><?= $data['hobi'] ?></td>
                    <td><?= $data['total'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>