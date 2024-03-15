<!DOCTYPE html>
<html>
<head>
    <title>Boekenlijst</title>
    <style> 
    .oneven-rij {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ffb3b3;
    }
    </style>
</head>
<body>
    <table>
        <tr>
            <th><strong>Titel</strong></th>
            <th>Auteur</th>
            <th><strong>Jaar</strong></th>
        </tr>
        <?php
        $boeken = [
            "Harry Potter en de Steen der Wijzen" => ["auteur" => "j.k. rowling", "jaar" => 1997],
            "De Hobbit" => ["auteur" => "J.r.r. Tolkien", "jaar" => 1937],
            "Het spel der tronen" => ["auteur" => "George R.R. martin", "jaar" => 1996],
            "1984" => ["auteur" => "George Orwell", "jaar" => 1949],
            "Moord op de Oriënt-Expres" => ["auteur" => "Agatha Christie", "jaar" => 1934],
            "Moby Dick" => ["auteur" => "herman melville", "jaar" => 1851]
        ];

        $boeken["Sjakie en de chocoladefabriek"] = ["auteur" => "Roald Dahl", "jaar" => 1964];
        $boeken["Het leven van een loser zwaar de klos"] = ["auteur" => "Jeff Kinney", "jaar" => 2007];

        function formatName($auteur) {
            $geformatteerdeNaam = strtolower($auteur);

            $woorden = explode(' ', $geformatteerdeNaam);

            foreach ($woorden as &$woord) {
                $initialen = explode('.', $woord);
                if (count($initialen) > 1) {
                    $geformatteerdeInitialen = [];
                    foreach ($initialen as $initiaal) {
                        $geformatteerdeInitialen[] = ucfirst($initiaal);
                    }
                    $woord = implode('. ', $geformatteerdeInitialen);
                } else {
                    $woord = ucfirst($woord);
                }
            }

            $geformatteerdeNaam = implode(' ', $woorden);

            return $geformatteerdeNaam;
        }

        $rijnummer = 0;
        foreach ($boeken as $titel => $info){
            $auteur = $info["auteur"];
            $geformatteerdeNaam = formatName($auteur);
            $rijnummer++;
            $klasse = ($rijnummer % 2 == 0) ? '' : 'oneven-rij';
            echo '<tr class="' . $klasse . '">';
            echo '<td>' . $titel . '</td>';
            echo '<td>' . formatName($info["auteur"]) . '</td>';
            echo '<td>' . $info["jaar"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
