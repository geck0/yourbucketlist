<?php

class CatalystUser {

   public $id;
   public $email;
   
   // GET ALL USERS //
   
   public static function getAll() {
      $result = Catalyst::query('emails.getAll');
      $users = array();
      
      while($result && $row = $result->fetch_assoc()) {
         $users[] = CatalystUser::load($row);
      }
      
      return $users;
   }
   
   // LOAD USER //
   
   public static function load($row) {
      return new CatalystUser($row['id'], $row['email']);
   }
   
   // SAVE USER //

   public function save() {
      if ($this->id == 0) {
         $result = Catalyst::query( 'emails.insert', array('email' => $this->email) );
         if ($result) { $this->id = Catalyst::$db->insert_id; }
      } else {
         $result = Catalyst::query('user.update', array('email' => $this->email));
      }
      return $result;
   }
   
   // CONSTRUCT //
   
   public function __construct($id = 0, $email = '') {
      $this->id = $id;
      $this->email = $email;
   }
}

?>