<?php
    function customPageHeader(){
    }
?>
<?php include "./templates/header.php"; ?>
<?php 
	if (isset($_GET['notification_id']) && isset($_GET['type']) && isset($_SESSION['username'])) {
		$notification_id = $_GET['notification_id'];
		$type = $_GET['type'];
		$query = "SELECT * FROM notification WHERE notification_id = {$notification_id}";
		$query_result = mysqli_query($connection,$query);
		if(!$query_result){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
			$row =  mysqli_fetch_assoc($query_result);
			$buyer_username = $row['buyer_username'];
			$seller_username = $row['seller_username'];
		}
		switch($type){
            case "acceptOrder":
                $query = "UPDATE notification SET order_status = 'accepted' WHERE notification_id = {notification_id}";
                $message = "'{$seller_username}' has accepted your order";
                $reply_query = "INSERT INTO notification VALUES(NULL,'$buyer_username','$message','Unseen','$seller_username','$date','reply')";
                break;
            case "declineOrder":
                $query = "UPDATE notification SET order_status = 'rejected' WHERE notification_id = {notification_id}";
                $message = "'{$seller_username}' has rejected your order";
                $reply_query = "INSERT INTO notification VALUES(NULL,'$buyer_username','$message','Unseen','$seller_username','$date','reply')";
                break;
            default:
                $query = null;
                break;
        }
        
        
        if($query != null){
            $query_result = mysqli_query($connection,$query); 
            if(!$query_result){
                die("<script>
                        window.location.href = 'notification.php';
                        window.alert('Already bookmarked');
                      </script>");
            }else{
                echo "<script>
                        window.location.href = 'notification.php';
                        window.alert('Added to bookmark');
                      </script>";
            }   
        }
	}
?>