<?php
App::uses('Xml', 'Utility');
App::uses('php-excel-reader', 'Vendor');
/**
 * MigrationShell script to migrate from Locbit 1.0 to Locbit Portal Ap
 *
 * @property User $User
 * @property UsersRole $UsersRole
 */
class MigrationShell extends AppShell {

	public $uses = array(
		'User',
		'UsersRole',
		'Category',
		'Type',
		'Statement'
	);

	public function main() {
		$this->out('Migration script from Locbit 1.0 to Locbit Portal App:');
		$this->out(' 1) import_csv: Import csv data into the database');
		$this->out(' 2) save_date: Save the string date as time');
		// delete all tournament data
	}
	
	public function save_date(){
		$data = $this->Statement->find('list',array('fields' => 'Statement.date'));
		foreach($data as $key=>$value){
			$this->Statement->read(null, $key);
			$this->Statement->set(array(
			    'date_temp' => date('Y-m-d',strtotime($value))
			));
			$this->Statement->save();
		}
		
	}

	public function import_csv() {
		$this->out('['.date('Y-m-d H:i:s').']: Fetching all data from csv... ');
		$i = 0;
		$handle = fopen(WWW_ROOT.'oct.csv', "r");
		$header = fgetcsv($handle);
		while (($row = fgetcsv($handle)) !== FALSE) {
            $i++;
            $data = array();
 
            // for each header field 
            foreach ($header as $k=>$head) {
                // get the data field from Model.field
                if (strpos($head,'.')!==false) {
                    $h = explode('.',$head);
                    $data[$h[0]][$h[1]]=(isset($row[$k])) ? $row[$k] : '';
                }
                // get the data field from field
                else {
                    $data['Statement'][strtolower($head)]=(isset($row[$k])) ? $row[$k] : '';
                }
            }
 
			$conditions = array(
				'Type.name' => $data['Statement']['type'],
			);
			
			$result = $this->Type->find('first',compact('conditions')); 
 			if (!$result) {
				$this->Type->create();
				$this->Type->saveField('name',$data['Statement']['type']);
				$data['Statement']['type_id'] = $this->Type->getLastInsertId();
			}
			else{
				$data['Statement']['type_id'] = $result['Type']['id'];
			}
			$conditions = array(
				'Category.name' => $data['Statement']['category'],
			);
			
			$result = $this->Category->find('first',compact('conditions')); 
 			if (!$result) {
				$this->Category->create();
				$this->Category->saveField('name',$data['Statement']['category']);
				$data['Statement']['category_id'] = $this->Category->getLastInsertId();
			}
			else{
				$data['Statement']['category_id'] = $result['Category']['id'];
			}
            // see if we have an id
            $conditions = array(
				'Statement.date' => $data['Statement']['date'],
				'Statement.name' => $data['Statement']['name'],
			);
			 
			$data['Statement']['amount'] = (float)substr($data['Statement']['amount'],1);
			//debug($data);die();
			if (!$this->Statement->find('count',compact('conditions'))) {
				$this->Statement->create();
				$this->Statement->saveAssociated($data);
			}
            
        }
         
        // close the file
        fclose($handle);
	}

}