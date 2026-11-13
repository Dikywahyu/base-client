<?php

namespace App\Socialite;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class SsoProvider extends AbstractProvider implements ProviderInterface
{
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(config('services.sso.base_url') . '/oauth/authorize', $state);
    }

    protected function getTokenUrl()
    {
        return config('services.sso.base_url') . '/oauth/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(config('services.sso.base_url') . '/api/user-profile', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
        ]);

        $body = json_decode($response->getBody(), true);
        return $body['data'] ?? [];
    }

    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id'          => $user['id'],
            'name'        => $user['name'],
            'email'       => $user['email'],
            'username'    => $user['username'] ?? null,
            'avatar'      => $user['avatar'] ?? null,
            'roles'       => $user['roles'] ?? [],
            'permissions' => $user['permissions'] ?? [],
        ]);
    }
}
