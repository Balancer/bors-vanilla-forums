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
			'slug' => 'UrlCode',
			'description' => 'Description',
			'Sort',
			'CssClass',
			'image_file_name' => 'Photo',
			'permission_category_id' => 'PermissionCategoryID',
			'PointsCategoryID',
			'HideAllDiscussions',
			'DisplayAs',
			'InsertUserID',
			'UpdateUserID',
			'create_time' => 'UNIX_TIMESTAMP(`DateInserted`)',
			'modify_time' => 'UNIX_TIMESTAMP(`DateUpdated`)',
			'LastCommentID',
			'LastDiscussionID',
			'LastDateInserted',
			'AllowedDiscussionTypes',
			'DefaultDiscussionType',
			'AllowFileUploads',
		];
	}
}
