<?php
error_reporting(E_ALL);
class Session{
 public static function init(){
    if(!isset($_SESSION)) 
    { 
        session_start(); 
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
  if (self::get("adminlogin")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkLogin(){
  self::init();
  if (self::get("adminlogin")== true) {
   header("Location:index.php");
  }
 }

 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>