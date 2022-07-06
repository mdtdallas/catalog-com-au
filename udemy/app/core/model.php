<?php


// Main model class

class Model extends Database
{
	protected $table = '';

	public function insert($data)
	{
		
		// remove unwanted columns
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}
		$keys = array_keys($data);
		$query = 'insert into ' . $this->table;
		$query .= '(' . implode(',', $keys) . ') values (:' . implode(',:', $keys) . ')';


		$this->query($query, $data);
	}

	public function update($id, $data)
	{
		
		// remove unwanted columns
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}
		$keys = array_keys($data);

		$query = 'update '. $this->table .' set ';
		foreach ($keys as $key) {
			$query .= $key .'=:'. $key . ',';
		}
		$query = trim($query, ',');
		$query .= ' where id = :id';

		$data['id'] = $id;
		$this->query($query, $data);
	}

	public function delete($id) {
		$query = "DELETE FROM " . $this->table . ' WHERE id = ' . $id;
		show($query);
	}

	public function where($data, $order = 'desc')
	{

		$keys = array_keys($data);

		$query = "select * from " . $this->table . " where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}

		$query = trim($query, "&& ");
		$query .= ` order by id $order `;
		$res = $this->query($query, $data);
		
		if (is_array($res)) {
			// run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func) {
					$res = $this->$func($res);
				}
			}
			return $res;
		}

		return false;
	}

	public function futureShows($order = 'desc') {
		
		$query = "SELECT * FROM shows WHERE approved = 'on' AND showDate >= CURDATE() ";

		$res = $this->query($query);

		if($res) {
			return $res;
		}
		return false;
	}

	public function findAll($order = 'desc')
	{

		$query = "select * from " . $this->table;
		
		$res = $this->query($query);

		if (is_array($res)) {
			// run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				
				foreach($this->afterSelect as $func) {
					$res = $this->$func($res);
				}
			}
			return $res;
		}

		return false;
	}

	public function findAllLike($data = null, $order = 'desc')
	{
		$key = $data['searchLocation'];
		$query = "select * from " . $this->table . " where location like '%" .$key . "%'";
		
		$res = $this->query($query);
		
		return $res;
	}

	public function first($data, $order = 'desc')
	{

		$keys = array_keys($data);

		$query = "select * from " . $this->table . " where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}

		$query = trim($query, "&& ");
		$query .= ` order by id $order limit 1`;
		$res = $this->query($query, $data);

		if (is_array($res)) {
			
			// run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				
				foreach($this->afterSelect as $func) {
					$res = $this->$func($res);
				}
			}
			return $res[0];
		}

		return false;
	}
}
