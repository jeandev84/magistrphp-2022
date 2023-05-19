<?php
include("INewsDB.class.php");
class NewsDB implements INewsDB
{

	const DB_NAME  = __DIR__.'/news.db';
	const RSS_NAME = __DIR__.'/rss.xml';

	const RSS_TITLE ='Последние новости';
	const RSS_LINK  = 'http://localhost:8000/news/news.php';
	
	protected $_db;
	
	function __construct(){

		if(!file_exists(self::DB_NAME)){
		  $this->_db = new SQLite3(self::DB_NAME);
		  
		  $queries = [
		  "CREATE TABLE msgs(
			id INTEGER PRIMARY KEY AUTOINCREMENT,
			title TEXT,
			category INTEGER,
			description TEXT,
			source TEXT,
			datetime INTEGER
			)", 
			"CREATE TABLE category(
				id INTEGER,
				name TEXT
			)",
			"INSERT INTO category(id, name)
			SELECT 1 as id, 'Политика' as name
			UNION SELECT 2 as id, 'Культура' as name
			UNION SELECT 3 as id, 'Спорт' as name"
		  ];
		  
		  foreach( $queries as $query ) {
              $this->_db->exec( $query );
          }
		  
		} else $this->_db = new SQLite3(self::DB_NAME);
	}	
	function __destruct(){
		$this->_db->close();
	}
	function saveNews($title, $category, $description, $source){	
		$dt = time();
		$sql = "INSERT INTO msgs (title, category, description, source, datetime) VALUES(:title, :category, :description, :source, $dt)";
		
		$stmt = $this->_db->prepare($sql);
		$stmt->bindParam(":title",$title);
		$stmt->bindParam(":category",$category);
		$stmt->bindParam(":description",$description);
		$stmt->bindParam(":source",$source);
			
		$result = $stmt->execute();
		$stmt->close();
	
		if( $this->_db->lastErrorCode() > 0 )
			return false;
		else {
			//return true;
			$result = $this->_db->querySingle('SELECT last_insert_rowid() AS id');
			return $result;
		}
	}


	function updateNews($id, $title, $category, $description, $source)
    {
		$dt = time();
		$sql = "UPDATE msgs SET title=:title, category=:category, description=:description, source=:source, datetime=$dt WHERE id = :id";
		
		$stmt = $this->_db->prepare($sql);
		$stmt->bindParam(":title",$title);
		$stmt->bindParam(":category",$category);
		$stmt->bindParam(":description",$description);
		$stmt->bindParam(":source",$source);
		$stmt->bindParam(":id",$id);
			
		$result = $stmt->execute();
		$stmt->close();
	
		if( $this->_db->lastErrorCode() > 0 )
			return false;
		else {
			return $id;
		}
	}
	function getNewsById($id){
		try{
			$sql = "SELECT id, title, 
					(SELECT name FROM category WHERE category.id=msgs.category) as category, description, source, datetime 
					FROM msgs
					WHERE id = $id";
			$result = $this->_db->query($sql);
			if (!is_object($result)) 
				throw new Exception($this->_db->lastErrorMsg());
			else {
				return $result->fetchArray(SQLITE3_ASSOC) ;
				
			}
		}catch(Exception $e){
			throw new SoapFault('getNewsById', $e->getMessage());
		}
	}
	
	function getNews(){
		$sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime 
FROM msgs, category
WHERE category.id = msgs.category
ORDER BY msgs.id DESC";

		$result = $this->_db->query($sql);
		$rows = [];
		while($row = $result->fetchArray(SQLITE3_ASSOC))
			$rows[] = $row;
		
		return $rows;
	}
	function deleteNews($id){
		$sql = "DELETE FROM msgs WHERE id=$id";
		$this->_db->query($sql);
		
		if( $this->_db->lastErrorCode() > 0 )
			return false;
		else 
			return true;
	}

    public function createRSS(){
        $dom = new DOMDocument("1.0", "utf-8");
        $dom->formatOutput = true ;
        $dom->preserveWhiteSpace = true ;
        
        $rss = $dom->createElement("rss");
        $dom->appendChild($rss);
        $version = $dom->createAttribute("version");
        $version->value = '2.0' ;
        $rss->appendChild($version);
        
        $channel = $dom->createElement("channel");
        $rss->appendChild($channel);
        
        $channel->appendChild($dom->createElement("title", self::RSS_TITLE));
        
        $channel->appendChild($dom->createElement("link", self::RSS_LINK));
        
        $data = $this->getNews() ;
        foreach($data as $d){
        //var_dump($d);
            $item = $dom->createElement("item");
            $item->appendChild($dom->createElement("title",$d["title"]));
            $item->appendChild($dom->createElement("link",$d["source"]));
            $item->appendChild($dom->createElement("description",$d["description"]));
            $item->appendChild($dom->createElement("pubDate",date("d-m-Y",$d["datetime"])));
            $item->appendChild($dom->createElement("category",$d["category"]));
            $channel->appendChild($item) ;
        }
        $dom->save(self::RSS_NAME);
    }	
	


}
//$news = new NewsDB();

?>