<?php
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $year="2019"; // default year
    if(isset($_POST["year"]) && !empty($_POST["year"])){ // if we changing the year
        $year = $_POST["year"];
    }

    $query = new MongoDB\Driver\Query([]); // getting the collection from Planning database
    $result = $manager->executeQuery("Planning.dates",$query);
    $result = $result->toArray();

    if(isset($_POST["updateTable"])){ // if we click on update button
        foreach($result as $i=>$r){
            if(!empty($_POST["week".$i])){ // and if there's new changes
                if($_POST["week".$i] != $r->user){                
                    $bulk = new MongoDB\Driver\BulkWrite;
                    $bulk->update(['date' => $r->date], ['$set' => ['user' => $_POST['week'.$i]]]); // edit the current document by using user's key in table 
                    $result = $manager->executeBulkWrite('Planning.dates', $bulk);
                }
            }  
        }
        header("Refresh:0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planning MongoDB Mathieu Pionnier</title>
</head>
<body>
    <div class="container">
        <div>
            <h1 align="center">Planning des corvées  d'épluchage</h1>
        </div>
        <form action="" method="post" align="center">
            <label for="year">Année :</label>
            <select name="year">
                <option value="2019" 
                    <?php 
                        if(!empty($_POST['year']) && $_POST['year'] == "2019"){ 
                            echo "selected" ;
                        } 
                    ?>
                >2019</option>
                <option value="2020" 
                    <?php 
                        if(!empty($_POST['year']) && $_POST['year'] == "2020"){ 
                            echo "selected" ;
                        } 
                    ?> 
                >2020</option>
                <option value="2021" 
                    <?php 
                        if(!empty($_POST['year']) && $_POST['year'] == "2021"){ 
                            echo "selected" ;
                        } 
                    ?>
                >2021</option>
            </select>
            <button type="submit" name="editYear">Changer d'année</button>
            <table border="1" align="center" style="margin-top: 30px;">
                <?php
                    // stats by user
                    $statMathieu = 0;
                    $statRaphael = 0;
                    $statSouleymane = 0;
                    $statQuentin = 0;
                    // planning
                    foreach($result as $i=>$r) {
                        if($i%4 == 0){
                            echo "<tr>";
                        }
                        if($year == "2019"){
                            if($r->year == "2019"){
                                echo "<td>".$r->date;
                                echo "<select autocomplete='off' name='week".$i."'>";
                                if($r->user == "Mathieu"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Souleymane<option>
                                    <option>Quentin<option>";
                                    $statMathieu++;
                                }
                                if($r->user == "Raphaël"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Mathieu<option>
                                    <option>Souleymane<option>
                                    <option>Quentin<option>";
                                    $statRaphael++;
                                }
                                if($r->user == "Souleymane"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Mathieu<option>
                                    <option>Quentin<option>";
                                    $statSouleymane++;
                                }
                                if($r->user == "Quentin"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Souleymane<option>
                                    <option>Mathieu<option>";
                                    $statQuentin++;
                                }
                                echo "</select>";
                                echo"</td>";
                                if($i%4==3) {
                                    echo "</tr>";
                                }
                            }
                        }
                        if($year == "2020"){
                            if($r->year == "2020"){
                                echo "<td>".$r->date;
                                echo "<select autocomplete='off' name='week".$i."'>";
                                if($r->user == "Mathieu"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Souleymane<option>
                                    <option>Quentin<option>";
                                    $statMathieu++;
                                }
                                if($r->user == "Raphaël"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Mathieu<option>
                                    <option>Souleymane<option>
                                    <option>Quentin<option>";
                                    $statRaphael++;
                                }
                                if($r->user == "Souleymane"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Mathieu<option>
                                    <option>Quentin<option>";
                                    $statSouleymane++;
                                }
                                if($r->user == "Quentin"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Souleymane<option>
                                    <option>Mathieu<option>";
                                    $statQuentin++;
                                }
                                echo "</select>";
                                echo"</td>";
                                if($i%4==3) {
                                    echo "</tr>";
                                }
                            }
                        }
                        if($year == "2021"){
                            if($r->year == "2021"){
                                echo "<td>".$r->date;
                                echo "<select autocomplete='off' name='week".$i."'>";
                                if($r->user == "Mathieu"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Souleymane<option>
                                    <option>Quentin<option>";
                                    $statMathieu++;
                                }
                                if($r->user == "Raphaël"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Mathieu<option>
                                    <option>Souleymane<option>
                                    <option>Quentin<option>";
                                    $statRaphael++;
                                }
                                if($r->user == "Souleymane"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Mathieu<option>
                                    <option>Quentin<option>";
                                    $statSouleymane++;
                                }
                                if($r->user == "Quentin"){
                                    echo "<option selected>".$r->user."<option>
                                    <option>Raphaël<option>
                                    <option>Souleymane<option>
                                    <option>Mathieu<option>";
                                    $statQuentin++;
                                }
                                echo "</select>";
                                echo"</td>";
                                if($i%4==3) {
                                    echo "</tr>";
                                }
                            }
                        }   
                    }   
                ?>
            </table>
            <br>
            <button type="submit" name="updateTable">Mettre à jour le planning</button>
        </form>
        <div align="center">
        <h3>Statistiques par ordre croissant</h3>
        <?php
            // stats ordering system
            $usersStatsBis = array(
                "Mathieu" => $statMathieu,
                "Raphaël" => $statRaphael,
                "Souleymane" => $statSouleymane,
                "Quentin" => $statQuentin
            );
            asort($usersStatsBis);
            foreach($usersStatsBis as $i=>$userStats){
                echo $i." : ".$userStats."<br>";
            }
        ?>
        </div>
    </div>
</body>
</html>