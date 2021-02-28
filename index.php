<?php
	include 'config/db_connect.php';

	//write query for all tasks
	$sql = "SELECT id,title,discription,date FROM the_todo_app ORDER BY date ";

	//make query and get results
	$result = mysqli_query($conn, $sql);

	//fetch result as an array
	$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//free result from memory
	mysqli_free_result($result);

	//close the connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

	<?php include 'templates/header.php'; ?>

	<h4 class="center grey-text">Task cards:</h4>
	<div class="container center">
		<div class="row">
			<?php if($tasks){?>
				<?php foreach($tasks as $task){ ?>

					<div class="col s6 md3">
						<div class="card z-depth-3">
							<div class="card-content center">
								<h5><?php echo htmlspecialchars($task['title']) ?></h5>
								<div><?php echo htmlspecialchars($task['discription']) ?></div>
							</div>
							<div class="card-action bottom-card">
								<p class="red-text"><?php echo htmlspecialchars($task['date']) ?></p> </br>
								<a href="details.php?id=<?php echo $task['id'] ?>" class="brand-text">More info</a>
							</div>
						</div>
					</div>

				<?php } ?>
			<?php } else { ?>
				<h3 class='brand-text'> There is no tasks yet.</h3>
			<?php } ?>
		</div>
	</div>

	<?php include 'templates/footer.php'; ?>
</html>