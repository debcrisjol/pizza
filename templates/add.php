<?php


?>


<!DOCTYPE html>
<html lang='en'>


<?php include('header.php') ?>

<section class="container text-secondary ">
    <h4 class="text-center">Add a Pizza</h4>
    <form class="d-flex flex-column justify-content-center align-items-center p-3 fs-5" action="" method="">
        <label>Your Email</label>
        <input type="text" name="email" class="w-50">
        <label>Pizza Title</label>
        <input type="text" name="title"  class="w-50">
        <label>Ingredients</label>
        <input type="text" name="ingredients"  class="w-50">
        <div class="text-center">
        <input type="submit" name="submit" value="submit" class="m-3 btn bg-warning">
        </div>
    </form>
</section>

<?php include('footer.php') ?>



</html>
