<?php

# Logic ...... 
##########################################################################################################
require '../helpers/DBConnection.php';
require '../helpers/functions.php';

##########################################################################################################
# Fetch  User Roles 

$sql = "select * from users"; 
$category_id = doQuery($sql);

##########################################################################################################


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // CODE ..... 
    $orderName      = Clean($_POST['orderName']);
    $orderDate      = Clean($_POST['orderDate']);
    $number_orders  = Clean($_POST['number_orders']);
    $totalprice	    = Clean($_POST['totalprice']);
    $customer_id    = Clean($_POST['customer_id']);
    $status         = Clean($_POST['status']);
    $shippingDate   = Clean($_POST['shippingDate']);

    # VALIDATE INPUT ...... 
    $errors = [];

    # Valoidate orderName .... 
    if (!Validate($orderName , 'required')) {      
        $errors['orderName '] = "Field Required";
    }

    # Validate  orderDate... 
    if (!Validate($orderDate, 'required')) {
        $errors['Date'] = "Field Required";
    } elseif (!validate($orderDate, "orderDate")) {
        $errors['Date'] = "Invalid Format";
    }elseif(!validate($date,'FutureDate')){
        $errors['Date'] = "Date Expired";
    }


     # Validate  number_orders 
     if (!Validate($number_orders, 'required')) {      
        $errors['number_orders'] = "Field Required";
       }elseif(!validate($number_orders,"number")){
        $errors['number_orders'] = "Enter number_orders ";
    }



    # Validate  totalprice
      if (!Validate($totalprice, 'required')) {      
        $errors['totalprice'] = "Field Required";
       }elseif(!validate($totalprice,"number")){
        $errors['totalprice'] = "Enter totalprice";
    }



     # Validate  customer_id
     if (!Validate($customer_id, 'required')) {      
        $errors['customer'] = "Field Required";
       }elseif(!validate($customer_id,"number")){
        $errors['customer'] = "Invalid Number Format";
    }

     

    





    # Check errors 
    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        // code ..... 

        $sql = "insert into orders (orderName,orderDate,number_orders,totalprice,customer_id,status,shippingDate) values ('$orderName','$orderDate','$number_orders','$totalprice','$customer_id','$status','$shippingDate')";
         $op  = doQuery($sql);


        if ($op) {  
            $message = ["Message" => "Raw Inserted"];
        } else {
            $message = ["Message" => "Error Try Again"];
        }

        $_SESSION['Message'] = $message;
    }
}

##########################################################################################################





require '../layouts/header.php';

require '../layouts/nav.php';

require '../layouts/sidNav.php';
?>




<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">


            <?php

            PrintMessages('Dashboard / Orders / Create');

            ?>




        </ol>



        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Order Name</label>
                <input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="orderName" placeholder="Enter orderName">
            </div>


            <div class="form-group">
                <label for="exampleInputproductDescription">Order Date</label>
                <input type="date" class="form-control"  id="exampleInputorderDate" aria-describedby="" name="orderDate"> </input>
            </div>

            <div class="form-group">
                <label for="exampleInputquantiy"> number_orders</label>
                <input type="number" class="form-control"  id="exampleInputquantiy" name="number_orders" placeholder="number_orders">
            </div>

             <div class="form-group">
                <label for="exampleInputtotalprice"> totalprice</label>
                <input type="number" class="form-control"  id="exampleInputtotalprice" name="totalprice" placeholder="totalprice">
            </div>


             <div class="form-group">
                <label for="exampleInputproductDescription">status</label>
                <input  class="form-control"  id="exampleInput" aria-describedby="" name="status"> </input>
            </div>

             <div class="form-group">
                <label for="exampleInputproductDescription">shippingDate</label>
                <input type="date" class="form-control"  id="exampleInput" aria-describedby="" name="shippingDate"> </input>
            </div>

            <div class="form-group">
                <label for="exampleInputcustomer_id"> Customer</label>
                <select class="form-control" id="exampleInputcustomer_id" name="customer_id">

                    <?php

                    while ($data = mysqli_fetch_assoc($customer_id)) {

                    ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['userType_id']; ?></option>

                    <?php } ?>

                </select>
            </div>
            

            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>

    </div>
</main>

<?php

require '../layouts/footer.php';

?>