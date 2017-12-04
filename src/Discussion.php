<?php

namespace B2\Vanilla;

class Discussion extends ObjectDb
{
	function table_name() { return 'GDN_Discussion'; }

	function table_fields()
	{
		return [
			'id' => 'DiscussionID',
			'Type',
			'ForeignID',
			'CategoryID',
			'InsertUserID',
			'UpdateUserID',
			'FirstCommentID',
			'LastCommentID',
			'Name',
			'Body' => ['type' => 'text'],
			'Format',
			'Tags' => ['type' => 'text'],
			'CountComments',
			'CountBookmarks',
			'CountViews',
			'Closed',
			'Announce',
			'Sink',
			'DateInserted',
			'DateUpdated',
			'InsertIPAddress',
			'UpdateIPAddress',
			'DateLastComment',
			'LastCommentUserID',
			'Score',
			'Attributes' => ['type' => 'text'],
			'RegardingID',
		];
	}
}
