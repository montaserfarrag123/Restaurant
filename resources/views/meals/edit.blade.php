@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header text-center bg-danger text-white">
                    <h3>menu</h3>
                </div> <!-- card header -->

                <div class="card-body">
                    <div class="list-group">

                        <a href="{{ route('meals') }}" class="list-group-item list-group-item-action">display all meals</a>
                        <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action">craete new meals</a>
                        <a href="{{ route('orders')}}" class="list-group-item list-group-item-action">order</a>

                      </div>
                </div> <!-- card -body  -->
            </div> <!-- card -->
        </div> <!-- card-col-md3  left-->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center bg-danger text-white">
                    <h3>update meal</h3>
                </div> <!-- card header -->

                <div class="card-body">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action=" {{ route('meals.update', ['id'=>$meal->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Name Of Meal</label>
                        <input type="text" name="name" value="{{$meal->name}}" class="form-control">
                    </div> <!-- div name -->

                    <div class="mb-3">
                        <label>Description Of Meal</label>
                        <textarea name="description" rows="4" class="form-control">{{$meal->description}}</textarea>
                    </div> <!-- div description -->

                    <div class="row row-cols-lg-auto my-2 g-3 align-items-center">
                        <label>meal price ($)</label>
                        <div class="col-md-12">
                            <input type="number" value="{{$meal->small_meal_price}}" name="small_meal_price" class="form-control" placeholder="small_meal_price">
                        </div>
                        <div class="col-md-12">
                            <input type="number" value="{{$meal->medium_meal_price}}" name="medium_meal_price" class="form-control"  placeholder="medium_meal_price">
                        </div>
                        <div class="col-md-12">
                            <input type="number"  value="{{$meal->large_meal_price}}" name="large_meal_price" class="form-control" placeholder="large_meal_price">
                        </div> <!-- div price meal -->

                    </div> <!-- row price -->


                    <div class="mb-3">
                        <label>category Of Meal</label>
                        <select name="category" class="form-control form-select">
                            <option value="{{$meal->category}}">{{$meal->category}}</option>
                            <option value="pizza">pizza</option>
                            <option value="shawrma">shawrma</option>
                            <option value="borger">borger</option>
                        </select>
                    </div> <!-- div category -->

                    <div class="mb-3">
                        <label>Image Of Meal</label>
                        <input type="file" name="image" class="form-control form-control-file">
                    </div> <!-- div image -->
                    <img src="{{Storage::url($meal->image)}}" height="60" width="80" alt=""><br><br>

                    <div class="mb-3 d-grid">

                        <button type="submit" class="btn btn-lg btn-primary">update to Meal</button>
                    </div> <!-- div image -->


                    </form>
                </div> <!-- card -body  -->
            </div> <!-- card -->
        </div> <!-- col-md-9 -->
    </div> <!-- row -->
</div>
@endsection
