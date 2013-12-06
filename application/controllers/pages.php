<?php

/**
  * A controller for the public accessible pages.
  */
class Pages extends CI_Controller {

	private function loadHeader($lang)
	{
		$this->load->view('templates/header_'.$lang);
	}

	function __construct()
	{
		// Call the Controller constructor
		parent::__construct();
		$this->load->library('session');
	}

	/**
	  * Loads default home page.
	  */
	public function index($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/index.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/index');
		$this->load->view('templates/footer');
	}

	/**
	  * Loads pages in church general information menu.
	  */
	public function church($page = 'introduction', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/churchInfo/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/churchInfo/'.$page);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads pastor page.
	  */
	public function pastors($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/churchInfo/pastors.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('pastor_model', 'pastor');

		$data['pastors'] = $this->pastor->get_current_pastors($lang);

		$this->loadHeader($lang);
		$this->load->view($lang.'/churchInfo/pastors', $data);
		$this->load->view('templates/footer');
	}

	/**
	* Loads calendar page.	
	*/
	public function calendar($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/churchInfo/calendar.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		# $this->load->model('event_model', 'event');
		# $data['events'] = $this->event->get_events();

		$this->loadHeader($lang);
		$this->load->view($lang.'/churchInfo/calendar');
		$this->load->view('templates/footer');		
	}

	/**
	 * Loads pages in church worship menu.
	 */
	public function worship($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/worship/worship.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('message_model', 'message');

		$data['messages'] = $this->message->get_messages();

		$this->loadHeader($lang);
		$this->load->view($lang.'/worship/worship', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads page for adding Sunday message.
	  */
	public function add_sunday_message($lang = 'ch')
	{
		$logged_in = $this->session->userdata('logged_in');
		if (!isset($logged_in) || $logged_in === FALSE)
		{
			// TODO: show authentication error.
			show_404();
		}

		if ( ! file_exists('application/views/'.$lang.'/worship/addSundayMessage.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/worship/addSundayMessage');
		$this->load->view('templates/footer');
	}

	/**
	  * Loads fellowships page.
	  */
	public function fellowships($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/activities/fellowships.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('fellowship_model', 'fellowship');

		$data['fellowships'] = $this->fellowship->get_fellowships();

		$this->loadHeader($lang);
		$this->load->view($lang.'/activities/fellowships', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads fellowship pages.
	  */
	public function fellowship($fellowshipKey = 'pine', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/activities/fellowship.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model('fellowship_model', 'fellowship');
		$data['fellowship'] = $this->fellowship->get_fellowship($fellowshipKey);

		$this->loadHeader($lang);
		$this->load->view($lang.'/activities/fellowship', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads pages in church activities menu.
	  */
	public function activities($page = 'sundaySchoolAdults', $lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/activities/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/activities/'.$page);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads prayer page.
	  */
	public function prayer($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/request/prayer.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->loadHeader($lang);
		$this->load->view($lang.'/request/prayer');
		$this->load->view('templates/footer');
	}

	/**
	  *	Loads prayer history page.
	  */
	public function prayerhistory($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/request/requesthistory.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model('request_model', 'request');
		$data['requests'] = $this->request->get_requests($lang);

		$this->loadHeader($lang);
		$this->load->view($lang.'/request/requesthistory', $data);
		$this->load->view('templates/footer');
	}

	/**
	  * Loads mission pages
	  */
	public function missions($lang = 'ch')
	{
		if ( ! file_exists('application/views/'.$lang.'/missions.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model('missionary_model','missionary');
		$data['missionaries'] = $this->missionary->get_missionaries($lang);

		$this->loadHeader($lang);
		$this->load->view($lang.'/missions', $data);
		$this->load->view('templates/footer');
	}
}
?>
