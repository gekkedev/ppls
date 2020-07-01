<?php

/**
 * loads all available plugins
 * to load plugin(s) specify the plugin names as parameters
 */
function loadPlugins() {
  $args = func_get_args();
  !empty($args) ?: Core::stopExec("The function loadPlugins() needs to know which Plugins should be loaded!");
  foreach ($args as $item) {
    $this->loadPlugin($item);
  }
}

abstract class Core {
  private $conn;
  public $CONF;

  function __construct() {
    //GlobalConf
    require_once("config.php");
    //mount the non-DB-Part
    /*no more necessary*///$this->CONF = $CONF;

    //Translations
    //require_once("translations.php");

    //Database
    $this->conn = new mysqli($DB["host"], $DB["user"], $DB["pass"], $DB["name"]);
    unset($DB);
    $this->conn ?: $this->stopExec("DBConnection-trouble " . mysqli_connect_error() . " " . mysqli_connect_errno());
  }

  //DB-Functions
  
  /**
   * Executes a given query
   * @param type $query
   * @return string
   */
  private function myQuery($query): string {
    $result = $this->conn->query($query);//print_r($query);
    $result ?: $this->stopExec("Database error or failed query ($query) [{$this->conn->errno}] {$this->conn->error}");

    return $result;
  }

  /**
   * 
   * @param type $table
   * @param type $column
   * @param type $where
   * @return type
   */
  public function fetchRows($table, $column, $where = "") {
    $table = $this->escape($table);
    $column = $this->escape($column);
    $where = empty($where) ? "" : " WHERE {$this->escape($where)}";
    $result = $this->myQuery("SELECT $column FROM $table$where;");
    while($row = $result->fetch_assoc()) {
      $return[]=$row;
    }
    $result->close();
    foreach($return as $key => $row) {
      foreach($row as $key2 => $item) {
        $return[$key][$key2] = $this->contraXSS($item);
      }
    }
    
    return $return;
  }

  /**
   * 
   * @param type $table
   * @param type $content_arr
   * @return type
   */
  public function insertRow($table, $content_arr) {
    $table = $this->escape($table);

    //explode manually before escaping
    $keys = ""; $values = ""; $counter = 0;
    foreach ($content_arr as $key => $value) {
      $key = $this->escape($key);
      $value = $this->escape($value);
      $keys .= $counter ? ", $key" : "$key";
      $values .= $counter ? ", '$value'" : "'$value'";
      $counter++;
    }
    
    $result = $this->myQuery("INSERT INTO $table ($keys) VALUES ($values);");
    $result ?: $this->stopExec("Can't insert values($values) into $table($keys) Result: " . print_r($result, true));
    return $result;//$result->close()
  }

  //Basic Functions
  public static function getHelp() {
    print_r(get_class_vars(get_class()));
    print("<br>");
    print_r(get_class_methods(get_class()));
  }

  public function loadPlugin($name) {
    $file = 'plugins/plugin.';
    $file .= strtolower($name);
    $file .= '.php';
    file_exists($file) ? require_once($file) : $this->stopExec("Plugin \"$name\"($file) not found!");
    class_exists($name) ?: $this->stopExec("Class \"$name\" is broken!");
    /*CONCEPT: somthing like this line should be necessary if new class contains events ON CREATION*/$GLOBALS[$name] = new $name();
  }

  public function loadTemplate($name) {
    $file = 'templates/';
    $file .= $name;
    $file .= '.php';
    file_exists($file) ? require_once($file) : stopExec("Template \"$name\($file) not found!");
  }

  public static function successAlert($msg) {
    echo '<br><div class="alert-box success"><span>success: </span>' . $msg . '</div>';
  }

  public static function errorAlert($msg) {
    echo '<br><div class="alert-box error"><span>error: </span>' . $msg . '</div>';
  }

  public static function stopExec($err_msg) {
    Core::errorAlert("<br>Custom Error: $err_msg");
    exit;
  }

  /** prevents MySQL-Injections */
  private function escape($unsafe) {
    return $this->conn->real_escape_string($unsafe);
  }

  /** unsafe to safe HTML */
  private function contraXSS($unsafe) {
    return htmlspecialchars($unsafe);
  }
}
?>