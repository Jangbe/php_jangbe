<?php
$step = 1;

if (isset($_POST['pertama'])) {
    if (empty($_POST['baris']) || empty($_POST['kolom'])) {
        echo '<script>alert("Silahkan isi dulu baris dan kolom nya!")</script>';
    } else {
        $step = 2;
    }
} elseif (isset($_POST['kedua'])) {
    unset($_POST['kedua']);
    $step = 3;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal No 1</title>
</head>

<body>
    <fieldset style="width: 500px">
        <?php if ($step == 1): ?>
            <form action="" method="post">
                <div>
                    <label for="baris">Inputkan jumlah baris: </label>
                    <input type="number" id="baris" name="baris">
                    <span>Contoh: 1</span>
                </div>
                <br>
                <div>
                    <label for="kolom">Inputkan jumlah kolom: </label>
                    <input type="number" id="kolom" name="kolom">
                    <span>Contoh: 3</span>
                </div>
                <br>
                <center>
                    <button name="pertama">Sumbit</button>
                </center>
            </form>
        <?php elseif ($step == 2): ?>
            <form action="" method="post">
                <?php for ($i = 1; $i <= $_POST['baris']; $i++): ?>
                    <div style="display: flex; gap: 5px; margin-bottom: 5px;">
                        <?php for ($j = 1; $j <= $_POST['kolom']; $j++): ?>
                            <div style="display: flex;">
                                <label for="<?= "$i.$j" ?>"><?= "$i.$j" ?>: </label>
                                <input type="text" id="<?= "$i.$j" ?>" name="<?= "$i.$j" ?>">
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
                <center>
                    <button name="kedua">Sumbit</button>
                </center>
            </form>
        <?php elseif ($step == 3): ?>
            <?php foreach ($_POST as $key => $value): ?>
                <b><?= str_replace('_', '.', $key) . ' : ' . $value ?></b> <br>
            <?php endforeach ?>
        <?php endif; ?>
    </fieldset>
</body>

</html>