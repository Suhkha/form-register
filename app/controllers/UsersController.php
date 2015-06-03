<?php 
class UsersController extends BaseController{
    protected $layout = "layout.main";

    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('getDashboard')));
    }

    public function getRegister(){
        $this->layout->content = View::make('users.register');
    }

    public function postCreate(){
        $validator = Validator::make(Input::all(), User::$rules);

        if($validator->passes()){
            //We gonna save data in our database
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname  = Input::get('lastname');
            $user->email     = Input::get('email');
            $user->password  = Hash::make(Input::get('password'));

            $user->save();

            Mail::send('users.mails.welcome', array('firstname'=>Input::get('firstname')), function($message){
                $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to the Laravel 4 Auth App!');
            });

            return Redirect::to('users/login')->with('message','Thanks for registering!');
        } else {
            //We gonna show a error message
            return Redirect::to('users/register')->with('message', 'The following errors ocurred')->withErrors($validator)->withInput();
        }
    }

    public function getLogin(){
        $this->layout->content = View::make('users.login');
    }

    public function postSignin(){
        if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){
            return Redirect::to('users/dashboard')->with('message', 'You are now logged in');
        } else {
            return Redirect::to('users/login')
            ->with('message', 'Your username-password combination was incorrect')
            ->withInput();
        }
    }

    public function getDashboard(){
        $users = User::all();
        $this->layout->content = View::make('users.dashboard')->with('users', $users);
    }

    public  function getEdit($id){
        $users = User::find($id);
        $this->layout->content = View::make('users.edit')->with('users', $users);
    }

    public function postUpdate($id){
        $validator_update = Validator::make(Input::all(), User::$rules_update);

        if($validator_update->fails()){
            return Redirect::to('users/edit/'.$id)
            ->withErrors($validator_update)
            ->withInput(Input::except('password'));
        } else {
            $users = User::find($id);
            $users->firstname = Input::get('firstname');
            $users->lastname  = Input::get('lastname');
            $users->email     = Input::get('email');
            $users->save();

            return Redirect::to('users/dashboard')->with('message','All done!');
        }
    }

    public  function getDelete($id){
        $users = User::find($id);
        $session_user = Auth::user()->email;

        if($users->email == $session_user){

          return Redirect::to('users/dashboard/')->with('message','You can not delete yourself dude!');  
        
        } else {

        $users->delete();
        return Redirect::to('users/dashboard/')->with('message','Delete complete!');
        }
    }

    public  function getPassword($id){
        $users = User::find($id);
        $this->layout->content = View::make('users.password')->with('users', $users);
    }



    public function getLogout(){
        Auth::logout();
        return Redirect::to('users/login')->with('message', 'You are now logged out!');
    }

}


?>