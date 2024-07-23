<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    public function verify(Request $request, $user_id, $hash)
    {
        $users = User::where('user_id', $user_id)->firstOrFail();

        if (!hash_equals(sha1($users->email), $hash)) {
            return redirect('/')->withErrors(['error' => 'Invalid verification link.']);
        }

        if ($users->hasVerifiedEmail()) {
            return redirect('/')->with('message', 'Your email is already verified.');
        }

        if ($users->markEmailAsVerified()) {
            event(new Verified($users));
            return redirect('/')->with('message', 'Email successfully verified.');
        }

        return redirect('/')->withErrors(['error' => 'Failed to verify email.']);
    }

    public function resend(Request $request)
    {
        $users = $request->users();

        if ($users->hasVerifiedEmail()) {
            return redirect('/')->with('message', 'Your email is already verified.');
        }

        $users->sendEmailVerificationNotification();

        return redirect('/')->with('message', 'A fresh verification link has been sent to your email address.');
    }
}

