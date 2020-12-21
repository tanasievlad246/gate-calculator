<?php require './src/includes/header.php'; ?>

    <h1>Calculator materiale poarta</h1>

<div>
    <img src="src/public/assets/poarta13.jpg" alt="imagine poarta selectata" id="display_poarta">
    <form action="gate.php" method="post">
        <label>
            <select name="select_poarta" id="select_poarta">
                <option value="poarta13">Model poarta 13</option>
                <option value="poarta12">Model poarta 12</option>
<!--                <option value="poarta2">Model poarta 2</option>-->
            </select>
        </label>
        <label>
            Inaltimea portii
            <input type="text" name="inaltime" placeholder="Inaltime" required>
        </label>
        <label>
            Latimea portii pietonale
            <input type="text" name="latime-pieton" placeholder="Latimea portii pietonale" required>
        </label>
        <label>
            Latimea portii auto
            <input type="text" name="latime-auto" placeholder="Latimea portii auto" required>
        </label>
        <input type="submit" name="calculeaza" value="Calculeaza">
    </form>
</div>

<?php require './src/includes/footer.php'; ?>