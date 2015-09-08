<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 7/15/2015
 * Time: 10:16 AM
 */

namespace App\Dao;
use App\Models\Role;
use App\Models\UserRole;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;
use Input;

class UserDao {
    public static function AddUser(){
        $user = new User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        //DB transaction
        DB::beginTransaction();
        try {
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        $user_role = new UserRole;
        $user_role->user_id = $user->id;
        $user_role->role_id = Input::get('role_id');
        DB::beginTransaction();
        try {
            $user_role->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

} 