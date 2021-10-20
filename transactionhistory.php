<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background: url('img/background.jpg');">

<?php
  include 'navbar.php';
?>

	<div  class="c1" style="background:url('img/bg.jpg'); height:90vh;">
	<div class="container" style="background-color:rgb(255, 255, 255, .6); margin-bottom:390px;">
        <h1 class="text-center pt-4" style="color:black;">Transaction History</h1>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr style="color:black;">
                
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transactions";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            
            <td class="py-2"><?php echo $rows['SENDER']; ?></td>
            <td class="py-2"><?php echo $rows['RECEIVER']; ?></td>
            <td class="py-2"><?php echo $rows['AMOUNT']; ?> </td>
            <td class="py-2"><?php echo $rows['DATE_TIME']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
    </div>
        <footer class="text-center mt-5 py-2">
            <p>&copy 2021. Made by <b>Kristen M. Dsouza</b> <br> The Sparks Foundation</p>
        </footer>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>