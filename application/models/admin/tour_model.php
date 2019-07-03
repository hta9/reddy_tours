<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_model extends My_Model
{
	
	protected $soft_delete = true;

	/**
	 * [get_countries description]
	 * @return [type] [description]
	 */
	public function get_countries()
	{
		$this->_table = 'countries';
		$countries = $this->get_all();
		return $countries;
	}
	
	/**
	 * [get_cities description]
	 * @return [type] [description]
	 */
	public function get_cities_by_country($id)
	{
		$this->_table = 'cities';
		$cities = $this->get_many_by('country_id',$id);
		return $cities;
	}

	/**
	 * [get_languages_by_city Fetch laguages as per city]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_languages_by_city($id)
	{	

		$this->_table = 'languages';
		$languages = $this->get_many_by('city_id',$id);
		return $languages;
	}	

	/**
	 * [insert_city city id is insrted to tour or new city name is inserted in city table]
	 * @param  [type] $city_data [description]
	 * @return [type]            [description]
	 */
	public function insert_city($city_data)
	{
		$this->_table = 'cities';
		$sql = $this->insert($city_data);

		if($sql)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/**
	 * [insert_tour Table name is not fetched automaticlly so function is for fetching table name]
	 * @param  [type] $tour_data1 [description]
	 * @return [type]             [description]
	 */
	public function insert_tour($tour_data1)
	{	
		$this->_table = 'tours';
		$sql = $this->insert($tour_data1);
		return true;
	}


}