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
	    		$sql = $this->db->query("SELECT sum(v.costo + r.costo_total)AS total
																	FROM reparar_tv r, ingresos i, ventas_tv v
																	WHERE  r.id_equipo = i.reparar_tv_id_equipo AND i.ventas_tv_idventa_tv= v.idventa_tv AND
																	MONTH(i.fecha_ingreso) = '$month' AND YEAR(i.fecha_ingreso) = '$year' LIMIT 1");
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
