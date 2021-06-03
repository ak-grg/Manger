<?php

class orderitem {
    private $con;
    private $user_obj;

    public function __construct ($con, $user){
        $this->con = $con;
		$this->user_obj = new User($con, $user);
    }

    public function loadItems(){
		$userLoggedIn = $this->user_obj->getUsername();

		$str = ""; //String to return
		$data_query = mysqli_query($this->con, "SELECT * FROM orderlist WHERE user_name = '$userLoggedIn' ORDER BY id DESC");
        $num_items = mysqli_num_rows($data_query);

        $count = 1;
        $num_iterations = 0; //Number of results checked (not necasserily posted)

        while($row = mysqli_fetch_array($data_query)){
            $id = $row['item_id'];
            $quantity= $row['item_quantity'];
            $in_query = mysqli_query($this->con, "SELECT * FROM item WHERE item_id = '$id'");
            $rowi = mysqli_fetch_array($in_query);
            $name = $rowi['item_name'];
            $cost = $rowi['item_cost'];
            $pic = $rowi['item_pic'];

            if($num_iterations++ == 0){
                $str .= "<p>$num_items items</p>";
            }


            $str .= "
                    <div class='row item'>
                        <div class='col-4 align-self-center'><img class='img-fluid' src='$pic'></div>
                        <div class='col-8'>
                            <div class='row'><b>₹$cost</b></div>
                            <div class='row text-muted'>$name</div>
                            <div class='row'>Qty:$quantity</div>
                        </div>
                    </div>
                    ";

            ?>
            <?php



        }
        //End of while

		echo $str ;

	}
    public function totalitems(){
		$userLoggedIn = $this->user_obj->getUsername();

		$str = ""; //String to return
		$data_query = mysqli_query($this->con, "SELECT * FROM orderlist WHERE user_name = '$userLoggedIn' ORDER BY id DESC");
        $num_items = mysqli_num_rows($data_query);

        $count = 0;
        $num_iterations = 0; //Number of results checked (not necasserily posted)

        while($row = mysqli_fetch_array($data_query)){
            $id = $row['item_id'];
            $quantity= $row['item_quantity'];
            $in_query = mysqli_query($this->con, "SELECT * FROM item WHERE item_id = '$id'");
            $rowi = mysqli_fetch_array($in_query);
            $cost = $rowi['item_cost'];
            $count = $count + $cost*$quantity;


        }
        //End of while
        echo $count ;
    }

}





?>