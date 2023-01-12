@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4 p-2">
        <div class="card"  style="    background: #ffe0e0;">
            <h4 class="text-center mt-4">Today</h4>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                         <th scope="col">Time</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $temp)
                        <tr>
                             <td>{{$temp->time}}</td>
                            <td>{{$temp->temperature}} C°</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $temp->temperature * 100 / 44 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div class="col-sm-8 p-2">

            <div class="card"  style="    background: #ffeCCC;">
                <h4 class="text-center mt-4">Week</h4>
                <div class="card-body">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach($dataweek as $key =>$day)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($key == date('Y-m-d')) active @endif" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#{{ date('l', strtotime($key))}}" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ date('l', strtotime($key))}}</button>
            </li>
             @endforeach


        </ul>

        <div class="tab-content" id="pills-tabContent">
            @foreach($dataweek as $key =>$day)
                <div class="tab-pane fade   @if($key == date('Y-m-d')) show active @endif" id="{{ date('l', strtotime($key))}}" role="tabpanel" aria-labelledby="pills-home-tab">

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Temperature</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($day as $temp)
                                <tr>
                                    <td>{{$temp->date}}</td>
                                    <td>{{$temp->time}}</td>
                                    <td>{{$temp->temperature}} C°</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $temp->temperature * 100 / 44 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                </div>
            @endforeach
                  </div>
            </div>
        </div>


    </div>

</div>





@endsection
