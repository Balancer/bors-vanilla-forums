<?php

namespace B2\Vanilla;

class Comment extends ObjectDb
{
	function table_name() { return 'GDN_Comment'; }

	function table_fields()
	{
		return [
			'id' => 'CommentID',
			'DiscussionID',
			'InsertUserID',
			'UpdateUserID',
			'DeleteUserID',
			'Body' => ['type' => 'text'],
			'Format',
			'DateInserted',
			'DateDeleted',
			'DateUpdated',
			'InsertIPAddress',
			'UpdateIPAddress',
			'Flag',
			'Score',
			'Attributes' => ['type' => 'text'],
		];
	}
}
