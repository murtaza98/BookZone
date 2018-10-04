<?php
  $query = "SELECT * FROM categories WHERE parent_category_id = 0";

  $query_result = mysqli_query($connection,$query);

  if(!$query_result){
    die("QUERY FAILED ".mysqli_error($connection));
  }else{
?>
<!--accordion div start-->
<div class="panel-group" id="accordion"> 
  <?php  
      $i=0;  
      while($row = mysqli_fetch_assoc($query_result)){
        $i = $i+1;
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
  ?>
  <div class="panel panel-default">
    <div class="panel-heading" style="padding:0">
        <a href="category_index.php?category=<?php echo $category_name;?>"><button class="btn btn-primary" style="width: 100%"><?php echo $category_name;?></button></a>
    </div>
<!--accordion div end-->
  </div>
<?php
    }
  }
?>
</div>