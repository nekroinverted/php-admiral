<!doctype html>
<html lang="en">
  <head>
    <title>Game Machines</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once 'process.php';?>

  <?php 
  
  if(isset($_SESSION['message'])):?>
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
  <?php 
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  
  ?>
  
  
  </div>
  <?php endif ?>

  <div class="container">

  <?php 
  $mysqli = new mysqli('localhost', 'admiral', 'baza', 'admiral_2020_zadatak') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM game_machines") or die($mysqli->error);
  
  
  ?>

  <div class="row justify-content center">
  <<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Serial</th>
        <th>Game type ID</th>
        <th>End date for guarantee</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <?php 
    while($row = $result->fetch_assoc()):
    ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['serial_number']; ?></td>
        <td><?php echo $row['game_type_id']; ?></td>
        <td><?php echo $row['end_of_guarantee_date']; ?></td>
        <td>
        
        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>  
  </table>
  </div>
  <div class="row justify-content-center">
  <form action="process.php" method="post">
  <div class="form-group">
  <label>Name</label>
 <input type="text" name="name"  class="form-control"></input>
 </div>
 <div class="form-group">
 <label>Serial number</label>
 <input type="text" name="serial_number"  class="form-control"></input>
 </div>
 <div class="form-group">
 <label>End date for guarantee</label>
 <input type="date" name="end_of_guarantee_date"  class="form-control"></input>
 </div>
 <div class="form-group">
 <label>Game type ID</label>
 <input type="number" name="game_type_id" class="form-control" min="1" max="5"></input>
 </div>
 <div class="form-group">
 <button type="submit" name="save" class="btn btn-primary">Save</button>
 </div>
 </div>
  </form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
  </body>
</html>