<?php
//Put security check for cached pages
session_start();
//if ($_SESSION['logged_in'])
//{
// require_once ("result.php");
class DB
{
    const DATABASE = 'weekend';
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'testfbe';
    
    static private $pdo;
    
    static public function singleton()
    {
        if (!is_object(self::$pdo))
        {
            self::$pdo = new PDO('mysql:dbname=' . self::DATABASE . ';host=' . self::HOST, 
                                    self::USERNAME, 
                                    self::PASSWORD);
        }
        return self::$pdo;
    }
    
    private function __construct()
    {
        
    }
    
    public function __clone()
    {
        throw new Exception('You may not clone the DB instance');
    }
}

if (!isset($_REQUEST['term']))
{
    die('([])');
}

$st = DB::singleton()
        ->prepare(
            'select DISTINCT longitude,latitude ' .
            'from location ' .
            'where latitude like :aname_update ' .
            'order by AppsName asc ' .
            'limit 0,10');
 

$searchauto = $_REQUEST['term'] . '%';
$st->bindParam(':aname_update', $searchauto, PDO::PARAM_STR);


$data = array();

 if ($st->execute())
{
    while ($row = $st->fetch(PDO::FETCH_OBJ))
    {
            $data[] = array(
             'value' => $row->AppsName, 
             'category' => $row->AppsName . ' ' . $row->Appversion );
         
    }
}

echo json_encode($data);
flush();
//}//If part is finished with cached condition
//else
//{
//   include "cached.php";
//}
?>