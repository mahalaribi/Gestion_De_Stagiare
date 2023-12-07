<style>
  .label1
  {
    margin-left:15px;
    color:black;
  }
</style>
    <?php
    include("connexion.php"); 
    if(isset($_POST['request']))
    {
     $option = $_POST['request'];
     $sql="SELECT * from user where id_user=' $option '";
         $result = mysqli_query($conx,$sql);
    }
   ?>
   <?php 
    if(mysqli_num_rows($result) > 0) {
      while($row = $result->fetch_assoc())    
      {
    
    echo"
    <img class='rounded-circle'style='margin-left:50px;margin-top:10px;max-width:200px;max-height:200px;margin-bottom:px;' id='img' src='$row[image]'>"
    
    ;
}
}
    ?>
 