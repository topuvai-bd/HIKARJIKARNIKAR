	<?php
include("db.php");
$sqlsd="SELECT * FROM `refer_comssion` WHERE id='1' ORDER BY id DESC";
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
        $refercommisions=$dataddf['amount'];
        
    }
}
?>