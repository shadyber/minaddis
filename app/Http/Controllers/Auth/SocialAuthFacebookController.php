<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Socialite;

use Auth;

use Exception;

use App\User;



class SocialAuthFacebookController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToFacebook()

    {

        return Socialite::driver('facebook')->redirect();

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleFacebookCallback()

    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        }

        else {
            $existingUser = User::where('email', $user->getId() . '@facebook.com')->first();
            if ($existingUser) {
                auth()->login($existingUser, true);
            } else {

                $newUser = new User;
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
                if (!$newUser->email) {
                    $newUser->email = $user->getId() . '@facebook.com';
                }
                $newUser->email_verified_at = now();
                $newUser->avatar = $user->getAvatar();
                $newUser->password = encrypt('passw)rd');
                $newUser->save();

                auth()->login($newUser, true);
            }
        }
        return redirect('/home');
    }

}
