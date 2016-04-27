<?php
	/*
	 * MYSQLi Database only one connection is allowed
	 */
	class Database {
		private $_connection;
		// Store the single instance
		private static $_instance;

		/*
		 * Get an instance of the database
		 */
		public static function getInstance() {
			if (!self::$_instance) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/*
		 * Get an instance of the database
		 */
		public function __construct() {
			$this->_connection = new mysqli('localhost', 'lee', 'lee1', 'php_oop');
			// Error handling
			if (mysqli_connect_error()) {
				trigger_error('Failed to connect to MySQL:' . mysqli_connect_error(), E_USER_ER);
			}
		}

		/*
		 * Empty clone magic method to prevent duplication
		 */
		private function __clone() {}

		/*
		 * Get the MYSQLi connection
		 */
		public function getConnection() {
			return $this->_connection;
		}
	}

?>