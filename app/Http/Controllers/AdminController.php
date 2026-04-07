<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard(Request $request)
    {
        return view('backend.dashboard');
    }
    
    /**
     * Show the user control panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return view('backend.user.index');
    }
    
    
    public function show($json = false){
        if($json){
            return response()->json(Auth::user());
        }else{
            return response()->json([
                'profile_card' => view('backend.partials.userCard')->render()
            ]);
        }
        
    }
    
    public function edit(Request $request){
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15'
        ]);
        
        User::where('id', 1)->update([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone
        ]);
        
        return response()->json(['OK']);
    }
    
    public function changePassword(Request $request){
        $this->validate($request, [
            'old_password' => 'required|string',
            'new_password' => 'required|string',
        ]);
        
        #Match The Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return response()->json(["error" => "Contraseña actual incorrecta", "errors" => ["old_password" => "La contraseña actual no coincide"]],400);
        }
        
        #Update the new Password
        User::where('id', 1)->update([
            'password' => Hash::make($request->new_password)
        ]);
        
        return response()->json(['OK']);
    }
    
    public function updateSettings(Request $request){
        $this->validate($request, [
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'reservation_discount' => 'required|numeric|min:0'
        ]);
        
        User::where('id', 1)->update([
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'reservation_discount' => $request->reservation_discount
        ]);
        
        return response()->json(['OK']);
    }


    public function updateDiscount(Request $request){
        $this->validate($request, [
            'reservation_discount' => 'required|numeric|min:0'
        ]);
        
        User::where('id', 1)->update([
            'reservation_discount' => $request->reservation_discount
        ]);
        
        return response()->json(['OK']);
    }
    
    public function getSettings(){
        return response()->json([
            'settings_card' => view('backend.partials.settingCard')->render()
        ]);
    }

    public function getSettingsDiscount(){
        return response()->json([
            'settings_card' => view('backend.partials.settingDiscountCard')->render()
        ]);
    }
}
