<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *z
     * @return \Illuminate\Http\Response
     */
    public function addUser($name, $email, $password){
        $check_name = DB::select('select name_user from tb_users where name_user=?',[$name]);
        $check_mail = DB::select('select email_user from tb_users where email_user=?',[$email]);
        
        if(count($check_name)==0){
            if(count($check_mail)==0){
                DB::insert('insert  into  tb_users(name_user, email_user, password_user) values(?, ?, ?)',[$name, $email, md5($password)]);
                return('success');
            }
        }
    }

    public function getUser($email, $password){
        $isEmailValid = DB::select('select id_user from tb_users where email_user=?',[$email]);
        $isPasswordValid = DB::select('select id_user from tb_users where password_user=?',[md5($password)]);

        if(count($isEmailValid)>0){
            if(count($isPasswordValid)>0){
                $result = DB::select('select * from tb_users where email_user=?',[$email]);
                $nuevo = json_encode($result);
                return $result;
            }
        }else{
            $result = 'fail';
            return $result;
        }
    }

    public function addRide($email, $start, $end, $date, $time, $seats, $collaboration, $notes){
        DB::insert('insert  into  tb_rides(driver_email, start, end, date, time, seats, collaboration, notes) values(?, ?, ?, ?, ?, ?, ?, ?)',[$email, $start, $end, $date, $time, $seats, $collaboration, $notes]);
        return('success');
    }

    public function getRide($email){
        $result = DB::select('select * from tb_rides where driver_email=?',[$email]);
        $var = json_encode($result);
        return $var;
    }

    public function deleteRide($driver_email){
        DB::table('tb_rides')->where('driver_email', '=', $driver_email)->delete();
        return "done";
    }

    public function deleteRidePassengers($id_ride){
        DB::table('tb_rides_users')->where('id_ride', '=', $id_ride)->delete();
        return "done";
    }

    public function findRide($place, $driver_email){
        $result = DB::select('select * from tb_rides where end=? AND seats>0 AND driver_email!=?',[$place, $driver_email]);
        $var = json_encode($result);
        return $var;
    }

    public function joinRide($idRide, $idPassanger){
        DB::insert('insert  into  tb_rides_users(id_ride, id_passenger) values(?, ?)',[$idRide, $idPassanger]);
        return "funciona xdd";
    }

    public function getRidePassenger($idPassanger){
        $result = DB::select('select * from tb_rides_users where id_passenger=?',[$idPassanger]);
        $var = json_encode($result);
        return $var;
    }

    public function restSeats($idRide){
        $result = DB::update('update tb_rides SET seats = seats-1 WHERE id_ride=?;', [$idRide]);
    }

    public function sumSeats($idRide){
        $result = DB::update('update tb_rides SET seats = seats+1 WHERE id_ride=?;', [$idRide]);
    }

    public function showRidePassenger($idRide){
        $result = DB::select('select * from tb_rides where id_ride=?',[$idRide]);
        return $result;
    }

    public function getDriverName($driver_email){
        $result = DB::select('select name_user from tb_users where email_user=?',[$driver_email]);
        return $result;
    }

    public function exitRide($id_passenger){
        DB::table('tb_rides_users')->where('id_passenger', '=', $id_passenger)->delete();
        return "done";
    }

    public function getListPassengers($idRide){
        $result = DB::select('select name_user
                            FROM tb_users 
                            INNER JOIN tb_rides_users
                            ON tb_users.id_user = tb_rides_users.id_passenger 
                            where tb_rides_users.id_ride=?',[$idRide]);
        return $result;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
