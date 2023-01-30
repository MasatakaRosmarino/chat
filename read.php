<?php
require_once("includes/connection.php");

if(isset($_COOKIE["PHPSESSID"])){
	session_start();
}

$result = $connection->query("SELECT chat.message, user.name, user.id from chat JOIN user ON chat.user_id = user.id ORDER BY insert_date ASC");

$prevName = "";
$customStyle = "";
if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()) {
		echo '<div class="message-box mb-1">
			<div class="pr-1">'; 
			if($row["name"] != $prevName){
				if($row["name"] == $_SESSION["name"]){
					echo '<h3 style="font-family:arial;" class="d-flex flex-row-reverse">ME</h3>';
					$customStyle = "rgb(171, 203, 230)";
				}else{
					echo '<h3>' . $row["name"] . '</h3>';
					$customStyle = "rgb(160, 224, 176)"; 
				}
			}	

			echo '</div>';

			if($row["name"] == $_SESSION["name"]){
				echo '<div class="user-message border border-dark rounded-3 px-3 w-75 float-end" style="background-color:' . $customStyle . '">
						<p class="my-1">' . $row["message"] . '</p>
					</div>
				</div>';
			}else{
				echo '<div class="user-message border border-dark rounded-3 px-3 w-75" style="background-color:' . $customStyle . '">
						<p class="my-1">' . $row["message"] . '</p>
					</div>
				</div>';
			}
		$prevName = $row["name"];
	}
}
