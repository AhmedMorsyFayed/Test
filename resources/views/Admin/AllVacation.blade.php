
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Holiday</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <title>Vacation System</title>

    <style>
        /*tabel css */
        td {
            text-align: left;
        }
        table {
            border: 1px solid black;
        }
        table {
            border-collapse: collapse;
        }

        table, th, td,tr {
            border: 1px solid black;
        }/*button css*/
        .btn{
            color: #d6e9f9;
            padding:   32px 20px;
            font-size: 40px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 30px;
        }   /*word of input css */
        .h33 {
            font-size: 25px;
            color: #761b18;
            text-transform: capitalize;

        }/* input css */
        .formm-control{
            display: block;
            width: 50%;
            height: calc(1.6em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;


        }


        /* Style the buttons inside the tab */
        #holi{

        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #4CAF50; /* Green */
            color: white;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
        .tablinks {
            transition-duration: 0.4s;

        }

        .tablinks:hover {
            background-color: #4CAF50; /* Green */
            color: white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }

    </style>
    <script>  /*search script */
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function myFunctio() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInpute");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTablee");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }


    </script>

</head><!-- extend app.css -->
@extends('layouts.Navbar')
    @extends('layouts.app')
    <br>
    <br>
    <br>

    @section('content')
        <!-- navbar show which  page shown to user based on his level -->
        <br>
        <div>


                <center class="tab">
                    <button style=" background-color: #4dc0b5;
                    border-radius: 20%;
                     border: none;
                     outline: none;
                     cursor: pointer;
                     padding: 14px 30px;
                     transition: 0.3s;

                     font-size: 30px;"

                           class="tablinks" onclick="openCity(event, 'Holiday')">Vacations</button>
                    <button style=" background-color: #4dc0b5;
                    border-radius: 20%;
                     border: none;
                     outline: none;
                     cursor: pointer;
                     padding: 14px 16px;
                     transition: 0.3s;

                     font-size: 30px;"
                       class="tablinks" onclick="openCity(event, 'Permission')">Permissions</button>

                </center>
                <div id="Holiday" class="tabcontent">
                    <h3 class="h33"> Search  :  </h3>

                    <input id="myInput" autocomplete="off" type="text" class="formm-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
                    <br>
                    <!-- select all old vacation from database for admin -->
                    <table id="table_format" class="table table-bordered table-striped table-hover table-list-search">

                        <?php
                        $Vacations = \App\Holiday::with(['user' => function($Q){
                             $Q->select('name', 'vacationsbalance');
                         }])->get();
                        $Vacations = collect($Vacations)->sortByDesc('creation');

                        ?>
                        <thead>
                        <tr class="bg-info " ><!-- header -->
                            <td>Id</td>
                            <td>Employee Name</td>
                            <td>Department</td>
                            <td style="width: 100px ; font-size: 26px  "  class="bg-warning" >Start</td>
                            <td style="width: 100px ; font-size: 26px  " class="bg-warning" >End</td>
                            <td>Vacations Type</td>
                            <td>Days</td>
                            <td >Vacations Balance</td>
                            <td>Manager</td>
                            <td>Status</td>
                            <td>Creation</td>
                            <td>Aproval Data</td>
                            <td>HR Name</td>
                            <td> HR Status</td>
                            <td>AprovalHrData</td>

                        </tr>
                        </thead>
                        <tbody  id="myTable">
                        <!-- body -->
                        @foreach ($Vacations as $Vacation)
                            <tr>
                                <td>{{ $Vacation->id }}</td>
                                <td>{{ $Vacation->name }}</td>
                                <td>{{ $Vacation->Department }}</td>
                                <td style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 " >{{ $Vacation->start}}</td>
                                <td  style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 ">{{ $Vacation->end }}</td>
                                <td>{{ $Vacation-> VAcationstype}}</td>
                                <td>{{ $Vacation->HloiDays }}</td>
                                <td>{{ $Vacation->user["vacationsbalance"] }}</td>
                                <td>{{ $Vacation->manger }}</td>
                                <td>{{ $Vacation->status }}</td>
                                <td>{{ $Vacation->creation }}</td>
                                <td>{{ $Vacation->AprovaleDate }}</td>
                                <td>{{ $Vacation->HRname }}</td>
                                <td>{{ $Vacation->HR }}</td>
                                <td>{{ $Vacation->AprovaleHRDate}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Permission" class="tabcontent">
                    <h3 class="h33"> Search  :  </h3>

                    <input id="myInpute" autocomplete="off" type="text" class="formm-control fa fa-search"  onkeyup="myFunctio()" placeholder="Search..">
                    <br>
                    <!-- select all old vacation from database for admin -->
                    <table id="table_format" class="table table-bordered table-striped table-hover table-list-search">

                        <?php
                       $Permissions =\App\Permissions::all();
                        $Permissions = collect($Permissions)->sortByDesc('creation');


                        ?>
                        <thead>
                        <tr class="bg-info " ><!-- header -->
                            <td>Id</td>
                            <td>Employee Name</td>
                            <td>Department</td>
                            <td style="width: 100px ; font-size: 26px  "  class="bg-warning" >Day</td>
                            <td style="width: 90px ; font-size: 26px  "  class="bg-warning" >Start</td>
                            <td style="width: 90px ; font-size: 26px  " class="bg-warning" >End</td>
                            <td>Hours</td>
                            <td>Manager</td>
                            <td>Status</td>
                            <td>Creation</td>
                            <td>Aproval Data</td>
                            <td>HR Name</td>
                            <td> HR Status</td>
                            <td>AprovalHrData</td>

                        </tr>
                        </thead>
                        <tbody  id="myTablee">
                        <!-- body -->
                        @foreach ($Permissions as $Permission)
                            <tr>
                                <td>{{ $Permission->id }}</td>
                                <td>{{ $Permission->name }}</td>
                                <td>{{ $Permission->Department }}</td>
                                <td style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 " >{{ $Permission->day}}</td>
                                <td style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 " >{{ $Permission->start}}</td>
                                <td  style="width: 90px ; font-size: 14px  ;color: #fff3cd ; background-color: #1b1e21 ">{{ $Permission->end }}</td>
                                <td>{{ $Permission->permisionshours }}</td>
                                <td>{{ $Permission->manger }}</td>
                                <td>{{ $Permission ->status }}</td>
                                <td>{{ $Permission ->creation }}</td>
                                <td>{{ $Permission ->AprovaleDate }}</td>
                                <td>{{ $Permission ->HRname }}</td>
                                <td>{{ $Permission ->HR }}</td>
                                <td>{{ $Permission ->AprovaleHRDate}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



        </div>




        </html>



@endsection

