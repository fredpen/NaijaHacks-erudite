<?php

   /**
    *
    */
   class Request
   {
      private $con;
      private $errorArray;

      function __construct($con)
      {

         $this->con = $con;
         $this->errorArray  = array();

      }

      // sanitise requests
      public function sanitiseRequest($request) {
      $request = strip_tags($request);
      $request = str_replace("  ", " ", $request);
      $request = ucfirst($request);
      return $request;
   }

      // upload requests into the database
      public function uploadRequest($purpose, $age, $duration, $collateral, $location, $size, $product, $userId){

         // if not then push the request
         $dt = date("Y-m-d h:i:s");

         $sql = "INSERT INTO farmer VALUES('', '$userId', '$product', '$location', '$size', '$age', '$dt', '$purpose', '$collateral', '$duration')";

         $query = mysqli_query($this->con, $sql);

         if ($query) {
            return true;
         }else {
            return false;

         }
      }

       // upload requests into the database
      public function uploadInvestment($purpose, $duration, $userId){

         // if not then push the request
         $dt = date("Y-m-d h:i:s");

         $sql = "INSERT INTO investor VALUES('', '$userId', '$dt', '$purpose', '$duration')";

         $query = mysqli_query($this->con, $sql);

         if ($query) {
            return true;
         }else {
            return false;

         }
      }
      // fetch all the requests from the database
      public function fetchinvest()
      {
         $sql = "SELECT id FROM investor";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
      }


      // fetch all the requests from the database
      public function fetchRequests()
      {
         $requestArray = [];
         $idArray = $this->fetchRequestId();
         foreach ($idArray as $requestId) {
            array_push($requestArray, $this->fetchRequestDetails($requestId));
         }
         // return the array that has the shuffled requests
         return $requestArray;
      }


      // fetching the id of all requests in the database
       public function fetchRequestId()
      {
         $idArray = [];
         $sql = "SELECT id FROM farmer LIMIT 6";
         $query = mysqli_query($this->con, $sql);
         // push all the ids into an array
         while ($row = mysqli_fetch_array($query)) {
            array_push($idArray, $row['id']);
         }
         return $idArray;
      }

      // fetch all the details of a partcular post in a database
      public function fetchRequestDetails($requestId){

         $sql = "SELECT farmer.id, farmer.userId, farmer.date, farmer.product, farmer.location, farmer.size, farmer.age, farmer.resources, farmer.collateral, farmer.duration, users.firstName, users.image,users.lastname, users.contact, users.email, users.category
                   FROM farmer
                    INNER JOIN users ON farmer.userId= users.id
                        WHERE farmer.id='$requestId'";

         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
      }


      public function requestDetails($requestId)       {
         # code...
      }
// ------------------------useful-----------------------------------------


}


 ?>
