<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Copyright (c) 2015, Vikas Rana
 * 
 * 
 */
class Client_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		/* DB table to use */
		$this->table_name = 'clients';
		$this->table_name_users = 'users';
		//$this->users_groups_table_name = 'users_groups';
		$this->fields_name = array("$this->table_name.id","$this->table_name.user_id","$this->table_name_users.first_name","$this->table_name_users.last_name","$this->table_name_users.email","$this->table_name.client_url","$this->table_name_users.address","$this->table_name_users.timezone","$this->table_name_users.country_code","$this->table_name_users.phone_number","$this->table_name.client_fb_page_url","$this->table_name.client_twitter_page_url","$this->table_name.client_website_url","$this->table_name.created_on");

		$this->additional_fields_name = array();
		//$this->fields_name = array( 'id', 'client_first_name','client_last_name','client_url','client_address','client_timezone','client_phone_number','client_fb_page_url','client_twitter_page_url','client_website_url','created_on');
		
		/* Indexed column (used for fast and accurate table cardinality) */
		$this->index_column_name = "$this->table_name.id";
	}
	
	function getClients()
	{
		/*
		 * Ordering
		 */
		$sort_by=$this->index_column_name;
		$sort_order='desc';
		
		/* Paging
		*/
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
		{
			$this->db->limit(intval( $_GET['iDisplayLength'] ),intval( $_GET['iDisplayStart'] ));
		}
		
		/*
		 * Ordering
		 */
		
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					$sort_by=$this->fields_name[ intval( $_GET['iSortCol_'.$i] ) ];
					$sort_order=$_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc';	
				}
			}
		} 
		
		
		/* 
		 * Filtering
		 */
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = " (";
			for ( $i=0 ; $i<count($this->fields_name) ; $i++ )
			{
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
				{
					$sWhere .= $this->fields_name[$i]." LIKE '%".trim($_GET['sSearch'])."%' OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$fields_name = implode(",",$this->fields_name);
		$this->db->select($fields_name);
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		
		if(!empty($sWhere))
		{
			$this->db->where($sWhere,NULL,false);
		}
		$this->db->from($this->table_name);
		$this->db->join($this->table_name_users, $this->table_name_users.'.id = '.$this->table_name.'.user_id');
		$this->db->order_by($sort_by,$sort_order); 
		$query = $this->db->get();	
		$rResult=$query->result_array();		
		
		
		/* Data set length after filtering */
		$sQuery = 'SELECT FOUND_ROWS() as total ';
		$query = $this->db->query($sQuery);
		$rResultFilterTotal=$query->row_array();
		$iFilteredTotal = array_key_exists('total',$rResultFilterTotal)?$rResultFilterTotal['total']:0;
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(".$this->index_column_name.") as total
			FROM $this->table_name
			LEFT JOIN $this->table_name_users
			ON $this->table_name_users.id=$this->table_name.user_id
		";
		$query = $this->db->query($sQuery);
		$aResultTotal=$query->row_array();
		
		$iTotal = array_key_exists('total',$aResultTotal)?$aResultTotal['total']:0;
		
		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		$url_fields_array = array ('client_url','client_fb_page_url','client_twitter_page_url','client_website_url');
		
		$phone_fields_array = array ('country_code','phone_number');
		
		$tables_array = array($this->table_name.'.',$this->table_name_users.'.');
		foreach($rResult as $key=>$value )
		{
			$row = array();
			
			$value['phone_number'] = $this->common->formatPhoneNumber($value['country_code'],$value['phone_number']);
			
			unset($value['country_code']);
			
			if (($key = array_search($this->table_name_users.'.country_code', $this->fields_name)) !== false) {
				unset($this->fields_name[$key]);
			}
			
			for ( $i=0 ; $i<=count($this->fields_name) ; $i++ )
			{
				if (!empty($this->fields_name[$i]))
				{
					$this->fields_name[$i] = str_replace($tables_array,array('',''),$this->fields_name[$i]);
					
					if(in_array($this->fields_name[$i],$url_fields_array))
					{
						$row[] = auto_link($value[ $this->fields_name[$i] ], 'both', TRUE);
					}
					else if($this->fields_name[$i]=='created_on')
					{
						$row[] = date(DATE_FORMAT,strtotime($value[ $this->fields_name[$i] ]));
					}
					else
					{
						$row[] = $value[ $this->fields_name[$i] ];
					}	
				}
				
			}
			$output['aaData'][] = $row;
		}
		return json_encode( $output );
	}
	
	function getClient($id)
	{
		if(!empty($id))
		{
			$fields_name = implode(",",$this->fields_name);
			if(count($this->additional_fields_name)>0)
			{	
				$fields_name .= ','.implode(",",$this->additional_fields_name);
			}	
			
			$query = $this->db->select($fields_name)
				->from($this->table_name)
				->join($this->table_name_users, $this->table_name_users.'.id = '.$this->table_name.'.user_id')
				->where($this->index_column_name, $id) 
				->get();
			return $query->row();	
		}		
	}
	
	function insert($data,$id=null)
	{
		if(!empty($data))
		{
			if(empty($id))
			{
				$this->db->insert($this->table_name, $data); 
			}
			else
			{
				$this->db->where('id', $id);
				$this->db->update($this->table_name, $data); 
			}			
		}		
	}
	
	function updateUser($data,$id=null)
	{
		if(!empty($data) && !empty($id))
		{
			$this->db->where('id', $id);
			$this->db->update($this->table_name_users, $data); 
		}		
	}
	
	function deleteClient($id=null)
	{
		if(!empty($id))
		{
			$row = $this->getClient($id);
			$this->db->delete($this->table_name, array('id' => $id)); 
			$this->db->delete($this->table_name_users, array('id' => $row->user_id)); 
		}		
	}
}
