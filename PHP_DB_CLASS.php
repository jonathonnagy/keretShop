// -- -------------------------------------------------------------- --
// -- -----------------PHP-MYSQL_CALSS_TO_CONNECTION---------------  --
// -- -------------------------------------------------------------- --


// CONNECTION CLASS
// Create a new PHP file and name it db_connnection.php and save it. Why am I creating a separate database connection file? Because 
// if you have created multiple files in which you want to insert data or select data from the databases, you don’t need to write the code for database connection every time. 
// You just have to include it by using PHP custom function include (include ‘connection.php’) on the top of your code and call its function and use it.


// One of the most important benefits of PDO is the simple and very straightforward database connectivity. Consider the following code snippet that is used to 
// set up connections with the database. Note that when the underlying DBMS changes, the only change that you need to make is the database type.

<?php
Class Connection {
private  $server = "mysql:host=????????;dbname=??????????";
private  $user = "????????";
private  $pass = "????????";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $con;
 
            public function openConnection()
             {
               try
                 {
          $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
          return $this->con;
                  }
               catch (PDOException $e)
                 {
                     echo "There is some problem in connection: " . $e->getMessage();
                 }
             }
public function closeConnection() {
     $this->con = null;
  }
}
?>


// CHECK CONENCTION
<?php
include 'db_connection.php';
 
echo "Connected Successfully";
mysqli_close($conn);




// CREATE TABLE WITH PHP
// FONTOS !!!EZT MÉG ÁT KELL ÍRNI MIUTÁN KI ALAKÍTOTTUK AZ ADATBÁZIS STRUKTURÁT
<?php
include_once 'db_connection.php';
try
{
     $database = new Connection();
     $db = $database->openConnection();
     // sql to create table
     $sql = "CREATE TABLE `Student` ( `ID` INT NOT NULL AUTO_INCREMENT , `name`VARCHAR(40) NOT NULL , `last_ame` VARCHAR(40) NOT NULL , `email` VARCHAR(40)NOT NULL , PRIMARY KEY (`ID`)) ";
     // use exec() because no results are returned
     $db->exec($sql);
     echo "Table Student created successfully";
     $database->closeConnection();
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

