<?php

namespace B2\Vanilla;

class User extends ObjectDb
{
	var $class_title = 'пользователь';
	var $class_title_m = 'пользователи';

	function table_name() { return 'GDN_User'; }

	function table_fields()
	{
		return [
			'id' => 'UserID',
			'title' => 'Name',
			'Password',
			'HashMethod',
			'Photo',
			'Title',
			'Location',
			'About' => ['type' => 'text'],
			'Email',
			'ShowEmail',
			'Gender',
			'CountVisits',
			'CountInvitations',
			'CountNotifications',
			'InviteUserID',
			'DiscoveryText' => ['type' => 'text'],
			'Preferences' => ['type' => 'text'],
			'Permissions' => ['type' => 'text'],
			'Attributes' => ['type' => 'text'],
			'DateSetInvitations',
			'DateOfBirth',
			'DateFirstVisit',
			'DateLastActive',
			'LastIPAddress',
			'AllIPAddresses',
			'DateInserted',
			'InsertIPAddress',
			'DateUpdated',
			'UpdateIPAddress',
			'HourOffset',
			'Score',
			'Admin',
			'Confirmed',
			'Verified',
			'Banned',
			'Deleted',
			'Points',
			'CountUnreadConversations',
			'CountDiscussions',
			'CountUnreadDiscussions',
			'CountComments',
			'CountDrafts',
			'CountBookmarks',
		];
	}
}
