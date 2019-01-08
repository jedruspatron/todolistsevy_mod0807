<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	<title>To Do List</title>
</head
><body>

	<form>
		<h1>TO DO LIST</h1>
		<h2>ADDING TASK</h2>
		<input type="text" placeholder="Write your Task here" id="new-task">
		<button id="addTaskBtn">SUBMIT</button>
	</form>

	<script>
		$("#addTaskBtn").click( () => {
			const newTask =$('#new-task').val();

			$.ajax({
				method : 'GET',
				url : 'app/controllers/add_task.php',
				data : {name : newTask},
			}).done(
				console.log('added task')
			);

		});
	</script>

	<h2>TASK LIST</h2>
	<ul id="taskList">
	<?php
		require_once 'app/controllers/connect.php';
		$sql = "SELECT * FROM tasks";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result) ) { ?>
		
			<li data-id="<?php echo $row['id'] ; ?>"> 
				<?php echo $row['name']. " is task number " . $row['id']; ?>
				<button class="deleteBtn">Delete</button>
			</li>	
		<?php } ?>
	</ul>

	<script>
		$('#taskList').on('click', '.deleteBtn', function() {
			const task_id = $(this).parent().attr('data-id');
			console.log(task_id);
			$.ajax({
				method : 'POST',
				url : 'app/controllers/remove_task.php',
				data : { task_id : task_id }
			}).done(data => {
				$(this).parent().fadeOut();
			});
		});
	</script>



</body>
</html>