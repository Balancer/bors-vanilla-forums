<?php

namespace B2\Vanilla;

class Category extends ObjectDb
{
	function table_name() { return 'GDN_Category'; }

	function table_fields()
	{
		return [
			'id' => 'CategoryID',
			'ParentCategoryID',
			'TreeLeft',
			'TreeRight',
			'Depth',
			'CountDiscussions',
			'CountComments',
			'DateMarkedRead',
			'AllowDiscussions',
			'Archived',
			'title' => 'Name',
			'UrlCode',
			'Description',
			'Sort',
			'CssClass',
			'Photo',
			'PermissionCategoryID',
			'PointsCategoryID',
			'HideAllDiscussions',
			'DisplayAs',
			'InsertUserID',
			'UpdateUserID',
			'DateInserted',
			'DateUpdated',
			'LastCommentID',
			'LastDiscussionID',
			'LastDateInserted',
			'AllowedDiscussionTypes',
			'DefaultDiscussionType',
			'AllowFileUploads',
		];
	}
}
