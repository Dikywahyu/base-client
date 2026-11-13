<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SsoController extends Controller
{
    /**
     * Lempar user ke server IAM Pusat Cwcu
     */
    public function redirect()
    {
        return Socialite::driver('sso')->redirect();
    }

    /**
     * Tangkap data kiriman balik dari server IAM
     */
    public function callback()
    {
        try {
            // Mengambil object user yang berhasil login lewat jembatan OAuth2
            $ssoUser = Socialite::driver('sso')->user();

            // Tampilkan datanya langsung di layar browser untuk pembuktian test sukses
            return response()->json([
                'status'  => 'Sukses Terkoneksi dengan IAM Pusat!',
                'message' => 'Socialite berhasil menangkap data user dan token Anda.',
                'sso_data' => [
                    'token'       => $ssoUser->token, // Access Token JWT dari Server IAM
                    'id_user'     => $ssoUser->getId(),
                    'nama'        => $ssoUser->getName(),
                    'email'       => $ssoUser->getEmail(),
                    'avatar'      => $ssoUser->getAvatar(),
                    'roles'       => $ssoUser->roles,      // Tangkapan Role dari Spatie Pusat
                    'permissions' => $ssoUser->permissions, // Tangkapan Permission Pusat
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'Error SSO Callback',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
