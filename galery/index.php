<?php
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    // getting the collection "content" from Galery database
    $query = new MongoDB\Driver\Query([]); 
    $database = $manager->executeQuery("Galery.content",$query);
    $database = $database->toArray();
    // actual time variable for collection "content" updates
    $now = date('Y-m-d H:i:s');

    // create new album
    if(isset($_POST['createAlbum']) && !empty($_POST['nameAlbum'])){
        $query = array(
            "title" => $_POST['nameAlbum'],
            "date_creation" => date('Y-m-d H:i:s'),
            "date_mise_a_jour" => date('Y-m-d H:i:s'),
            "image1" => "",
            "image2" => "",
            "image3" => "",
            "image4" => "",
            "image5" => ""
        );
        $single_insert = new MongoDB\Driver\BulkWrite();
        $single_insert->insert($query);
        $manager->executeBulkWrite("Galery.content", $single_insert);
        header("Refresh:0");
    }

    // delete specific album
    if(isset($_POST['deleteAlbum'])){
        foreach($database as $i=>$d){
            if(!empty($_POST['albumInput'.$i])){
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->delete(['title' => $d->title], ['limit' => 1]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
        }
        header("Refresh:0");
    }

    // add photos in album
    if(isset($_POST['addToAlbum'])){
        foreach($database as $i=>$d){
            if(!empty($_POST['photoInput0']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image1' => $_POST['photoInput0']]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput1']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image2' => $_POST['photoInput1']]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput2']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image3' => $_POST['photoInput2']]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput3']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image4' => $_POST['photoInput3']]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput4']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image5' => $_POST['photoInput4']]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
        }
        header("Refresh:0");
    }

    // delete photos from album
    if(isset($_POST['deleteFromAlbum'])){
        foreach($database as $i=>$d){
            if(!empty($_POST['photoInput0']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image1' => ""]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput1']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image2' => ""]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput2']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image3' => ""]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput3']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image4' => ""]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
            }
            if(!empty($_POST['photoInput4']) && !empty($_POST['albumInput'.$i])){
                // updating photos
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['image5' => ""]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
                // updating update time
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update(['title' => $d->title], ['$set' => ['date_mise_a_jour' => $now]]);
                $result = $manager->executeBulkWrite('Galery.content', $bulk);
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
    <title>Galery Mathieu Pionnier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <div class="container-fluid">
        <h1 class="text-center">Galery MongoDB</h1>
        <h3 class="text-center">How does it work?</h3>
        <p class="text-center">
        1) Create an album by entering a name and clicking on "Create" yellow button. <br>
        2) Add photos into that new album by selecting the photo(s) you want to and the album(s) concerned. Then click on "Add in album" green button.<br>
        3) To delete photo(s) from album(s), do the same as if you want to add pictures but then use the "Delete from album" red button.<br>
        4) To display an album, select it and then click on "Display this album". <br>
        5) You can delete an album by selecting it and then clicking on "Delete this album".
        </p>
            <div class="row">
                <form class="col-md-5 bg-info text-dark" action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center">Photos</h3>
                            <div class="list-group">
                                <?php
                                    $files = glob('photos/*.{jpg,png,gif}', GLOB_BRACE);
                                    $a=0;
                                    foreach($files as $file) {
                                        echo '<a class="list-group-item list-group-item-action">
                                        <input type="checkbox" name="photoInput'.$a.'" value="'.$file.'"> '
                                        .basename($file).'</a>';
                                        $a++;
                                    }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-success mt-2 col" name="addToAlbum">Add in album</button>
                            <button type="submit" class="btn btn-danger mt-1 col" name="deleteFromAlbum">Delete from album</button>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">Albums</h3>
                            <div class="list-group">
                                <?php
                                    foreach($database as $i=>$d){
                                        echo '<a class="list-group-item list-group-item-action">
                                        <input type="checkbox" name="albumInput'.$i.'" value="'.$d->title.'"><b> '
                                        .$d->title.'</b> => '.$d->image1.' '.$d->image2.' '.$d->image3.' '
                                        .$d->image4.' '.$d->image5.' '.'</a>';
                                    }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-success mt-2 col" name="displayAlbum">Display this album</button>
                            <button type="submit" class="btn btn-danger mt-1 col" name="deleteAlbum">Delete this album</button>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="nameAlbum" placeholder="New album name" aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="btn btn-warning col mb-2" name="createAlbum">Create album</button>
                        </div>
                    </div>
                </form>
            <div id="carouselExampleControls" class="carousel slide col-md-7" data-ride="carousel">
            <?php 
                if(isset($_POST['displayAlbum'])){
                    foreach($database as $i=>$d){
                        if(!empty($_POST['albumInput'.$i])){
                            echo '<h3 class="text-center">Carousel = album displayed : "'.$d->title.'"</h3>';
                        }
                    }
                } else {
                    echo '<p>Carousel = select an album and click on display button.</p>';
                }
            ?>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="1000">
                        <img src="photos/default.jpg" class="d-block w-100" alt="default carousel">
                    </div>
                    <?php
                    // displaying carousel
                    if(isset($_POST['displayAlbum'])){
                            foreach($database as $i=>$d){
                                if(!empty($_POST['albumInput'.$i])){
                                    if($d->image1 != ""){
                                        echo '<div class="carousel-item">
                                        <img src="'.$d->image1.'" class="d-block w-100" alt="'.$d->image1.'">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Photo:</h5>
                                            <p>'.$d->image1.'</p>
                                        </div>
                                        </div>';
                                    }
                                    if($d->image2 != ""){
                                        echo '<div class="carousel-item">
                                        <img src="'.$d->image2.'" class="d-block w-100" alt="'.$d->image2.'">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Photo:</h5>
                                            <p>'.$d->image2.'</p>
                                        </div>
                                        </div>';
                                    }
                                    if($d->image3 != ""){
                                        echo '<div class="carousel-item">
                                        <img src="'.$d->image3.'" class="d-block w-100" alt="'.$d->image3.'">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Photo:</h5>
                                            <p>'.$d->image3.'</p>
                                        </div>
                                        </div>';
                                    }
                                    if($d->image4 != ""){
                                        echo '<div class="carousel-item">
                                        <img src="'.$d->image4.'" class="d-block w-100" alt="'.$d->image4.'">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Photo:</h5>
                                            <p>'.$d->image4.'</p>
                                        </div>
                                        </div>';
                                    }
                                    if($d->image5 != ""){
                                        echo '<div class="carousel-item">
                                        <img src="'.$d->image5.'" class="d-block w-100" alt="'.$d->image5.'">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Photo:</h5>
                                            <p>'.$d->image5.'</p>
                                        </div>
                                        </div>';
                                    }
                                }
                            }
                        }
                        ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>