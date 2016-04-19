<?php

/*
 * Physical Address
 */

class Address {
	// Street Address
	public $street_address_1;
	public $street_address_2;

	// Name of the City
	public $city_name;

	// Name of the subdivision
	public $subdivision_name;

	// Postal code
	protected $_postal_code;

	// Name of the country
	public $country_name;

	// Primary key of an address
	protected $_address_id;

	// When the recoed was created and last updated
	protected $_time_created;
	protected $_time_updated;

	/*
	 * Constructor
	 * Optional array of property manes and values
	 */
	function __construct($data = array()) {
		$this->_time_created = time();

		// Ensure that the address can be populated
		if (!is_array($data)) {
			trigger_error('Unable to construct address with a ' . get_class($name));
		}

		// If there is at least one value populate the address value with it
		if (count($data) > 0) {
			foreach ($data as $name => $value) {
				// Special case for protected properties
				if (in_array($name, array(
						'time_created',
						'time_updated',
					))) {
						$name = '_' . $name;
				}
				$this->$name = $value;
			}
		}
	}

	/*
	 * Magic __get
	 */

	function __get($name) {
		// Postal code lookup if unset
		if (!$this->_postal_code) {
			$this->_postal_code = $this->_postal_code_guess();
		}

		// Attempt to return a protected property by name
		$protected_property_name = '_' . $name;
		if (property_exists($this, $protected_property_name)) {
			return $this->$protected_property_name;
		}

		// Unable to access property trigger error
		trigger_error('Undefined property via __get(): ' . $name);
		return NULL;
	}

	/*
	 * Magic __set
	 */

	function __set($name, $value) {
		// Allow anything to set the postal code
		if ('postal_code' == $name) {
			$this->$name = $value;
			return;
		}

		// Unable to access property trigger error
		trigger_error('Undefined or unallowed property via set(): ' . $name);
	}

	/*
	 * Magic __toString
	 */

	function __toString() {
		return $this->display();
	}

	/*
	 * Guess the postal code given the subdivision and city name
	 * TODO - Replace with a database lookup. 
	 */

	protected function _postal_code_guess() {
		return 'LOOKUP';
	}

/*
 * Display an address in HTML
 */
	
	function display() {
		$output = '';

		//Street address
		$output .= $this->street_address_1;
		if ($this->street_address_2) {
			$output .= '<br />' . $this->street_address_2;
		}

		// City subdivision and postcode
		$output .= '<br />';
		$output .= $this->city_name . ', ' . $this->subdivision_name;
		$output .= ' ' . $this->postal_code;

		// Country
		$output .= '<br />';
		$output .= $this->country_name;

		return $output;
	}
}

?>