<?php
// protect from XSS attacks with 'htmlspecialchars'
if(isset($_POST['submit'])){
    // echo htmlspeacialchars($_POST['email']);
    // echo htmlspeacialchars($_POST['title']);
    // echo htmlspeacialchars($_POST['ingredients']);

// check email
    if(empty($_POST['email'])){
        echo 'An email is required <br/>';
    }else{
        echo $_POST['email'];
    }
    // check title
    if(empty($_POST['title'])){
        echo 'An title is required <br/>';
    }else{
        echo $_POST['title'];
    }
// check ingredients
if(empty($_POST['ingredients'])){
    echo 'An ingredient is required <br/>';
}else{
    echo $_POST['ingredients'];
}
// end of the POST

}
?>


<!DOCTYPE html>
<html lang='en'>


<?php include('header.php') ?>

<section class="container text-secondary ">
    <h4 class="text-center">Add a Pizza</h4>
    <form class="d-flex flex-column justify-content-center align-items-center p-3 fs-5" action="add.php" method="POST">
        <label>Your Email</label>
        <input type="text" name="email" class="w-50">
        <label>Pizza Title</label>
        <input type="text" name="title" class="w-50">
        <label>Ingredients</label>
        <input type="text" name="ingredients" class="w-50">
        <div class="text-center">
            <input type="submit" name="submit" value="submit" class="m-3 btn bg-warning">
        </div>
    </form>
</section>

<?php include('footer.php') ?>



</html>