<?php
$con=mysqli_connect("localhost","root","","user_management_system"); //connecting to the local MySQL database named user_management_system
if($con)
{
   $sql="select * from user_info";
   $result=mysqli_query($con,$sql);
   if($result){
       header("Content-Type: JSON");
       $i=0;
       while($row=mysqli_fetch_assoc($result)){
           $response[$i]['Name']=$row['name'];
           $response[$i]['Login Details']=$row['login_details'];
           $response[$i]['Sex']=$row['sex'];
           $response[$i]['Date of Birth']=$row['date_of_birth'];
           $response[$i]['Contact Information']=$row['contact_information'];
           $response[$i]['Billing Addresses']=$row['billing_addresses'];
           $response[$i]['Delivery Addresses']=$row['delivery_addresses'];
           $response[$i]['Payment Information']=$row['payment_information'];
           $response[$i]['Order Information']=$row['order_information'];
           $response[$i]['Tags']=$row['tags'];
           $i++;
       }
       echo json_encode($response,JSON_PRETTY_PRINT);  //encoding the data into json form
   }
}  
else
{
  echo "Database connection failed";
}
?>
