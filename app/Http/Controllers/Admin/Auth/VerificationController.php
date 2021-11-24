<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | Admin that recently registered with the application. Emails may also
    | be re-sent if the Admin didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect admins after verification.
     *
     * @var string
     */
    protected $redirectTo = '/Admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
        $this->middleware('signed')->only('admin.verify');
        $this->middleware('throttle:6,1')->only('admin.verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('Admin')->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('admin.auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user('Admin')->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user('Admin')->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user('Admin')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user('Admin')->markEmailAsVerified()) {
            event(new Verified($request->user('Admin')));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user('Admin')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user('Admin')->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
