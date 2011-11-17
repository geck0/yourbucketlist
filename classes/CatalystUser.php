<?php

class CatalystUser {

   public $id;
   public $email;
   public $name;
   public $oauth_provider;
   public $oauth_uid;
   
   // GET USER BY EMAIL //
   
   public static function getByOauthUid($oauth_uid) {
      $result = Catalyst::query('users.getByOauthUid', array('oauth_uid' => $oauth_uid));
      
      if ($result && $row = $result->fetch_assoc()) {
         return CatalystUser::load($row);
      }
      
      return false;
   }
   
   // DELETE USER ITEM //
   
   public static function deleteUserItem($user_id, $item_id) {
      $result = Catalyst::query('items.deleteById', array('user_id' => $user_id, 'item_id' => $item_id));
      
      return $result;
   }
   
   // UPDATE USER ITEM //
   
   public static function updateUserItem($user_id, $item_id) {
      $result = Catalyst::query('items.updateById', array('user_id' => $user_id, 'item_id' => $item_id));
      
      return $result;
   }
   
   public static function newItem($user_id, $name) {
      $result = Catalyst::query('items.insert', array('name' => $name, 'user_id' => $user_id));
      
      if ($result) {
         $new_id = Catalyst::$db->insert_id;
      }
      
      return $new_id;
   }
   
   public static function getItemById($user_id, $item_id) {
      $result = Catalyst::query('items.getById', array('user_id' => $user_id, 'item_id' => $item_id));
      
      if ($result && $row = $result->fetch_assoc()) {
         return $row;
      }
      
      return false;
   }
   
   // LOAD USER //
   
   public static function load($row) {
      return new CatalystUser($row['id'], $row['email'], $row['name'], $row['oauth_provider'], $row['oauth_uid']);
   }
   
   // GET USER ITEMS //
   
   public function getItems() {
      $result = Catalyst::query('items.getByUser', array('user_id' => $this->id));
      
      $items = array();
      
      while ($result && $row = $result->fetch_assoc()) {
         $items[] = $row;
      }
      
      return $items;
   }
   
   // SAVE USER //

   public function save() {
      if ($this->id == 0) {
         $result = Catalyst::query( 'users.insert', array('id' => $this->id, 'email' => $this->email, 'name' => $this->name, 'oauth_provider' => $this->oauth_provider, 'oauth_uid' => $this->oauth_uid) );
         if ($result) { $this->id = Catalyst::$db->insert_id; }
      } else {
         $result = Catalyst::query('users.update', array('id' => $this->id, 'email' => $this->email, 'name' => $this->name, 'oauth_provider' => $this->oauth_provider, 'oauth_uid' => $this->oauth_uid) );
      }
      return $result;
   }
   
   // CONSTRUCT //
   
   public function __construct($id = 0, $email = '', $name = '', $oauth_provider = '', $oauth_uid = '') {
      $this->id = $id;
      $this->email = $email;
      $this->name = $name;
      $this->oauth_provider = $oauth_provider;
      $this->oauth_uid = $oauth_uid;
   }
}

?>