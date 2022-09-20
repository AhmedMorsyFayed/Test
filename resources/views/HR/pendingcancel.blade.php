
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Vacation</title>
    <style>
        /*genral tabel css */
        table tr:not(:first-child){
            cursor: pointer;transition: all .25s ease-in-out;
        }
        table tr:not(:first-child):hover{background-color: #ddd;}
        table, th, td {
            border: 1px solid black;
        } /* button css*/
        .btn{
            color: #d6e9f9;
            padding:   32px 20px;
            font-size: 40px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 30px;
        }
        .h33 {
            font-size: 30px;
            color: #761b18;
            text-transform: capitalize;

        }

    </style>
    @extends('layouts.app')
    <br>
    <br>
    <br>

    @section('content')

        <html>
        <br>

        @if(session()->has('Sucess'))
            <center>
                <div class="alert alert-success " style="width: 20%;border: darkblue 1px solid;">
                    <h5 style="text-align: center;font-size: 1vw">  {{ session()->get('Sucess') }}</h5>
                    <button type="button" class="btn btn-success" onclick="this.parentElement.style.display='none'" id="Close" >OK</button>
                </div></center>
        @endif

        <div>

                <center> <h3 class="h33"> Vacation Table   </h3></center><br>
                <table class="table table-sm table-primary">
                    <?php
                    $users = \App\Holiday::whereNull('status')->whereNull('HR')->orderBy('creation', 'desc')->get();




     /*               $users = DB::select('select h.id,h.UpdateHRDate,h.HRname,h.name,h.Department,h.idHoliday,
DATE_FORMAT(h.start,"%d-%m-%Y") as start, DATE_FORMAT(h.end,"%d-%m-%Y") as end,h.VAcationstype,h.HloiDays,h.manger,h.status
,h.HR, DATE_FORMAT(h.creation,"%d-%m-%Y  %h:%m:%s") as creation ,
DATE_FORMAT(h.AprovaleDate,"%d-%m-%Y  %h:%m:%s") as AprovaleDate,
DATE_FORMAT(h.AprovaleHRDate,"%d-%m-%Y  %h:%m:%s") as AprovaleHRDate,u.vacationsbalance
                              from holidays h,users u where h.name= u.name and h.status is null and h.HR is null ORDER BY h.creation DESC'
                       );*/

                    ?>
                    <tr class="bg-info">
                        <td>Id</td>
                        <td>Employee Name</td>
                        <td>Department</td>
                        <td style="width: 90px ; font-size: 26px  ;color: #fff3cd ; background-color: #1b1e21 "  >Start</td>
                        <td style="width: 90px ; font-size: 26px ;color: #fff3cd ; background-color: #1b1e21 " >End</td>
                        <td>Vacations Type</td>
                        <td>Days</td>
                        <td>Manager</td>
                        <td>Status</td>
                        <td>Creation</td>
                        <td>Aproval Data</td>

                    </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td >{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->Department }}</td>
                            <td style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 " >{{ $user->start}}</td>
                            <td  style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 ">{{ $user->end }}</td>
                            <td>{{ $user-> VAcationstype}}</td>
                            <td>{{ $user->HloiDays }}</td>
                            <td>{{ $user->manger }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->creation }}</td>
                            <td>{{ $user->AprovaleDate }}</td>
                            <td><a href = 'CanacelVacation/{{ $user->id }}'>Cancel</a></td>

                        </tr>
                    @endforeach
                </table>

        </div>
        <br><br><br><br><br>
        <div>

                <center> <h3 class="h33"> Permission Table   </h3></center><br>
                <table class="table table-sm table-primary">
                    <?php
                    $users = \App\Permissions::whereNull('status')->whereNull('HR')->orderBy('creation', 'desc')->get();


                    ?>
                    <tr class="bg-info"><!-- Header  -->
                        <td>Id</td>
                        <td>Emplyee Name</td>
                        <td>Employee Department</td>
                        <td style="width: 90px ; font-size: 26px  ;color: #fff3cd ; background-color: #1b1e21 "  >Day</td>
                        <td style="width: 90px ; font-size: 26px ;color: #fff3cd ; background-color: #1b1e21 " >Start</td>
                        <td style="width: 90px ; font-size: 26px ;color: #fff3cd ; background-color: #1b1e21 " >End</td>
                        <td>Hours</td>

                        <td> Manager</td>
                        <td>Status</td>
                        <td>Creation</td>
                        <td>Aproval Data</td>

                    </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td >{{ $user->id }}</td><!-- Body  -->
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->Department }}</td>
                            <td  style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 ">{{ $user->day }}</td>
                            <td style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 " >{{ $user->start}}</td>
                            <td  style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 ">{{ $user->end }}</td>
                            <td>{{ $user->permisionshours }}</td>
                            <td>{{ $user->manger }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->creation }}</td>
                            <td>{{ $user->AprovaleDate }}</td>
                            <td><a href = 'CanacelPermission/{{ $user->id }}'>Cancel</a></td>

                        </tr>
                    @endforeach
                </table>


        </div>


        @endsection

