<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;
class AuthControllers extends Controller
{
public function login(Request $request){
    if ($request->isPost())
    {
        var_dump($request->getBody());exit;
    }
    $this->setLayout('auth');
return $this->render('login');
}

public function register(Request $request){
    $this->setLayout('auth');
    $user = new User();
if ($request->isPost())
{


    $data = $request->getBody();

     $user->loadData($data);

     if ($user->validate() && $user->save())
     {
         Application::$app->session->setFlash('success','Thanks for registering');
      Application::$app->response->redirect('/');

     }
    //var_dump($user);exit;
     return  $this->render('register',[
         'model'=>$user,
     ]);
}

return $this->render('register',['model'=>$user]);
}

}