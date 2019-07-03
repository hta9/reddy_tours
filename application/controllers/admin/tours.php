<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/tour_model', 'tour');
	}

	public function index()
	{
		echo "12";
	}

	/**
	 * [fill This function is for Filling Dropdown boxes of City and language as per Country ]
	 * @return [type] [description]
	 */
	public function fill()
	{
		if ($this->input->post())
		{
			$country_id = _post('country_id');
			$city_id    = _post('city_id');

			if ($country_id != '')
			{
				$cities = $this->tour->get_cities_by_country($country_id);

				if (!empty($cities))
				{
					echo "<option value='sel'>"."Select City"."</option>";

					foreach ($cities as $city)
					{
						echo "<option value=".$city['id'].">".ucwords($city['name'])."</option>";
					}
				}
				else
				{
					echo "<option>"."No Cities Yet"."</option>";
				}
			}

			if ($city_id != '')
			{
				$languages = $this->tour->get_languages_by_city($city_id);

				if (!empty($languages))
				{
					echo "<option>"."Select Language"."</option>";

					foreach ($languages as $language)
					{
						echo "<option value=".$language['id'].">".ucwords($language['name'])."</option>";
					}
				}
				else
				{
					echo "<option>"."No Languages Yet"."</option>";
				}
			}
		}
		else
		{
			$data['countries'] = $this->tour->get_countries();
			$this->load->view('admin/tour/add', $data);
		}
	}

	/**
	 * [add Add Tour Details to tour table]
	 */
	public function add()
	{
		if ($this->input->post())
		{
			$country = _post('countries');
			$city    = _post('city');
			$title   = _post('title');

			if (!is_numeric($city))
			{
				$city_data = array(

					'name'       => $city,
					'country_id' => $country

				);

				$this->tour->insert_city($city_data);
				//last inserted city's ID when city is added Manually from Cities Table
				$insert_id = $this->db->insert_id();

				$tour_data1 = array
				(

					'title'      => $title,
					'city_id'    => $insert_id,
					'country_id' => $country

				);

				$this->tour->insert_tour($tour_data1);
			}
			else
			{
				$tour_data1 = array(

					'title'      => $title,
					'city_id'    => $city,
					'country_id' => $country

				);

				$this->tour->insert_tour($tour_data1);
			
			}
			  $last_tour_id = $this->db->insert_id();
			  set_session('last_tour_id',$last_tour_id);
		}
		else
		{
			$data['countries'] = $this->tour->get_countries();
			$this->load->view('admin/tour/add', $data);
		}

		// echo fetch_session('last_tour_id');
	}

	/**
	 * [add2 Checkpoints insertion With its id in Tour Table]
	 * @return [type] [description]
	 */
	public function add2()
	{
		
	}

	/**
	 * [add3 Third Level formdata Insertion]
	 * @return [type] [description]
	 */
	public function add3()
	{	
		// unset_session('last_tour_id');
		if ($this->input->post())
		{	
			$id = fetch_session('last_tour_id');
			$description   = _post('description');
			$price         = _post('price');

			if($price=='')
			{
				$price=0;
			}
			$age           = _post('age');
			$accessibility = _post('accessibility');
		

			$tour_data3 = array(

				'description'   => $description,
				'price'         => $price,
				'age_limit'     => $age,
				'accessibility' => $accessibility

			);

			$this->tour->update($id,$tour_data3);
			unset_session('last_tour_id');
		}
	}

	public function congratulations()
	{
		$this->load->view('admin/tour/congratulations');
	}
}
