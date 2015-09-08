<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 8/11/2015
 * Time: 2:47 PM
 */

namespace App\Dao;


use App\Models\Consult;
use App\Models\Contact;

class ContactDao {

    public static function getContact(){
        return view('admin.contact.contact');
    }
    public static function getDeleteContact($id){
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json(
           array('success'=>'1',
               'msg'=>'The contact was deleted successfully')
        );
    }
    public static function getAdvisory(){
        return view('admin.contact.advisory');
    }
    public static function getDeleteAdvisory($id){
        $consult = Consult::find($id);
        $consult->delete();
        return response()->json(
            array('success'=>'1',
                'msg'=>'The contact was deleted successfully')
        );
    }





    public static function getApiContact(){
        $contacts = Contact::orderBy('id','desc')->get();
        return response()->json($contacts);
    }
    public static function getApiConsult(){
        $consults = Consult::orderBy('id','desc')->get();
        return response()->json($consults);
    }
} 