<?php
class Database{
    private $link;
    public function __construct(){
        $this->connect();
    }
    private function connect(){
        $config = require_once'config.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
        
    }
    public function execute($sql){
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }
    public function query($sql){
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($result === false){
            return [];
        }
        return $result;
    }
}
$db = new Database ();

$results_per_page = 5;
$table_rows = $db->query("SELECT id FROM news");
print_r($result);
$number_of_results = count($table_rows);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

$newsList = $db->query('SELECT * FROM news ORDER BY idate DESC LIMIT '
    . $this_page_first_result . ',' . $results_per_page);
?>

<link rel="stylesheet" href="styles.css">