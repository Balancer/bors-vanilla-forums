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
			'category_id' => 'CategoryID',
			'author_id' => ['name' => 'InsertUserID', 'class' => User::class],
			'UpdateUserID',
			'FirstCommentID',
			'LastCommentID',
			'title' => 'Name',
			'source' => ['name' => 'Body', 'type' => 'markdown'],
			'Format',
			'Tags' => ['type' => 'text'],
			'num_replies' => 'CountComments',
			'CountBookmarks',
			'CountViews',
			'Closed',
			'Announce',
			'Sink',
			'create_time' => 'UNIX_TIMESTAMP(`DateInserted`)',
			'modify_time' => 'UNIX_TIMESTAMP(`DateUpdated`)',
			'InsertIPAddress',
			'UpdateIPAddress',
			'DateLastComment',
			'LastCommentUserID',
			'Score',
			'Attributes' => ['type' => 'text'],
			'RegardingID',
		];
	}

	function html() { return \bors_markup_markdown::factory()->parse($this->source()); }

	function snip($length = 512)
	{
		return strip_text($this->html(), $length);
	}

	function image()
	{
		if(!preg_match('@!\[.*?\]\((.+?) ""\)@', $this->source(), $m))
			return \B2\Nil::factory();

		return \bors_image_simplest::load($m[1]);
	}

	function thumb()
	{
		return $this->image()->thumbnail('64x');
	}
}
