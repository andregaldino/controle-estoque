<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestLogin;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PasswordConfirmRequest;
use Reminder;
use Sentinel;
use Session;
use App\User;

class AuthController extends Controller
{
    /**
     * Account sign in.
     *
     * @return View
     */
    public function getSignin()
    {
        return View('index');
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postSignin(UserRequestLogin $request)
    {
        $error = "";
        $dados = $request->only('email','password');
        try {
            if(Sentinel::authenticate($dados, false))
            {
                return redirect()->route("dashboard");
            }

            throw new Exception("Usuario ou Senha não conferem");
            

        } catch (NotActivatedException $e) {
            $error = $e->getMessage();
        } catch (ThrottlingException $e2) {
            $error = $e2->getMessage();
        } catch (Exception $e3){
           $error = $e3->getMessage();
        }
        return redirect()->back()->with('error', $error);
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postSignup(UserRequest $request)
    {
        $error = "";
        $dados = $request->only('first_name','last_name','email','password');
        try {
            $user = Sentinel::registerAndActivate($dados);

            //$role = Sentinel::findRoleById(2);
            //$role->users()->attach($user);

            Sentinel::login($user, false);

            return Redirect::route("dashboard")->with('success', "Usuario Cadastrado com sucesso");

        } catch (UserExistsException $e) {
            $error = $e->getMessage();
        } catch (Exception $e2){
            $error = $e->getMessage();
        }

        return redirect()->back()->with('error', $error);
    }

    /**
     * Forgot password form processing page.
     *
     * @return Redirect
     */
    public function postForgotPassword(PasswordRequest $request)
    {
        $input = $request->all();
        try {
            // Get the user password recovery code
            //$user = Sentinel::getUserProvider()->findByLogin(Input::get('email'));
            $user = Sentinel::findByCredentials(['email' => $input['email']]);

            if (!$user) {
                throw new Exception("Conta não encontrada");
                
            }

            $activation = Activation::completed($user);
            if(!$activation){
                throw new Exception("Conta não ativada!");
                
            }

            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view
            $data = array(
                'user' => $user,
                //'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
                'forgotPasswordUrl' => URL::route('recuperar-senha', [$user->id, $reminder->code]),
                );

            // Send the activation code through email
            Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Account Password Recovery');
            });
        } catch (UserNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('sucess','Email enviado');
    }


    /**
     * Forgot Password Confirmation page.
     *
     * @param number $userId
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId,$passwordResetCode = null)
    {
        if(!$user = Sentinel::findById($userId))
        {
            return redirect()->back();
        }


        // Show the page
        return View('admin.auth.forgot-password-confirm');
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param number $userId
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(PasswordConfirmRequest $request,$userId, $passwordResetCode = null)
    {
        $password = $request->get('password');
        $user = Sentinel::findById($userId);
        if(!$reminder = Reminder::complete($user, $passwordResetCode,$password))
        {
            return redirect()->back();
        }

        return redirect()->route('login');
        //return Redirect::route('signin')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
    }


     /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        Sentinel::logout();

        return redirect()->route('index');
    }


}
