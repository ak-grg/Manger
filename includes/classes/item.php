<?php

class item {
    private $con;
    private $user_obj;

    public function __construct ($con, $user){
        $this->con = $con;
		$this->user_obj = new User($con, $user);
    }

    public function loadItems(){
		$userLoggedIn = $this->user_obj->getUsername();
        $loc = $this->user_obj->getlocation();

		$str = ""; //String to return 
        $user_det_qry = mysqli_query($this->con, "SELECT * from users where user_name = '$userLoggedIn'");
        $user = mysqli_fetch_array($user_det_qry);
        if($user['num_orders']==1){
		$data_query = mysqli_query($this->con, "SELECT * FROM item WHERE item_loc = '$loc' ORDER BY item_cost DESC");
        }
        elseif($user['num_orders']==0){
            $data_query = mysqli_query($this->con, "SELECT * FROM item WHERE item_loc = '$loc' ORDER BY item_cost ASC");
        }
        elseif($user['num_orders']==2){
            $data_query = mysqli_query($this->con, "SELECT * FROM item WHERE item_loc = '$loc' ORDER BY item_id ASC");
        }


        $count = 1;


        $num_iterations = 0; //Number of results checked (not necasserily posted)

        while($row = mysqli_fetch_array($data_query)){
            $id = $row['item_id'];
            $name = $row['item_name'];
            $cost = $row['item_cost'];
            $pic = $row['item_pic'];

            if($num_iterations++ == 0){
                $str .= "<div class='row'>";
            }


            $str .= "
                    <div class='col-lg-3'>
                        <div class='card'>
                        <img src='$pic' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>$cost</p>
                            <div>
                            <iframe style='width:100%;height: 50px;' src='additem.php?item_id=$id' id = 'orderl_iframe' frameborder='0'></iframe>
                            </div>
                        </div>
                        </div>
                    </div>";

            ?>

            <?php
            
            if($num_iterations == 4){
                $str .= "</div> <div class='row'>";
            }

        }
        //End of while loop
        $str .= "</div> ";

		echo $str ;
	}
}





?>