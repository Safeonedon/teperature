@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12 p-2">
        <div class="card"  style="background: #ffe0e0;">
            <h4 class="text-center mt-4">Update your daily info</h4>
            <div class="card-body">

                    <div class="row">
                         <div class="col" scope="col">Ref</div>
                         <div class="col" scope="col">Date</div>
                         <div class="col" scope="col">Time</div>
                        <div class="col" scope="col">Temperature</div>
                        <div class="col" scope="col">action</div>
                    </div>


                    @foreach($data as $temp)
                    <form method="post" action="{{url('/crud')}}">
                        @csrf

                        <div class="row mt-4" >

                                <div class="col" scope="col" >
                                    #{{$temp->reference}}
                                </div>
                                <div class="col" scope="col">
                                    <input type="text" class="form-control"  value="{{$temp->date}}" name="date">
                                </div>
                                <div class="col" scope="col">
                                    <input type="text" class="form-control"  value="{{$temp->time}}" name="time">
                                </div>
                                <div class="col"  style="position: relative">
                                    <input type="text" class="form-control"  value="{{$temp->temperature}}" name="temperature">
                                   <span style="    position: absolute;
    right: 21px;
    top: 9px;">C°</span>
                                </div>

                                 <div class="col" scope="col">
                                     <button type="submit" class="btn btn-success" > &#9998; </button>
                                     <a href="{{url('/deletecrud/'.$temp->reference)}}" class="btn btn-danger"  >⊗ </a>
                                     </div>



                   </div>
                    </form>
                    @endforeach

                    </div>

            </div>
        </div>


    </div>

</div>





@endsection
