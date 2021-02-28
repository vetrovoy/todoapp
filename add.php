<?php 

	include 'config/db_connect.php';

    $title = $discription = $date = '';
    $errors = ['title' => '', 'discription' => '', 'date' => ''];

	if(isset($_POST['submit'])){

        // check inputs
        if(empty($_POST['title'])){
            $errors['title'] = "A title is required";
        }else {
            $title = $_POST['title'];
        }

        if(empty($_POST['discription'])){
            $errors['discription'] = "A discription is required";
        }else {
            $discription = $_POST['discription'];
        }

        if(empty($_POST['date'])){
            $errors['date'] = "A date is required";
        }else {
            $date = $_POST['date'];
        }

        if(!array_filter($errors)){
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $discription = mysqli_real_escape_string($conn, $_POST['discription']);
            $date = mysqli_real_escape_string($conn, $_POST['date']);

            //create sql
            $sql = "INSERT INTO the_todo_app(title,discription,date) VALUES('$title','$discription', '$date')";

            //save to db and check
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            }else {
                echo 'Query error: ' . mysqli_error($conn);
            }
        }
    } // end of POST check
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add new task</h4>
		<form class="white" action="add.php" method="POST">

			<label>Task title</label>
			<input type="text" name="title" value="<?php echo $title ?>">
            <div class="center"><small class="error"><?php echo $errors['title']; ?></small></div>


            <label>Task discription</label>
			<input type="text" name="discription" value="<?php echo $discription ?>"></input>
            <div class="center"><small class="error"><?php echo $errors['discription']; ?></small></div>


			<label>Task date</label>
			<input type="date" name="date" value="<?php echo $date ?>">
            <div class="center"><small class="error"><?php echo $errors['date']; ?></small></div>

			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>

		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>