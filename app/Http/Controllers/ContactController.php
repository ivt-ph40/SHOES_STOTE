<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use App\Http\Requests\SendMessageRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function showContactForm(){
        $cartCount = Cart::content()->count();
        return view('users.contact-us', compact('cartCount'));
    }
    public function sendMail(SendMessageRequest $request){
        $toEmail = $request->email;
        $fromEmail ='admin@gmail.com';
        $username = $request->username;
<<<<<<< HEAD
        $data =['username' => $username, 'content' => $request->content]; //get data from form contact-us
=======
        $data =['username' => $username, 'message' => $request->message]; //get data from form contact-us
>>>>>>> 7460118e39d061dca36f8a2a9014ad76418aeaff
        \Mail::send('mails.contact-us', $data, function($message) use ($toEmail, $fromEmail, $username){
            $message->to($toEmail, $username);
            // $message->from($fromEmail, 'Admin');
            $message->subject('Contact Mail');
        });
        return view('users.success');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
