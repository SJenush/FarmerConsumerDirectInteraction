<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $con=mysqli_connect("localhost","root","","dbfarmerconsumer");
    if(!$con)
    {
        $data=['status'=>-1,'msg'=>"Something went Wrong!",'prob'=>'Connection failed'];
        echo json_encode($data); exit;
    }
    //Check whether get variables are set
    if(!isset($_GET['prod_id'])||!isset($_GET['prod_quant'])||!isset($_GET['prod_price'])||!isset($_GET['user'])){
        $data=['status'=>-1,'msg'=>"Something went Wrong!",'prob'=>'not set'];
        echo json_encode($data); exit;
    }
    $prod_id=$_GET['prod_id'];
    $prod_quant=$_GET['prod_quant'];
    $prod_price=$_GET['prod_price'];

    $user=$_GET['user'];

    //Fetching product details
    $sql="SELECT * FROM products WHERE ProductId='$prod_id'";
    $result=mysqli_query($con,$sql);
    if($result&&mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $prod_name=$row['ProductName'];
        $prod_quantity=$row['ProductQuantity'];
        $farmer_name=$row['FarmerName'];
        $img_path=$row['ProductImgPath'];
        $isCount=$row['isCount'];
        //Check whether quantity exceeds
        if($prod_quant>$prod_quantity){
            $data=['status'=>-1,'msg'=>"Entered Quantity exceeds the available quantity!"];
            echo json_encode($data); exit;
        }else if($prod_quantity==$prod_quant){
            //Remove product from table
            $sql="DELETE FROM products WHERE ProductId='$prod_id'";
            if(mysqli_query($con,$sql)){
                
            }else{
                $data=['status'=>-1,'msg'=>"Something went Wrong!",'prob'=>'cannot delete product'];
                echo json_encode($data); exit;
            }
        }else{
            //Update quantity amount
            $new_quant=$prod_quantity-$prod_quant;
            $sql="UPDATE products SET ProductQuantity='$new_quant' WHERE ProductId='$prod_id'";
            if(mysqli_query($con,$sql)){
                
            }else{
                $data=['status'=>-1,'msg'=>"Something went Wrong!",'prob'=>'cannot update quantity'];
                echo json_encode($data); exit;
            }
        }
        $prod_quant_unit=$prod_quant." kg";
        if($isCount){
            $prod_quant_unit=$prod_quant." count";
        }
        $sql="INSERT INTO cart (Username,ProductName,ProductQuantity,ProductCost,ProductImg,FarmerName) VALUES('$user','$prod_name','$prod_quant_unit','$prod_price','$img_path','$farmer_name')";
        //Insert into cart
        if(mysqli_query($con,$sql)){
            $data=['status'=>1,'msg'=>"Product added to cart!"];
            echo json_encode($data); 
            exit;
        }else{
            $data=['status'=>-1,'msg'=>"Something went Wrong!",'prob'=>'cannot add to cart'];
            echo json_encode($data); exit;
        }
    }else{
        $data=['status'=>-1,'msg'=>"Something went Wrong!",'prob'=>'Product id not found'];
        echo json_encode($data); exit;
    }
    mysqli_close($con);
}

?>