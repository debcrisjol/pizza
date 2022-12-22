<?php

	include('config/db_connect.php');

	$email = $title = $ingredients = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '');

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

		// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			// create sql
			$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}

	} // end POST check

?>





<!DOCTYPE html>
<html lang='en'>


<?php include('templates/header.php') ?>

<section class="container text-secondary ">
	<h4 class="text-center">Add a Pizza</h4>
	<form class="d-flex flex-column justify-content-center align-items-center p-3 fs-5" action="add.php" method="POST">
		<label>Your Email</label>
		<input type="text" name="email" class="w-50" value="<?php echo $email ?> ">
		<div class="error text-danger"><?php echo $errors['email']; ?></div>
		<label>Pizza Title</label>
		<input type="text" name="title" class="w-50" value="<?php echo $title ?> ">
		<div class="error text-danger"><?php echo $errors['title']; ?></div>
		<label>Ingredients (comma separated)</label>
		<input type="text" name="ingredients" class="w-50" value="<?php echo $ingredients ?> ">
		<div class="error text-danger"><?php echo $errors['ingredients']; ?></div>
		<div class="text-center">
			<input type="submit" name="submit" value="submit" class="m-3 btn bg-warning">
		</div>
	</form>
</section>

<?php include('templates/footer.php'); ?>


</html>