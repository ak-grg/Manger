<?php 
class User {
	private $user;
	private $con;

	public function __construct ($con, $user){
		$this->con = $con;
		$user_details_query = mysqli_query($con,"SELECT * FROM users WHERE user_name = '$user'");
		$this->user = mysqli_fetch_array($user_details_query);
	}

	public function getUsername(){
		return $this->user['user_name'];
	}

	public function getemail(){
		$username = $this->user['user_name'];
		$query = mysqli_query($this->con , "SELECT email FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);
		return $row['email'];
	}

	public function getlocation(){
		$username = $this->user['user_name'];
		$query = mysqli_query($this->con , "SELECT * FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);
		return $row['location'];
	}

	public function getFirstAndLastName(){
		$username = $this->user ['user_name'];
		$query = mysqli_query($this->con , "SELECT first_name, last_name FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}

	public function isClosed(){
		$username = $this->user ['user_name'];
		$query = mysqli_query($this->con,"SELECT user_closed FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);

		if($row['user_closed']=='yes'){
			return true;
		}else{return false;}
	}

	public function getProfilePic(){
		$username = $this->user ['user_name'];
		$query = mysqli_query($this->con , "SELECT profile_pic FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);
		return $row['profile_pic'];
	}

	public function getUserStatus(){
		$username = $this->user ['user_name'];
		$query = mysqli_query($this->con , "SELECT status FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);
		return $row['status'];
	}

	public function getNumOrders(){
		$username = $this->user ['user_name'];
		$query = mysqli_query($this->con , "SELECT num_orders FROM users WHERE user_name = '$username'");
		$row = mysqli_fetch_array($query);
		return $row['num_orders'];
	}


}

?>