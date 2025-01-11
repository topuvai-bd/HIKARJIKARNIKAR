	<?
			 $sql="SELECT * FROM `Sattelment_cahrges` Order BY id DESC";
    $run=mysqli_query($conn,$sql);

    if(mysqli_num_rows($run)<1)
    {
      $amnd= '0';
    }
else{
  
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {
        $count++;
        
        $amnddsvsdsdvsdsdvsdsds=$data['amount'];
    }
}
?>