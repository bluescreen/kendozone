<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\InviteRequest;
use App\Invite;
use App\Mailers\AppMailer;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InviteController extends Controller
{

    protected $currentModelName;

    public function __construct()
    {
        $this->currentModelName = trans_choice('crud.tournament_invitations', 1);
        View::share('currentModelName', $this->currentModelName);

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Triggered when User click Activation Link received in mail
     *
     * @param  Request $request
     * @param  AppMailer $mailer
     */
    public function register($token)
    {
        // Get available invitation
        $invite = Invite::getActiveInvite($token);

        // Check if user is already registered
        if (!is_null($invite)) {
//            $tournament = Tournament::findOrFail($invite->tournament_id);
            $user = User::where('email', $invite->email)->first();
            if (is_null($user)) {
                // Redirect to user creation --
                return view('auth/invite', compact('token'));
            } else {
                $invite->consume();
                flash("success", "Registro completo");
                return view('auth/login');


            }
        } else {
            $invite = Invite::where('code', $token)->first();
            if (is_null($invite)) {
                dd("No invitation");

            } else {
                dd("invitation used");
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InviteRequest|Request $request
     * @param AppMailer $mailer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'recipients' => 'required'
        ]);


        $tournament = Tournament::findOrFail($request->get("tournamentId"));
        $recipients = json_decode($request->get("recipients"));
        foreach ($recipients as $recipient) {
            // Mail to Recipients
            $invite = new Invite();
            $code = $invite->generate($recipient, $tournament);
            $mailer->sendEmailInvitationTo($recipient, $tournament, $code);

        }
        flash('success', trans('core.operation_successful'));
        return redirect("tournaments/$tournament->id/edit");


//        dd($recipients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournament = Tournament::where("id", "=", $id)->first();
        return view('invitation.show', compact('tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}