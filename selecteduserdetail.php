<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['sno'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where sno=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where sno=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Cannot enter a negative value")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['BALANCE']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Cannot enter Zero as Amount')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['BALANCE'] - $amount;
                $sql = "UPDATE users set BALANCE=$newbalance where SNO=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['BALANCE'] + $amount;
                $sql = "UPDATE users set BALANCE=$newbalance where SNO=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['NAME'];
                $receiver = $sql2['NAME'];
                $sql = "INSERT INTO transactions(`SENDER`, `RECEIVER`, `AMOUNT`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Sent');
                                     window.location='transfermoney.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <style type="text/css">
        .label{
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
 
<?php
  include 'navbar.php';
?>
<div  style="background:url('img/background.jpg');">
	<div class="container" style="background-color:rgb(255, 255, 255, .6);">
        <h1 class="text-center pt-4" style="color:black;">Transaction Details</h1>
            <?php
                include 'config.php';
                $sid=$_GET['sno'];
                $sql = "SELECT * FROM  users where sno =$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['SNO'] ?></td>
                    <td class="py-2"><?php echo $rows['NAME'] ?></td>
                    <td class="py-2"><?php echo $rows['EMAIL'] ?></td>
                    <td class="py-2"><?php echo $rows['PH_NO'] ?></td>
                    <td class="py-2"><?php echo $rows['BALANCE'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label class="label">Transfer Money To</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['sno'];
                $sql = "SELECT * FROM users where SNO !=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['SNO'];?>" >
                
                    <?php echo $rows['NAME'] ;?> (Balance: 
                    <?php echo $rows['BALANCE'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            </select>
            <div>
        <br>
        <br>
            <label class="label">Enter Amount</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
                 </div>
        </form>
        <br>
        <br>
    </div>
        <footer class="text-center mt-5 py-2">
            <p>&copy 2021. Made by <b>Kristen M. Dsouza</b> <br> The Sparks Foundation</p>
        </footer>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>