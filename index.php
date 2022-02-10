<html>  
      <head>  
           <title>Insert data from json</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>
   
   .box
   {
    width: 100%;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>  
      <body>  
        <div class="container box">
          <h3 align="center">Imported the following data from JSON File</h3><br />
          <?php
          $connect = mysqli_connect("localhost", "root", "", "user_management_system"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "user_data.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $array = json_decode($data, true); //Convert JSON String into PHP Array
          foreach($array as $row) //Extract the Array Values by using Foreach Loop
          {
           $query .= "INSERT INTO user_info() VALUES ('".$row["name"]."', '".$row["login_details"]."', '".$row["sex"]."', '".$row["date_of_birth"]."', '".$row["contact_information"]."', '".$row["billing_addresses"]."', '".$row["delivery_addresses"]."', '".$row["payment_information"]."', '".$row["order_information"]."', '".$row["tags"]."'); ";  // Make Multiple Insert Query 
           $table_data .= '
            <tr>
               <td>'.$row["name"].'</td>
               <td>'.$row["login_details"].'</td>
               <td>'.$row["sex"].'</td>
               <td>'.$row["date_of_birth"].'</td>
               <td>'.$row["contact_information"].'</td>
               <td>'.$row["billing_addresses"].'</td>
               <td>'.$row["delivery_addresses"].'</td>
               <td>'.$row["payment_information"].'</td>
               <td>'.$row["order_information"].'</td>
               <td>'.$row["tags"].'</td>
           </tr>
           '; //Data for display on Web page
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     echo '<h3></h3><br />';
     echo '
      <table class="table table-bordered">
        <tr>
         <th>Name</th>
         <th>Login Details</th>
         <th>Sex</th>
         <th>Date of Birth</th>
         <th>Contact Information</th>
         <th>Billing Addresses</th>
         <th>Delivery Addresses</th>
         <th>Payment Information</th>
         <th>Order Information</th>
         <th>Tags</th>
        </tr>
     ';
     echo $table_data;  
     echo '</table>';
          }




          ?>
     <br />
         </div>  
      </body>  
 </html>  
 