<?php

abstract class Catalyst {
   public static $db;
   public static $queries;

   // INIT //

   public static function init() {
   
      self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $queriesXml = simplexml_load_file('db/queries.xml');
      
      self::$queries = array();
      
      foreach($queriesXml as $query)
      self::$queries[(string)$query['name']] = (string)$query;
   }

   // QUERY //
   
   public static function query($name, $parameters = array()) {
      if (!isset(self::$queries[$name])) {
         throw new Exception("Undefined query: $name");
      }
      
      $sql = self::$queries[$name];
      
      if (count($parameters)) {
         $formattedParams = array();
         
         foreach($parameters as $paramName => $paramValue) {
            if (!is_numeric($paramValue)) {
               if (is_null($paramValue)) {
                  $paramValue = 'NULL';
               } else {
                  $paramValue = "'".self::$db->real_escape_string($paramValue)."'";
               }
            }
            
            $formattedParams[":$paramName"] = $paramValue;
         }
         
         $sql = strtr($sql, $formattedParams);
      }
      
      // DEBUGGING //
      if (defined('SHOWSQL') && SHOWSQL) { echo htmlentities($sql)."<br />\n"; }
      
      return self::$db->query($sql);
   }
}
?>