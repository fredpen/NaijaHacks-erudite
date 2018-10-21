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
      public function fetchRequests()
      {
         $requestArray = [];
         // fetch all requests id
         $idArray = $this->fetchRequestId();
         // shuffle the id array
         shuffle($idArray);
         // loop and get the details of requests
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
         $sql = "SELECT id FROM farmer";
         $query = mysqli_query($this->con, $sql);
         // push all the ids into an array
         while ($row = mysqli_fetch_array($query)) {
            array_push($idArray, $row['id']);
         }
         return $idArray;
      }

      // fetch all the details of a partcular post in a database
      public function fetchRequestDetails($requestId){

         $sql = "SELECT farmer.id, farmer.userId, farmer.date, farmer.product, farmer.location, farmer.size, farmer.age, farmer.resources, farmer.collateral, farmer.duration, users.firstName, users.lastname, users.contact,  users.category
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

      // fetch a particular author from the database --   // fetch all author if the parameter say all
      public function fetchAuthor ($num) {
         if ($num == "all") {
            $sql = "SELECT * FROM author ORDER BY author";
            $query = mysqli_query($this->con, $sql);
            return $query;
         }else {
            $sql = "SELECT * FROM author ORDER BY author LIMIT $num";
            $query = mysqli_query($this->con, $sql);
            return $query;
         }
      }

      // fetch a particular number of genre from the database  --      // fetch all genre if the parameter say all
      public function fetchGenre ($num)
      {
         if ($num == "all") {
            $sql = "SELECT * FROM genre1 ORDER BY genre1";
            $query = mysqli_query($this->con, $sql);
            return $query;
         }else {
            $sql = "SELECT * FROM genre1 ORDER BY genre1 LIMIT $num";
            $query = mysqli_query($this->con, $sql);
            return $query;

         }
      }

     
      // find the id of a particular genre from the database
      public function genreId($genre)
      {
         $sql = "SELECT id FROM genre1 WHERE genre1='$genre'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query['id'];
      }

      // find the id of a particular author from the database
      public function authorId($author)
      {
         $sql = "SELECT id FROM author WHERE author='$author'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query['id'];
      }


      // query all the quotes that are from a particular author from the database
      public function fetchQuotesFromSameAuthor($author)
      {
       $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
            FROM quotes
               INNER JOIN users ON quotes.user=users.id
               INNER JOIN author ON quotes.author= author.id
               INNER JOIN genre1 ON quotes.genre1=genre1.id
               INNER JOIN genre2 ON quotes.genre2=genre2.id
               INNER JOIN genre3 ON quotes.genre3=genre3.id
            WHERE quotes.author='$author'";

         $query = mysqli_query($this->con, $sql);
         return $query;
      }

      // querry all the quotes from the database with a particular genre
      public function fetchQuotesFromSameGenre($genre)
      {
         // find the id of the author with the name $author
         $sql = "SELECT id FROM genre1 WHERE genre1='$genre'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         $genreId = $query['id'];

         // query all the quotes with the genreId    
         $sql = "SELECT quotes.id, quotes.dt, quotes.content, users.firstname, users.lastname, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
                FROM quotes
                  INNER JOIN users ON quotes.user=users.id
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.genre1='$genreId' OR quotes.genre2='$genreId' OR quotes.genre3='$genreId'";

         $query = mysqli_query($this->con, $sql);
         return $query;
      }

      // fetch the tracked user activities for the profile page
       public function fetchProfileDetails($userId)
      {
         $sql = "SELECT quotes.id, quotes.content, genre1.genre1, genre2.genre2, genre3.genre3, author.author, users.firstname, users.lastname, users.username, users.email, users.gender, users.dt
                 FROM quoteLovers
                  INNER JOIN quotes ON quoteLovers.quote=quotes.id
                  INNER JOIN users  ON quoteLovers.user=users.id
                  INNER JOIN genre1 ON quoteLovers.genre1=genre1.id
                  INNER JOIN genre2 ON quoteLovers.genre2=genre2.id
                  INNER JOIN genre3 ON quoteLovers.genre3=genre3.id
                  INNER JOIN author ON quoteLovers.author=author.id
               WHERE quoteLovers.user='$userId'";

         $query = mysqli_query($this->con, $sql);
         return $query;                      
      }
    
      // fetch the number of quotes a user has liked
      public function numberOfQuoteLoveByUser($userId)
      {      
         $query = $this->fetchProfileDetails($userId);
         $query = mysqli_num_rows($query);
         return $query;
      }


       public function fetchAuthorDetails($authorId)
      {
         $sql = "SELECT * FROM author WHERE id='$authorId'";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
         }

      public function fetchUserDetails($userId)
      {
         $sql = "SELECT * FROM users WHERE id='$userId'";
         $query = mysqli_query($this->con, $sql);
         $query =mysqli_fetch_array($query);
         return $query;
      }

      // fetch all the details of a partcular post in a database
      public function fetchQuoteDetails($quoteId){
          $sql = "SELECT quotes.id, quotes.dt, quotes.content, author.author, genre1.genre1,  genre2.genre2, genre3.genre3
                FROM quotes
                  INNER JOIN author ON quotes.author= author.id
                  INNER JOIN genre1 ON quotes.genre1=genre1.id
                  INNER JOIN genre2 ON quotes.genre2=genre2.id
                  INNER JOIN genre3 ON quotes.genre3=genre3.id
               WHERE quotes.id='$quoteId'";

         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);
         return $query;
      }

      

      // fetch random quote for the quote of the moment 
      public function fetchRandomQuote()
      {
         $idArray = $this->fetchQuoteId();
         // shuffle the array 
         shuffle($idArray);
         $randomId  = $idArray[0];
         return $this->fetchQuoteDetails($randomId);
      }

      // saving users email for subscription purposes
      public function pushEmail($receipientMail)
      {
         $sql = "SELECT email FROM subscriptionEmail";
         $query = mysqli_query($this->con, $sql);
         $query = mysqli_fetch_array($query);

         // check if the users email is not already in the database
         while ($row = ($query['email'])) {
            if ($row !== $receipientMail) {
               // echo $row. " and " . $receipientMail;
               $sql ="INSERT INTO subscriptionEmail VALUES('', '$receipientMail')";
               $query = mysqli_query($this->con, $sql);
            }
         }
      }
   
     
}


 ?>
