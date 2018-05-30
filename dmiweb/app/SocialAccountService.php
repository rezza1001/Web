<?php

namespace App;

use Laravel\Socialite\Contracts\Provider;

class SocialAccountService {
	public function createOrGetUser(Provider $provider) {

		$providerUser = $provider->user();
		$providerName = class_basename($provider);

		$account = SocialAccount::whereProvider($providerName)
			->whereProviderUserId($providerUser->getId())
			->first();
		//if account exist, do.....
		if ($account) {
			return $account->user;
		} else {

			$account = new SocialAccount([
					'provider_user_id' => $providerUser->getId(),
					'provider'         => $providerName
				]);
			$providerid    = $providerUser->getId();
			$user          = User::whereEmail($providerUser->getEmail())->first();
			$hasprovider   = SocialAccount::where('provider_user_id', $providerid)->first();
			$provideremail = $providerUser->getEmail();

			if (!$user || !$hasprovider || is_null($provideremail)) {
				$user = User::create([
						'email'  => $providerUser->getEmail(),
						'name'   => $providerUser->getName(),
						'avatar' => $providerUser->getAvatar(),
					]);
			}

			$account->user()->associate($user);
			$account->save();

			return $user;

		}

	}
}
