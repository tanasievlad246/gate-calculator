<?php require './src/includes/header.php'; ?>

    <h1>Calculator materiale poarta</h1>

    <form action="gate.php" method="post">
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


<?php require './src/includes/footer.php'; ?>