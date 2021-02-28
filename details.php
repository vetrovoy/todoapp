<?php
    
	include 'config/db_connect.php';

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM the_todo_app WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

// check GET requeest id param
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //write query for the task
        $sql = "SELECT * FROM the_todo_app WHERE id= $id ";

        //make query and get result
        $result = mysqli_query($conn, $sql);

        // //fetch result as an array
        $task = mysqli_fetch_assoc($result);

        // //free result from memory
        mysqli_free_result($result);

        // //close the connection
        mysqli_close($conn);
        
    } else {
        echo 'Get request error:' . mysqli_error($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/header.php'; ?>

	<div class="container center brand-containter">
        <?php if($task): ?>

            <div class="card z-depth-3">
                <div class="card-content center">
                    <h4><?php echo $task['title']; ?></h4>
                    <p class="red-text">at <?php echo $task['date']; ?> </p>
                    <h4>Discription:</h4>
                    <p><?php echo $task['discription']; ?></p>
                    <p class='brand-text created-at'><?php echo 'created at: ' .  date($task['created_at']); ?></p>
                    <!-- delete form -->
                    <form action="details.php" method="POST">
                        <input type="hidden" name='id_to_delete' value='<?php echo $task['id'] ?>'>
                        <input type="submit" name='delete' class='btn brand z-depth-0 ' value="Delete" >
                    </form>
                </div>
            </div>

        <?php else: ?>
            <h5>No such task exists.</h5>
        <?php endif ?>
	</div>


	<?php include 'templates/footer.php'; ?>

</html>


