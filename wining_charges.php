	<?php

$sqlsd="SELECT * FROM `game_commission` WHERE id='1' && type='Game' ORDER BY id DESC";
    $runsd=mysqli_query($conn,$sqlsd);

    if(mysqli_num_rows($runsd)<1)
    {
      // header("Location:../");
    }
else{
  
    $count=0;
    while($dataddf=mysqli_fetch_assoc($runsd))
    {
        $count++;
        $winncharges=$dataddf['amount'];
        
    }
}
?>