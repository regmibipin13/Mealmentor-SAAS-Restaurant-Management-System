<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Suscription;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Cixware\Esewa\Client;
use Cixware\Esewa\Config;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users', 'digits:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'is_admin_side' => 0,
        ]);
    }

    public function showRestaurantRegistrationForm()
    {
        return view('auth.restaurant_register');
    }


    public function restaurantRegister(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone', 'digits:10'],
        ]);
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:restaurants'],
            'phone' => ['required', 'unique:restaurants,phone', 'digits:10'],
            'address' => ['required'],
            'photo' => ['required'],
            'plan_id' => ['required'],
        ]);

        $request->merge([
            'slug' => SlugService::createSlug(Restaurant::class, 'slug', $request->name, ['unique' => true])
        ]);
        $restaurant = Restaurant::create($request->all());
        $restaurant->addMedia($request->photo)->toMediaCollection();
        $user = User::find($restaurant->user_id);
        // Auth::login($user);
        // return redirect()->to('/home')->with('success', 'Your Restaurant is registered successfully');
        $restaurant->suscribe($request->plan_id);
    }

    public function restaurantRegisterSuccess(Request $request)
    {
        $successUrl = route('restaurant.register.success');
        $failureUrl = route('restaurant.register.failed');

        // Config for development.
        $config = new Config($successUrl, $failureUrl);

        // Config for production.
        // $config = new Config($successUrl, $failureUrl, 'b4e...e8c753...2c6e8b');

        // Initialize eSewa client.
        $esewa = new Client($config);


        if ($esewa->verify($request->refId, $request->oid, $request->amt)) {
            $suscription = Suscription::find($request->suscription);
            $suscription->update([
                'payment_ref_id' => $request->refId,
                'verified' => 1,
            ]);
            $user_id = Restaurant::find($suscription->restaurant_id)->user_id;
            $user = User::find($user_id);
            Auth::login($user);
            return redirect()->to('/home')->with('success', 'Your Restaurant is registered successfully');
        } else {
            $this->restaurantRegisterFailed();
        }
    }
    public function restaurantRegisterFailed()
    {
        return 'Payment Failed Please Try Again Later';
    }
}
