<?php
include('config/db_connect.php');
//  write query for all pizzas

// * means all column if not... title,ingredients... (what u need)
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
//  make query and get result

$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
 
// close connection
mysqli_close($conn);

// print_r($pizzas);

// print_r(explode(',', $pizzas[0]['ingredients']));
?>



<!DOCTYPE html>
<html lang='en'>


<?php include('templates/header.php') ?>

<h4 class="titolo text-center text-danger m-4 fs-3">FRESH AND TASTY PIZZA!!!</h4>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) : ?>
        <div class=" col col-sm-6 col-md-3">
            <div class="cardd card g-3 m-3 d-flex flex-column justify content-between align-items-center">
                <img class="card-img-top" src="./templates/image/pizza.png" alt="Card image cap">
                <div class="carddd card-body text-center ">
                    <h5 class="card-title text-center text-danger"><?php echo $pizza['title']?></h5>
                    <ul class="p-0">
                        <?php foreach(explode(',', $pizza['ingredients']) as $ing) :?>
                        <li><?php echo $ing ?></li>

                        <?php endforeach?>
                    </ul>

                    <a href="details.php?id=<?php echo $pizza['id']?>" class="d-flex justify-content-center btn btn-warning">More info</a>
                </div>
                
            </div>
        </div>
        <?php endforeach?>
    </div>
</div>

<?php include('templates/footer.php') ?>



</html>