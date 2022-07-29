@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header text-center bg-danger text-white">
                        <h3> meals  </h3>
                    </div> <!-- card header -->

                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            <h3 class="text-center">{{ session('message') }}</h3>
                        </div>
                    @endif
                       @if (Auth::check())

                       <form action="{{ route('order.store') }}" method="post">
                           @csrf
                           <h4>Name : {{auth()->user()->name}}</h4>
                           <h4>Email : {{auth()->user()->email}}</h4>
                           <p> phone: <input type="number" name="phone" value="0" class="form-control"></p>
                           <p> Small Size: <input type="number" name="small_meal" value="0" class="form-control"></p>
                           <p> Meduim Size: <input type="number" name="meduim_meal" value="0" class="form-control"></p>
                           <p> Large Size: <input type="number" name="large_meal" value="0" class="form-control"></p>
                           <p> date: <input type="date" name="date" class="form-control"></p>
                           <p> Time: <input type="time" name="time" class="form-control"></p>
                           <p><textarea name="body"  rows="4" class="form-control"></textarea></p>
                           <div class="d-grid">
                               <button class="btn btn-danger btn-lg">Make Order</button>
                           </div>
                           <p>  <input type="hidden" name="meal_id" value="{{$meal->id}}" ></p>
                       </form>

                       @else
                      <p><a href="/login">please login to make Order</a></p>
                       @endif

                </div> <!-- card -body  -->
            </div> <!-- card -->
        </div> <!-- card-col-md3  left-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>meals </h3>
                </div> <!-- card header -->

                <div class="card-body text-center">

                                <img src="{{Storage::url($meal->image)}}" class="img-thumbnail text-center" >
                                <h3>{{$meal->name}}</h3>
                                <p>{{$meal->description}}</p>
                                <p class="badge bg-success">{{$meal->category}}</p> <br>
                                <p> large_meal_price : {{$meal->small_meal_price}}($)</p>
                                <p>large_meal_price :{{$meal->medium_meal_price}}($)</p>
                                <p> large_meal_price :{{$meal->large_meal_price}}($)</p>
                                {{-- <a href="{{ route('meal.show', ['id'=>$meal->id]) }}" class="btn btn-danger">Order</a> --}}



                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->

    </div> <!-- container  -->

@endsection
