<?php

/* Note to tinkerers: To create your own custom authentication function, simply replace the function below
   with one of your own design. It needs to return false if the user is not authenticated,
   or an associative array if the user is ok. The array looks like so:
        Array
        (
           [username] => jdoe
           [displayname] => John Doe
           [group] => Marketing
           [email] => doe@acmewidget.com
        )

	The group returned here will be matched up to RS groups using the matching table configured by the user.
	If there is no match, the fallback user group will be used.
*/

function simpleldap_authenticate($username,$password){

	$ldapconfig['host'] = '192.168.1.19';//CHANGE THIS TO THE CORRECT LDAP SERVER
	$ldapconfig['port'] = '389';
	$ldapconfig['basedn'] = 'ou=groups,dc=divdist,dc=com';//CHANGE THIS TO THE CORRECT BASE DN
	$ldapconfig['usersdn'] = 'cn=users';//CHANGE THIS TO THE CORRECT USER OU/CN
	$ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
	ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
	ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);
	$dn="uid=".$username.",".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];
		if ($bind=ldap_bind($ds, $dn, $password)) {
		  	$result = ldap_search($ds, $dn);
			$data = ldap_get_entries($ds, $result);
		} else {
		 echo "Login Failed: Please check your username or password";
		}
	
		
		$return['domain'] = $data['dn'];
		$return['username'] = $data['uid'];
		$return['displayname'] = $data['cn'];
		$return['group'] = $data['ou'];
		$return['email'] = $data['mail'];
		return $return;

	}


	ldap_unbind($ds);



}
