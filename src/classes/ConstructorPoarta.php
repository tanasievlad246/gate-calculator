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
        "profil_interior_mare" => ['h' => 80, 'w' => 20, "grad_taiere" => 90],

        // Profil element interior
        "profil_interior_mic" => ['h' => 40, 'w' => 20, "grad_taiere" => 90],

        // Profil construire cadru
        "profil_cadru" => ['h' => 40, 'w' => 40, "grad_taiere" => 45],
    ];

    //Returneaza un array cu specificatiile portii pietonale si portii auto
    public function poarta_13(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime): array {
        $inaltime_neta_interior = $inaltime - ($this->profile_orizontale["profil_cadru"]["h"] * 2);
        $distanta_elemente = 50; //Distanta intre elemente in milimetri
        $spatiu_elemente_mici = $inaltime_neta_interior * 0.3; //30% elemente mici
        $spatiu_elemente_mari = $inaltime_neta_interior * 0.7; //70% elemente marii

        $numar_elemente_mici_brut = ($spatiu_elemente_mici / $distanta_elemente) / 2;
        $numar_elemente_mici = round($numar_elemente_mici_brut);

        $numar_elemente_mari_brut = ($spatiu_elemente_mari / $distanta_elemente) / 2;
        $numar_elemente_mari = round($numar_elemente_mari_brut);

        $poarta_pietonala = [
            "latime" => $poarta_pietonala_latime - $this->balamale_poarta_pietonala,
            "inaltime" => $inaltime,
            "numar_profile_cadru" => [
                "verticala" => 2,
                "orizontala" => 2
            ],
            "lungime_elemente_interioare" => $poarta_pietonala_latime - ($this->profile_orizontale["profil_cadru"]["w"] * 2) - $this->balamale_poarta_pietonala,
            "numar_elemente_interioare_mici" => $numar_elemente_mici,
            "numar_elemente_interioare_mari" => $numar_elemente_mari,
            "total_materiale" => [
                "profile_orizontale_cadru" => [
                    "total_material" => ($poarta_pietonala_latime - $this->balamale_poarta_pietonala) * 2,
                    "grad_taiere" => $this->profile_orizontale["profil_cadru"]["grad_taiere"]
                ],
                "profile_verticale_cadru" => [
                    "total_material" => $inaltime * 2,
                    "grad_taiere" => $this->profile_orizontale["profil_cadru"]["grad_taiere"]
                ],
                "elemente_interioare_mici" => [
                    "total_material" => ($poarta_pietonala_latime - $this->balamale_poarta_pietonala - ($this->profile_orizontale["profil_cadru"]["w"] * 2)) * $numar_elemente_mici,
                    "grad_taiere" => $this->profile_orizontale["profil_interior_mic"]["grad_taiere"]
                ],
                "elemente_interioare_mari" => [
                    "total_material" => ($poarta_pietonala_latime - $this->balamale_poarta_pietonala - ($this->profile_orizontale["profil_cadru"]["w"] * 2)) * $numar_elemente_mari,
                    "grad_taiere" => $this->profile_orizontale["profil_interior_mare"]["grad_taiere"]
                ]
            ]
        ];

        $poarta_auto = [
            "latime" => $poarta_auto_latime - $this->balamale_poarta_auto,
            "inaltime" => $inaltime,
            "numar_profile_cadru" => [
                "verticala" => 2,
                "orizontala" => 2
            ],
            "lungime_elemente_interioare" => $poarta_auto_latime - ($this->profile_orizontale["profil_cadru"]["w"] * 2) - $this->balamale_poarta_auto,
            "numar_elemente_interioare_mici" => $numar_elemente_mici,
            "numar_elemente_interioare_mari" => $numar_elemente_mari,
            "total_materiale" => [
                "profile_orizontale_cadru" => [
                    "total_material" => ($poarta_auto_latime - $this->balamale_poarta_auto) * 2,
                    "grad_taiere" => $this->profile_orizontale["profil_cadru"]["grad_taiere"]
                ],
                "profile_verticale_cadru" => [
                    "total_material" => $inaltime * 2,
                    "grad_taiere" => $this->profile_orizontale["profil_cadru"]["grad_taiere"]
                ],
                "elemente_interioare_mici" => [
                    "total_material" => ($poarta_auto_latime - $this->balamale_poarta_auto - ($this->profile_orizontale["profil_cadru"]["w"] * 2)) * $numar_elemente_mici,
                    "grad_taiere" => $this->profile_orizontale["profil_interior_mic"]["grad_taiere"]
                ],
                "elemente_interioare_mari" => [
                    "total_material" => ($poarta_pietonala_latime - $this->balamale_poarta_pietonala - ($this->profile_orizontale["profil_cadru"]["w"] * 2)) * $numar_elemente_mari,
                    "grad_taiere" => $this->profile_orizontale["profil_interior_mare"]["grad_taiere"]
                ]
            ]
        ];

        return [
            "poarta_pietonala" => $poarta_pietonala,
            "poarta_auto" => $poarta_auto,
            "accesorii" => [
                "balamale" => 6,
                "broasca" => 1,
                "maner" => 1,
                "zavor" => 1,
                "contra_placa" => 1
            ],
            "spatiu_intre_elemente" => $distanta_elemente
        ];
    }

    public function poarta_12(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime): array {
        return [];
    }

    public function poarta_2(int $inaltime, int $poarta_pietonala_latime, int $poarta_auto_latime): array {
        return [];
    }
}