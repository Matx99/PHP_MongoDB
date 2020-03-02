<?php
//phpinfo();
try{
    //Connexion à mongodb
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        
    $years = array("2019", "2020", "2021");
    $users = array("Mathieu", "Raphaël", "Souleymane", "Quentin");

    // Randomize $users array
    function getRandomArrayElement($array){
        return $array[array_rand($array)];
    }

    // Adding dates to database
    foreach($years as $year){
        // First monday of the year
        $date =  date("d-m-Y", strtotime("Monday January".$year));
        $query = array(
            "date" => date("d-m-Y", strtotime($date)),
            "year" => date("Y", strtotime($date)),
            "user" => getRandomArrayElement($users)
        );
        $single_insert = new MongoDB\Driver\BulkWrite();
        $single_insert->insert($query);
        $manager->executeBulkWrite("Planning.dates", $single_insert);
        // For each year, we seek for each monday
        while(date("Y", strtotime("Monday next week".$date)) == $year){ // As long as the next monday is still from the current year
            $date = date("d-m-Y", strtotime("Monday next week".$date));
            $query = array(
                        "date" => date("d-m-Y", strtotime($date)),
                        "year" => date("Y", strtotime($date)),
                        "user" =>  getRandomArrayElement($users)
            );
            $single_insert = new MongoDB\Driver\BulkWrite();
            $single_insert->insert($query);
            $manager->executeBulkWrite("Planning.dates", $single_insert);
        }
    }
    echo "Database created. Go on index.php";
} catch (\MongoDB\Driver\Exception\BulkWriteException $e){
    $e->getMessage;
}
?>