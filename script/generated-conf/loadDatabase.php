<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'devis' => '\\App\\Http\\Model\\Map\\DevisTableMap',
      'duree' => '\\App\\Http\\Model\\Map\\DureeTableMap',
      'pays' => '\\App\\Http\\Model\\Map\\PaysTableMap',
      'reservation' => '\\App\\Http\\Model\\Map\\ReservationTableMap',
      'reserver' => '\\App\\Http\\Model\\Map\\ReserverTableMap',
      'souscriptionAssurance' => '\\App\\Http\\Model\\Map\\SouscriptionassuranceTableMap',
      'tarificationContainer' => '\\App\\Http\\Model\\Map\\TarificationcontainerTableMap',
      'typeAssurance' => '\\App\\Http\\Model\\Map\\TypeassuranceTableMap',
      'typeContainer' => '\\App\\Http\\Model\\Map\\TypecontainerTableMap',
      'utilisateur' => '\\App\\Http\\Model\\Map\\UtilisateurTableMap',
      'ville' => '\\App\\Http\\Model\\Map\\VilleTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Devis' => '\\App\\Http\\Model\\Map\\DevisTableMap',
      '\\Duree' => '\\App\\Http\\Model\\Map\\DureeTableMap',
      '\\Pays' => '\\App\\Http\\Model\\Map\\PaysTableMap',
      '\\Reservation' => '\\App\\Http\\Model\\Map\\ReservationTableMap',
      '\\Reserver' => '\\App\\Http\\Model\\Map\\ReserverTableMap',
      '\\Souscriptionassurance' => '\\App\\Http\\Model\\Map\\SouscriptionassuranceTableMap',
      '\\Tarificationcontainer' => '\\App\\Http\\Model\\Map\\TarificationcontainerTableMap',
      '\\Typeassurance' => '\\App\\Http\\Model\\Map\\TypeassuranceTableMap',
      '\\Typecontainer' => '\\App\\Http\\Model\\Map\\TypecontainerTableMap',
      '\\Utilisateur' => '\\App\\Http\\Model\\Map\\UtilisateurTableMap',
      '\\Ville' => '\\App\\Http\\Model\\Map\\VilleTableMap',
    ),
  ),
));
