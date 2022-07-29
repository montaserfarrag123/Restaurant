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

                        <form action="{{ route('frontpage') }}" method="get">
                            @csrf
                            <div class="list-group">
                                <a href="/" class="list-group-item list-group-item-action">display all
                                    category</a>

                                <input type="submit" name="category" value="pizza"
                                    class="list-group-item list-group-item-action">
                                <input type="submit" name="category" value="shawrma"
                                    class="list-group-item list-group-item-action">

                        </form>

                    </div>
                </div> <!-- card -body  -->
            </div> <!-- card -->
        </div> <!-- card-col-md3  left-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>meals ( {{ count($meals) }} meal )</h3>
                </div> <!-- card header -->

                <div class="card-body">
                    <div class="row">
                        @forelse ($meals as $meal )
                        <div class="col-md-4 my-1 text-center">
                            <div class="card p-3 ">
                                <img src="{{Storage::url($meal->image)}}" class="img-thumbnail" style="height: 150px">
                                <h3>{{$meal->name}}</h3>
                                <p>{{$meal->description}}</p>
                                <a href="{{ route('meal.show', ['id'=>$meal->id]) }}" class="btn btn-danger">Order</a>
                            </div>

                        </div>
                        @empty
                        <div class="alert alert-danger p-5">
                            <h3 class="text-center">No Meals To Show</h3>
                        </div>
                        @endforelse
                    </div>


                </div>
            </div>
        </div>

    </div> <!-- card -body  -->
   
@endsection
