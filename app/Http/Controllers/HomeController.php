<?php

namespace App\Http\Controllers;

use App\Http\Requests;
//use Faker\Provider\pl_PL\Company;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\UserCompany;
use App\User;
use App\Company;
use App\Region;
use App\City;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\UserInformation;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, UserCompany $userCompany, Company $company, $id = NULL){


        if(!Auth::user()->getUserInformation){
            $region = Region::all();
            return view('auth.register_aditional')->with('region', $region);

        }
                        if(Auth::check()){
                            $curentUser = Auth::user();
                            $userInfo = $curentUser->getUserInformation;
                            $companies = $curentUser->getCompanies;
                        }

                        if(Auth::user()->hasRole('company_owner')){

                            $menu = array(
                                'my_page'       => array(
                                    'title' => 'Моя страница',
                                    'url'   => ''
                                ),
                                'my_shop'    => array(
                                    'title' => 'Мои магазины',
                                    'url'   => ''
                                ),
                                'message'   => array(
                                    'title' => 'Центр сообщений',
                                    'url'   => ''
                                ),
                                'payments' => array(
                                    'title' => 'Платежи',
                                    'url'   => ''
                                ),
                                'delivery'         => array(
                                    'title' => 'Доставка ',
                                    'url'   => ''
                                ),
                                'setting'         => array(
                                'title' => 'Настройка',
                                'url'   => ''
                            )
                            );


                            return view('homeOwnerUser')->with('userInfo', $userInfo)->with('curentUser', $curentUser)->with('menu', $menu);
                        }

        $menu = array(
            'my_page'       => array(
                'title' => 'Моя страница',
                'url'   => '/home'
            ),
            'message'   => array(
                'title' => 'Центр сообщений',
                'url'   => 'user/simple_user/message'
            ),
            'payments' => array(
                'title' => 'Платежи',
                'url'   => 'user/simple_user/payments'
            ),
            'delivery'         => array(
                'title' => 'Доставка',
                'url'   => 'user/simple_user/delivery'
            ),
            'liked'         => array(
                'title' => 'Избранное',
                'url'   => 'user/simple_user/liked'
            ),
            'basket'         => array(
                'title' => 'Корзина',
                'url'   => 'user/simple_user/basket'
            ),
            'setting'         => array(
                'title' => 'Настройка',
                'url'   => 'user/simple_user/setting'
            )
        );

        return view('user.simple_user.home')->with('userInfo', $userInfo)->with('curentUser', $curentUser)->with('simple_user_menu', $menu);

    }
    public function registerOwner(User $user, UserCompany $userCompany, Company $company, $id = NULL){
        die('Surprise, you are here !!!');

        if(Auth::check()){
            $curentUser = Auth::user();
            $userInfo = $curentUser->getUserInformation;
            $companies = $curentUser->getCompanies;
        }

        return view('homeOwnerUser')->with('userInfo', $userInfo)->with('curentUser', $curentUser);


    }

    public function test(){
        $curentUser = Auth::user();
        $info = $curentUser->getUserInformation;
        $info->name = 'asdas';
        $info->save();

    }
}
