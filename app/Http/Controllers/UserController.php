<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    protected function validator(Request $request)
    {
        return Validator::make($request->all() , [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'current_password'  => 'required_with:password',
            'password' => ['string', 'min:6', 'confirmed','different:current_password'],
            'confirm_password' => 'same:password',
            'age' => ['integer','between:1,115'],
            'gender' => ['boolean','in:0,1'],
            'picture' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function index()
    {
        $user = Auth::user();

        return view('users.account',[
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $inputs = $request->all();

        unset($inputs['current_password']);
        unset($inputs['password']);
        unset($inputs['confirm_password']);
        unset($inputs['picture']);
        
        
        if ($request->file('picture')) {
            // $file = $request->file('picture');

            // $original_name = $file->getClientOriginalName();
            
            // $file_path = $file->getPathName();
            $destinationPath = public_path('uploads\files ');
            $url = $request->file('picture')->getClientOriginalExtension();
            $filename = uniqid().'.'.$url;
            $request->file('picture')->move($destinationPath, $filename);
            //dd($destinationPath . $filename);//"C:\Users\Hovo Sukiasyan\Desktop\ Hovo\laravel\task\public\uploads\files 5c4b4e6b0296a.png"
        }

        //unset kenes passwordi het kapvac fielder@ vortev karox e mard@ chi poxe password


        //ay hmi kstuges ete kpoxe password hetevyal gorcoxutyunner@ kenes u ete sax ok e inputsi mej passwordn el kavelcnes
        if($request->has('password')) {
            $user = Auth::user();
            
            $stored_password = $user->password;//DB-i passwordy
            
            $current_password = $request->get('current_password');
            
            
            //ay es if-i mejin@ arden bdi googles kardas tesnis te inchx kstuges
            if(! Hash::check($current_password, $stored_password)){
                return redirect()->back()->with('error', 'Current password is not correct!');
            }
            //ete ok e current password@

            $inputs['password'] = Hash::make($request->get('password'));
            $user->update($inputs);
        }

        //nafsyaki kstuges update kexni te che, karox e inch-vor problem ka
        if(!Auth::user()->update($inputs)){
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        //ok e sax, redirect era ur or petq e
        
        return redirect()->back();
    }
}