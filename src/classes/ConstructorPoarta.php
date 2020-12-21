<?php
declare(strict_types=1);

class ConstructorPoarta
{
    // Distanta bruta pentru balamale poarta pietonala
    private int $balamale_poarta_pietonala = 90;

    // Distana bruta pentru balamale poarta auto
    private int $balamale_poarta_auto = 130;

    // Profile verticale 12x12mm inaltime custom
    private int $profile_verticale = 12;

    // Array profile orizontale
    private array $profile_orizontale = [
        // Profile element interior
        "profil_interior_mare" => ['h' => 80, 'w' => 20, "grad_taiere" => 90, "nume" => "tv80x40x2"],

        // Profil element interior
        "profil_interior_mic" => ['h' => 40, 'w' => 20, "grad_taiere" => 90, "nume" => "tv40x20x2"]
    ];

    //Profil construire cadru
    private array $profil_cadru = ['h' => 40, 'w' => 40, "grad_taiere" => 45, "nume" => "tv40x40x2"];

    public function __construct() {

    }

    //Returneaza un array cu specificatiile portii pietonale si portii auto
    public function poarta12(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime): array {
        $cadru = $this->construieste_cadru($inaltime, $poarta_pietonala_latime, $poarta_auto_latime, $this->profil_cadru);
        $distanta_elemente = $cadru['inaltime_interior'] * 0.03; //Distanta intre elemente in milimetri 3% din inaltimea interioara
        $spatiu_elemente_mici = $cadru['inaltime_interior'] * 0.3; //30% elemente mici
        $spatiu_elemente_mari = $cadru['inaltime_interior'] * 0.7; //70% elemente marii

        $numar_elemente_mici = round(($spatiu_elemente_mici / $distanta_elemente) / 2);
        $numar_elemente_mari = round(($spatiu_elemente_mari / $distanta_elemente) / 2);

        $total_material_elemente = [
            "poarta_auto" => [
                "total_elemente_mici" => $cadru['poarta_auto']['latime_interior'] * $numar_elemente_mici,
                "total_elemente_mari" => $cadru['poarta_auto']['latime_interior'] * $numar_elemente_mari,
            ],
            "poarta_pietonala" => [
                "total_elemente_mici" => $cadru['poarta_pietonala']['latime_interior'] * $numar_elemente_mici,
                "total_elemente_mari" => $cadru['poarta_pietonala']['latime_interior'] * $numar_elemente_mari,
            ]
        ];

        $poarta = [
            "inaltime" => $cadru['inaltime'],
            "poarta_auto" => $cadru['poarta_auto'],
            "poarta_pietonala" => $cadru['poarta_pietonala'],
            "elemente_interioare" => [
                "spec_element_mic" => $this->profile_orizontale['profil_interior_mic'],
                "spec_element_mare" => $this->profile_orizontale['profil_interior_mare'],
                "numar_elemente_interioare_mici" => $numar_elemente_mici,
                "numar_elemente_interioare_mari" => $numar_elemente_mari,
                "spatiu_elemente" => $distanta_elemente,
                "total_material_elemente" => $total_material_elemente
            ]
        ];

        return $poarta;
    }

    public function poarta13(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime): array {
        $cadru = $this->construieste_cadru($inaltime, $poarta_pietonala_latime, $poarta_auto_latime, $this->profil_cadru);

        $distanta_elemente = $cadru['inaltime_interior'] * 0.03; //Distanta intre elemente in milimetri 3% din inaltimea interioara
        $spatiu_elemente_mici = $cadru['inaltime_interior'] * 0.5; //50% elemente mici
        $spatiu_elemente_mari = $cadru['inaltime_interior'] * 0.5; //50% elemente marii

        $numar_elemente_mici = round(($spatiu_elemente_mici / $distanta_elemente) / 2);
        $numar_elemente_mari = round(($spatiu_elemente_mari / $distanta_elemente) / 2);

        $total_material_elemente = [
            "poarta_auto" => [
                "total_elemente_mici" => $cadru['poarta_auto']['latime_interior'] * $numar_elemente_mici,
                "total_elemente_mari" => $cadru['poarta_auto']['latime_interior'] * $numar_elemente_mari,
            ],
            "poarta_pietonala" => [
                "total_elemente_mici" => $cadru['poarta_pietonala']['latime_interior'] * $numar_elemente_mici,
                "total_elemente_mari" => $cadru['poarta_pietonala']['latime_interior'] * $numar_elemente_mari,
            ]
        ];

        $poarta = [
            "inaltime" => $cadru['inaltime'],
            "poarta_auto" => $cadru['poarta_auto'],
            "poarta_pietonala" => $cadru['poarta_pietonala'],
            "elemente_interioare" => [
                "spec_element_mic" => $this->profile_orizontale['profil_interior_mic'],
                "spec_element_mare" => $this->profile_orizontale['profil_interior_mare'],
                "numar_elemente_interioare_mici" => $numar_elemente_mici,
                "numar_elemente_interioare_mari" => $numar_elemente_mari,
                "spatiu_elemente" => $distanta_elemente,
                "total_material_elemente" => $total_material_elemente
            ]
        ];

        return $poarta;
    }

    public function poarta2(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime): array {


        return [];
    }

    private function construieste_cadru(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime, array $cadru): array {
        $inaltime_neta_interior = $inaltime - ($cadru["h"] * 2);
        $latime_neta_pietonala = $poarta_pietonala_latime - $this->balamale_poarta_pietonala;
        $latime_neta_auto = $poarta_auto_latime - $this->balamale_poarta_auto;

        $poarta_pietonala = [
            "latime" => $poarta_pietonala_latime,
            "latime_neta" => $latime_neta_pietonala,
            "latime_interior" => $latime_neta_pietonala - ($cadru['h'] * 2),
            "total_material" => [
                "varticala" => $inaltime * 2,
                "orizontala" => $latime_neta_pietonala * 2
            ]
        ];
        $poarta_auto = [
            "latime" => $poarta_auto_latime,
            "latime_neta" => $latime_neta_auto,
            "latime_interior" => $latime_neta_auto - ($cadru['h'] * 2),
            "latime_poarta" => $latime_neta_auto / 2,
            "total_material" => [
                "varticala" => $inaltime * 2,
                "orizontala" => $latime_neta_auto * 2
            ]
        ];

        return [
            "inaltime" => $inaltime,
            "inaltime_interior" => $inaltime - ($cadru['h'] * 2),
            "numar_profile_cadru" => [
                "verticala" => 2,
                "orizontala" => 2
            ],
            "poarta_pietonala" => $poarta_pietonala,
            "poarta_auto" => $poarta_auto
        ];
    }
}