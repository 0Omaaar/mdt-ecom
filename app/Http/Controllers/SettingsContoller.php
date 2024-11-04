<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsContoller extends Controller
{
    public function index(){
        $admin = Auth::user();
        $emailNotifications = Setting::where('subject', 'email_notifications')->first();

        return view('admin.settings.index', compact('admin', 'emailNotifications'));
    }

    public function updateAdminInfos(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'old_password' => 'required_with:new_password',
                'new_password' => 'nullable|string|min:8',
            ]);

            $admin = Auth::user()->id;
            $user = User::findOrFail($admin);
            $user->name = $request->name;
            $user->email = $request->email;

            if($request->filled('new_password')){
                if(Hash::check($request->old_password, $user->password)){
                    $user->password = Hash::make($request->new_password);
                }else{
                    return redirect()->back()->with('error', 'Ancien mot de passe non valide !');
                }
            }

            $user->save();
            return redirect()->back()->with('success', 'Informations modifiées avec Succès !');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification !');
        }
    }

    public function updateEmailNotifs(Request $request){
        try{
            $emailNotifications = Setting::where('subject', 'email_notifications')->first();
            $emailNotifications->content = $request->content;
            $emailNotifications->save();

            return redirect()->back()->with('success', 'Informations modifiées avec Succès !');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification !');
        }
    }
}
