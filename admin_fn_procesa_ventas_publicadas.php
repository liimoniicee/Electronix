<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'electronicax');
define('DB_CHARSET', 'utf8');


class Model{
	protected $db;
	public function __construct(){
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->db->connect_errno){
			exit();
		}
		$this->db->set_charset(DB_CHARSET);
	}
}
	class Procesar extends Model{

		public function __construct(){
     	 	parent::__construct();
    	}

	    public function build_report($year){
	    	$total = array();
	    	for($i=0; $i<12; $i++){
	    		$month = $i+1;
	    		$sql = $this->db->query("SELECT SUM(precio) AS total FROM refacciones_tv WHERE MONTH(fecha_entrada) = '$month' AND YEAR(fecha_entrada) = '$year' AND estado='Publicada' LIMIT 1");
	    		$total[$i] = 0;
	    		foreach ($sql as $key){ $total[$i] = ($key['total'] == null)? 0 : $key['total']; }
	    	}
			return $total;
	    }

	}

	if($_POST['year']){
		$class = new Procesar;
		$run = $class->build_report($_POST['year']);
		exit(json_encode($run));
	}
?>
