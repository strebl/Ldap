<?php namespace Xavrsl\Ldap;

class Connection implements ConnectionInterface {

	/**
	 * The configuration of the package.
	 *
	 * @var string
	 */
	protected $config;

	/**
	 * The connection to the Ldap.
	 *
	 * @var resource
	 */
	protected $connection;

	/**
	 * Binded to the Ldap.
	 *
	 * @var resource
	 */
	protected $binded;


	/**
	 * Establish the connection to the LDAP.
	 *
	 * @var array  $config
	 * @return Connection
	 */
	function __construct($config)
	{
		$this->config = $config;

		$this->connect();

		$this->bind();
	}

	/**
	 * Establish the connection to the LDAP.
	 *
	 * @return resource
	 */
	public function connect()
	{
		if ( ! is_null($this->connection)) return $this->connection;

		$this->connection = ldap_connect(
													$this->config['server'],
													$this->config['port']
												);

		if ($this->connection === false)
		{
			throw new \Exception("Connection to Ldap server {$server} impossible.");
		}

		ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($this->connection, LDAP_OPT_REFERRALS, 0);
	}

	/**
	 * Bind to the LDAP.
	 *
	 * @return resource
	 */
	public function bind()
	{
		if ( ! is_null($this->binded)) return $this->binded;

		$this->binded = ldap_bind(
											$this->connection,
											$this->config['binddn'],
											$this->config['bindpwd']
										);

		if ($this->binded === false)
		{
			throw new \Exception("Can't bind to the Ldap server with these credentials.");
		}
	}

	public function getResource()
	{
		return ($this->binded === true) ? $this->connection : false;
	}

}