<?php

namespace B2\Vanilla;

class Role extends ObjectDb
{
	function table_name() { return 'GDN_Role'; }

	function table_fields()
	{
		return [
			'id' => 'RoleID',
			'Name',
			'Description',
			'Type',
			'Sort',
			'Deletable',
			'CanSession',
			'PersonalInfo',
		];
	}
}
