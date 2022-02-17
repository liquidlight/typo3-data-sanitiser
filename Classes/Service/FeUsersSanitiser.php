<?php

namespace LiquidLight\DataSanitiser\Service;

use LiquidLight\DataSanitiser\Service\AbstractSanitiser;

class FeUsersSanitiser extends AbstractSanitiser
{
	public function __construct()
	{
		$this
			->setTable('fe_users')
			->setMapping([
				//TYPO3 Core fields
				'username' => 'userName',
				'password' => 'password',
				'address' => 'streetAddress',
				'telephone' => 'phoneNumber',
				'fax' => 'phoneNumber',
				'email' => 'safeEmail',
				'uc' => 'serialized',
				'zip' => 'postcode',
				'city' => 'city',
				'country' => 'countryCode',
				'www' => 'domainName',
				'company' => 'company',
				'first_name' => 'firstName',
				'last_name' => 'lastName',
				'middle_name' => 'firstName',
				'felogin_forgotHash' => 'md5',
			])
			->setUnique(['username'])
			->setEqual([
				// The field 'email' gets the value of field 'username'.
				'email' => 'username',
			]);
	}

}
