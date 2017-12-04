<?php

namespace B2\Vanilla;

class User extends ObjectDb
{
	function table_name() { return 'GDN_User'; }

	function table_fields()
	{
		return [
			'id' => 'UserID',
			'Name',
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
