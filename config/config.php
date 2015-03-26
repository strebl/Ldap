<?php

return array(
	'default' => array(

		/*
		|--------------------------------------------------------------------------
		| LDAP Server
		|--------------------------------------------------------------------------
		|
		| Address of the LDAP Server
		|
		| Example: 'cas.myuniv.edu'.
		|
		*/

		'server' => 'ldap.domain.fr',

		/*
		|--------------------------------------------------------------------------
		| LDAP Port (389 is default)
		|--------------------------------------------------------------------------
		*/

		'port' => '389',

		/*
		|--------------------------------------------------------------------------
		| LDAP Base DN
		|--------------------------------------------------------------------------
		*/

		'basedn' => 'dc=domain,dc=fr',

		/*
		|--------------------------------------------------------------------------
		| Managed Organisation Units (OU)
		| Only people works for now
		|--------------------------------------------------------------------------
		*/

		'organisationUnits' => ['people', 'groups'],

		/*
		|--------------------------------------------------------------------------
		| LDAP ADMIN bind DN
		|--------------------------------------------------------------------------
		*/

		'binddn' => 'cn=Manager,dc=domain,dc=fr',

		/*
		|--------------------------------------------------------------------------
		| LDAP ADMIN bind password
		|--------------------------------------------------------------------------
		|
		*/
		'bindpwd' => 'password',

		/*
		|--------------------------------------------------------------------------
		| Cache time-to-live value in minutes.
		| How long should we cache result if found
		|--------------------------------------------------------------------------
		*/

		'cachettl'   => 20,

		/*
		|--------------------------------------------------------------------------
		| Caching & Results array key.
		| This is typically a unique attribute from the directory OU
		|--------------------------------------------------------------------------
		*/

		'key'        => 'dn',

		/*
		|--------------------------------------------------------------------------
		| Default filter attribute
		| Will be used when calling short method like :
		| Ldap::people('xavrsl')->displayname;
		|--------------------------------------------------------------------------
		*/

		'filter'        => 'login',

		/*
		|--------------------------------------------------------------------------
		| Global filter attribute
		| Will be used to set constraints like if you only need users with a
		| specific objectClass or to ignore all users starting with sys_*
		| This filter will be added to your filter with an AND operator.
		|
		| Example: (!(|(cn=sys_*)(cn=admin_*)))
		| This filter ignores all users with a cn starting with sys_ or admin_
		|--------------------------------------------------------------------------
		*/

		'globalFilter'	=> '',

		/*
		|--------------------------------------------------------------------------
		| User dn used for user authentication.
		| This is the distinguished name of a user that will authenticate to
		| the directory using a BIND. Typically named 'dn'
		|--------------------------------------------------------------------------
		*/

		'userdn'     => 'dn',

		'searchscope' => 'SUBTREE_SCOPE',

		'attributes' => array(
			'uid',
			'displayName',
			'sn',
			'givenName',
			'mail',
			'edupersonAffiliation',
			'supannAffectation',
			'login',
		),
	),
);