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
		
		$this->table_name_users = 'users';
		//$this->users_groups_table_name = 'users_groups';
		$this->fields_name = array("$this->table_name_users.id","$this->table_name_users.first_name","$this->table_name_users.last_name","$this->table_name_users.email","$this->table_name_users.address");

		$this->additional_fields_name = array();
		//$this->fields_name = array( 'id', 'client_first_name','client_last_name','client_url','client_address','client_timezone','client_phone_number','client_fb_page_url','client_twitter_page_url','client_website_url','created_on');
		
		/* Indexed column (used for fast and accurate table cardinality) */
		$this->index_column_name = "$this->table_name_users.id";
	}
	
	function getClients()
	{
		/*
		 * Ordering
		 */
		$sort_by=$this->index_column_name;
		$sort_order='desc';
		
		
		/* 
		 * Filtering
		 */
		$sWhere = "";
		$searchPhrase = $this->input->post('searchPhrase');
		if ( isset($searchPhrase) && $searchPhrase != "" )
		{
			$sWhere = " (";
			for ( $i=0 ; $i<count($this->fields_name) ; $i++ )
			{
				$sWhere .= $this->fields_name[$i]." LIKE '%".trim($searchPhrase)."%' OR ";
				
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/*
		 * Ordering
		 */
		$sort = $this->input->post('sort');
		if ( isset( $sort ) )
		{
			foreach ( $sort as $key=>$value )
			{
				$sort_by=$key;
				$sort_order=$value;	
			}
		} 
		
		/* Total data set length */
		
		$this->db->select("COUNT(".$this->index_column_name.") as total");
		
		$this->db->from($this->table_name_users);
		if(!empty($sWhere))
		{
			$this->db->where($sWhere,NULL,false);
		}
		$query = $this->db->get();	
		$aResultTotal=$query->row_array();
		
		$fields_name = implode(",",$this->fields_name);
		$this->db->select($fields_name);
		$this->db->from($this->table_name_users);
		if(!empty($sWhere))
		{
			$this->db->where($sWhere,NULL,false);
		}
		if($this->input->post('rowCount') != -1)
		{
			$page = intval($this->input->post('current'));

			// set the number of items to display per page
			$perPage = $this->input->post('rowCount');

			// build query
			$offset = ($page - 1) * $perPage;
			$this->db->limit($this->input->post('rowCount'),$offset);
		}
		$this->db->order_by($sort_by,$sort_order); 
		$query = $this->db->get();	
		$rResult = $query->result_array();
		
		
		$output = array(
			"current" => intval($this->input->post('current')),
			"rowCount" => $this->input->post('rowCount'),
			"total" => $aResultTotal['total'],
			"rows" => $rResult
		);
		
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
	
	function deleteUser($id=null)
	{
		if(!empty($id))
		{
			$this->db->delete($this->table_name_users, array('id' => $id)); 
		}		
	}
}
