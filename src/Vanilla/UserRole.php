<?php

namespace B2\Vanilla;

class UserRole extends ObjectDb
{
	function table_name() { return 'GDN_UserRole'; }

	function table_fields()
	{
		return [
			'UserID',
			'RoleID',
		];
	}
}
