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
					echo "<option>"."Select City"."</option>";

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

echo "<pre>";

print_r($this->input->post());
			echo "</pre>";

			if (!is_numeric($city))
			{

				$city_data = array(

					'name' => $city,
					'country_id'=>$country

				);

				$this->tour->insert_city($city_data);
				$insert_id = $this->db->insert_id();

				$tour_data1 = array(

					'title'      => $title,
					'city_id'       => $insert_id,
					'country_id' => $country

				);

				$this->tour->insert_tour($tour_data1);
			}
			else
			{

				$tour_data1 = array(

					'title'      => $title,
					'city_id'       => $city,
					'country_id' => $country

				);

				$this->tour->insert_tour($tour_data1);
			}
		}
		else
		{
			$data['countries'] = $this->tour->get_countries();
			$this->load->view('admin/tour/add', $data);
		}
	}
}
