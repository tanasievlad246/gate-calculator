<?php
declare(strict_types=1);

class ConstructorPoarta
{
    // Distanta bruta pentru balamale poarta pietonala
    private int $balamale_poarta_pietonala = 90;

    // Distana bruta pentru balamale poarta auto
    private int $balamale_poarta_auto = 130;

    public static function build() {
        #latimea pentru balamale este mereu 90mm in poarta pietonala
        #formula poarta pietonala latimea neta = latimea bruta - 90mm
        #formula pentru balamale = 90 / 2 = 45 stanga/dreapta

        #latime balamale pentru poarta auto este 130mm mereu
        #formula pentru balamale poarta auto -> (latime totala - latime neta = latime pt balamale / 2) = 65 stanga/dreapta
        #latimea neta = latimea totala - 130

        #toate configuratiile sunt specificate in mm

        /*
         * Materiale
         * td40x40x2 -> pentru cadru/rama poarta grad taiere 45 grade
         * td40x20x2 -> pentru elemnte interioare grad taiere 90 grade
         * td80x20x2 -> pentru elemente interioare grad taiere 90 grade
         * element vertical interior poarta 3 12x12mm
         * element orizontal interior poarta 3 30x8mm
         * */
    }

    /*
     * Returns array of materials needed to build the gate
     * */
    private function calculeaza_materiale(int $inaltime, int $width_walking, int $width_auto): array {
        return [];
    }
}