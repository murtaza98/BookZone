<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<?php
	if(isset($_GET['book_id'])) {
		$bookId = $_GET['book_id'];
		$query = "DELETE FROM bookmark WHERE book_id='$bookId'";
		$query_result = mysqli_query($connection, $query);
		if(!$query_result){
            die('QUERY FAILED '.mysqli_error($connection));
        }else{
        	header('location: index.php');
            echo "<script>
                    window.alert('Removed from bookmark');
                  </script>";
        }
 	}
 ?>
