<?php
/**
*Session Class
**/
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function get($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

 public static function checkSession(){
  self::init();
  if (self::get("login")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkLogin(){
  self::init();
  if (self::get("login")== true) {
   header("Location:index.php");
  }
 }

 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>
Use for Login Controller: 
<?php
/**
* Login Controller
*/
class Login extends DController{
 
 public function __construct(){
  parent::__construct();
 }

 public function Index(){
  $this->login();
 }

 public function login(){
  Session::init();
  if (Session::get("login") == true) {
   header("Location:".BASE_URL."/Admin");
  }
  $this->load->view("login/login");
 }

 public function loginAuth(){
  $table = "tbl_user";
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $loginModel = $this->load->model("LoginModel");
  $count = $loginModel->userControl($table, $username, $password);
  if ($count > 0) {
    $result = $loginModel->getUserData($table, $username, $password);
    Session::init();
    Session::set("login", true);
    Session::set("username", $result[0]['username']);
    Session::set("userId", $result[0]['id']);
    Session::set("level", $result[0]['level']);
          header("Location:".BASE_URL."/Admin");
  } else {
   header("Location:".BASE_URL."/Login");
  } 
 }

 public function logout(){
  Session::init();
  Session::destroy();
  header("Location:".BASE_URL."/Login");
 }
}
?>
Use for Sample Login Page: 
<?php 
 include '../lib/Session.php';
 Session::init();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/stylelogin.css"/>
</head>
<body>
<div class="container">
<section id="content">
<?php
 $db = new Database();

 if($_SERVER["REQUEST_METHOD"] == "POST"){
 $username = mysqli_real_escape_string($db->link, $username);
 $password = mysqli_real_escape_string($db->link, $password);

    $query = "SELECT * FROM user WHERE username='$username' 
     and password='$password'";
    $result = $db->select($query);
    if ($result != false) {
        $value = $result->fetch_assoc(); 
        Session::set("login", true);
        Session::set("username", $value['username']);
        Session::set("userId", $value['id']);
        header("Location: index.php");
       //echo "<script>window.location = 'index.php';</script>";
    } else { echo "<span style='color:red;font-size:18px;'>Username 
   or Password Not Matched !!</span>";}
 }
?>

 <form action="login.php" method="post">
  <h1>Admin Login</h1>
  <div>
   <input type="text" placeholder="Username" required="1" 
     name="username" />
  </div>
  <div>
   <input type="password" placeholder="Password" required="1" 
    name="password" />
  </div>
  <div>
   <input type="submit" value="Log in" />
  </div>
 </form><!-- form -->


 <div class="button">
  <a href="http://www.trainingwithliveproject.com" 
  target="_blank">Training with live project</a>
 </div><!-- button -->
 </section><!-- content -->
</div><!-- container -->
</body>
</html>