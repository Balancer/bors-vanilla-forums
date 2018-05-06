<?php

namespace B2\Vanilla;

class Permission extends ObjectDb
{
	function table_name() { return 'GDN_Permission'; }

	function table_fields()
	{
		return [
			'id' => 'PermissionID',
			'role_id' => 'RoleID',
			'junction_table' => 'JunctionTable',
			'junction_column' => 'JunctionColumn',
			'junction_id' => 'JunctionID',
			'Garden_Email_View' => ['name' => 'Garden.Email.View'],
			'Garden_Settings_Manage' => ['name' => 'Garden.Settings.Manage'],
			'Garden_Settings_View' => ['name' => 'Garden.Settings.View'],
			'Garden_SignIn_Allow' => ['name' => 'Garden.SignIn.Allow'],
			'Garden_Users_Add' => ['name' => 'Garden.Users.Add'],
			'Garden_Users_Edit' => ['name' => 'Garden.Users.Edit'],
			'Garden_Users_Delete' => ['name' => 'Garden.Users.Delete'],
			'Garden_Users_Approve' => ['name' => 'Garden.Users.Approve'],
			'Garden_Activity_Delete' => ['name' => 'Garden.Activity.Delete'],
			'Garden_Activity_View' => ['name' => 'Garden.Activity.View'],
			'Garden_Profiles_View' => ['name' => 'Garden.Profiles.View'],
			'Garden_Profiles_Edit' => ['name' => 'Garden.Profiles.Edit'],
			'Garden_Curation_Manage' => ['name' => 'Garden.Curation.Manage'],
			'Garden_Moderation_Manage' => ['name' => 'Garden.Moderation.Manage'],
			'Garden_PersonalInfo_View' => ['name' => 'Garden.PersonalInfo.View'],
			'Garden_AdvancedNotifications_Allow' => ['name' => 'Garden.AdvancedNotifications.Allow'],
			'Garden_Community_Manage' => ['name' => 'Garden.Community.Manage'],
			'Conversations_Moderation_Manage' => ['name' => 'Conversations.Moderation.Manage'],
			'Conversations_Conversations_Add' => ['name' => 'Conversations.Conversations.Add'],
			'Vanilla_Approval_Require' => ['name' => 'Vanilla.Approval.Require'],
			'Vanilla_Comments_Me' => ['name' => 'Vanilla.Comments.Me'],
			'Vanilla_Discussions_View' => ['name' => 'Vanilla.Discussions.View'],
			'Vanilla_Discussions_Add' => ['name' => 'Vanilla.Discussions.Add'],
			'Vanilla_Discussions_Edit' => ['name' => 'Vanilla.Discussions.Edit'],
			'Vanilla_Discussions_Announce' => ['name' => 'Vanilla.Discussions.Announce'],
			'Vanilla_Discussions_Sink' => ['name' => 'Vanilla.Discussions.Sink'],
			'Vanilla_Discussions_Close' => ['name' => 'Vanilla.Discussions.Close'],
			'Vanilla_Discussions_Delete' => ['name' => 'Vanilla.Discussions.Delete'],
			'Vanilla_Comments_Add' => ['name' => 'Vanilla.Comments.Add'],
			'Vanilla_Comments_Edit' => ['name' => 'Vanilla.Comments.Edit'],
			'Vanilla_Comments_Delete' => ['name' => 'Vanilla.Comments.Delete'],
			'Plugins_Attachments_Upload_Allow' => ['name' => 'Plugins.Attachments.Upload.Allow'],
			'Plugins_Tagging_Add' => ['name' => 'Plugins.Tagging.Add'],
			'Plugins_Flagging_Notify' => ['name' => 'Plugins.Flagging.Notify'],
		];
	}
}
