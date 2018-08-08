<?php
  $query = "SELECT * FROM categories";

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
            <a style="margin:0;width:100%;display:block;color:#fff" class="btn btn-primary panel-title" data-toggle="collapse" data-parent="#accordion" onclick="#collapse<?php echo $i; ?>" href="#collapse<?php echo $i; ?>"><b><?php echo $category_name;   ?></b></a>
        </div>
        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">      <!-- 'in' ---- open a collapse by default-->
          <ul class="list-group">
<?php
          $query = "SELECT * FROM sub_category WHERE category_id = {$category_id}";

          $sub_category_result = mysqli_query($connection,$query);

          if(!$sub_category_result){
            die("QUERY FAILED ".mysqli_error($connection));
          }else{
            $num_rows = mysqli_num_rows($sub_category_result);
            if($num_rows>0){
              while ($sub_category_row = mysqli_fetch_assoc($sub_category_result)) {
                $sub_category_name = $sub_category_row['sub_category_name'];
                echo "<li class='list-group-item text-center'>{$sub_category_name}</li>";
              }
            }else{
              //NO SUB-CATEGORIES PRESENT, SO DISPLAY THE CATEGORY NAME ONE SUBCATEGORY
              echo "<li class='list-group-item text-center'>{$category_name}</li>";
            }
          }
?>
            <!-- <li class="list-group-item">Semester 1</li>
            <li class="list-group-item">Semester 2</li>
            <li class="list-group-item">Semester 3</li>
            <li class="list-group-item">Semester 4</li> -->
          </ul>
        </div>
      </div>

<?php
    }
  }
?>
    <!--accordion div end-->
    </div>
 

<!--
 <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading" style="padding:0">
        <a style="margin:0;width:100%;display:block;color:#fff" class="btn btn-info panel-title" data-toggle="collapse" data-parent="#accordion" onclick="#collapse1" href="#collapse1"><b>Computer Engineering</b></a>
    </div>
    <div id="collapse1" class="panel-collapse collapse">      
      <ul class="list-group">
        <li class="list-group-item">Semester 1</li>
        <li class="list-group-item">Semester 2</li>
        <li class="list-group-item">Semester 3</li>
        <li class="list-group-item">Semester 4</li>
      </ul>
    </div>
  </div>
  
  <div class="panel panel-default">
   <div class="panel-heading" style="padding:0">
        <a style="margin:0;width:100%;display:block;color:#fff" class="btn btn-info panel-title" data-toggle="collapse" data-parent="#accordion" onclick="#collapse2" href="#collapse2"><b>Electrical Engineering</b></a>
    </div>
    <div id="collapse2" class="panel-collapse collapse">      
      <ul class="list-group">
        <li class="list-group-item">Semester 1</li>
        <li class="list-group-item">Semester 2</li>
        <li class="list-group-item">Semester 3</li>
        <li class="list-group-item">Semester 4</li>
      </ul>
    </div>
  </div>
  
  <div class="panel panel-default">
   <div class="panel-heading" style="padding:0">
        <a style="margin:0;width:100%;display:block;color:#fff" class="btn btn-info panel-title" data-toggle="collapse" data-parent="#accordion" onclick="#collapse3" href="#collapse3"><b>Mechanical Engineering</b></a>
    </div>
    <div id="collapse3" class="panel-collapse collapse">      
      <ul class="list-group">
        <li class="list-group-item">Semester 1</li>
        <li class="list-group-item">Semester 2</li>
        <li class="list-group-item">Semester 3</li>
        <li class="list-group-item">Semester 4</li>
      </ul>
    </div>
  </div>
  
  <div class="panel panel-default">
   <div class="panel-heading" style="padding:0">
        <a style="margin:0;width:100%;display:block;color:#fff" class="btn btn-info panel-title" data-toggle="collapse" data-parent="#accordion" onclick="#collapse4" href="#collapse4"><b>Civil Engineering</b></a>
    </div>
    <div id="collapse4" class="panel-collapse collapse">      
      <ul class="list-group">
        <li class="list-group-item">Semester 1</li>
        <li class="list-group-item">Semester 2</li>
        <li class="list-group-item">Semester 3</li>
        <li class="list-group-item">Semester 4</li>
      </ul>
    </div>
  </div>
  
  
</div>
-->
<!-- 'in' ---- open a collapse by default-->
