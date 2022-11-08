<?php

namespace App\Services;

class Newsletter
{
	public function subscribe(string $email, string $list = null)
	{
		$list ??= config('services.mailchimp.lists.subscribers');
		$mailchimp = new \MailchimpMarketing\ApiClient();

		$mailchimp->setConfig([
			'apiKey' => config('services.mailchimp.key'),
			'server' => 'us21',
		]);

		return $mailchimp->lists->addListMember($list, [
			'email_address' => $email,
			'status'        => 'subscribed',
		]);
	}
}
