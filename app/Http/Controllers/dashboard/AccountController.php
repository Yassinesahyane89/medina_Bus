<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
  public function account()
  {
    return view('auth.account.settings');
  }

  public function account_image(ImageRequest $data)
  {
    $user = Auth::user();

    $user->clearMediaCollection('profile_image');

    $user->addMedia($data->image)->toMediaCollection('profile_image');

    return back();
  }

  public function security()
  {
    $devices = DB::table('sessions')
      ->where('user_id', Auth::user()->id)
      ->get()->reverse();

    return view('auth.account.security', ['devices' => $devices]);
  }
}
