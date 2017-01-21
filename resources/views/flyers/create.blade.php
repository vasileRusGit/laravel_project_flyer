@extends('layout')

@section('content')
    <h1>Selling your home ?</h1>

    <form method="post" enctype="multipart/form-data" action="/flyers">
        <div class="class-form">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}"/>
        </div>

        <div class="class-form">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}"/>
        </div>

        <div class="class-form">
            <label for="zip">Zip/Postal Code:</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{old('zip')}}"/>
        </div>

        <div class="class-form">
            <label for="country">Country:</label>
            <select id="country" name="country" class="form-control"></select>
        </div>

        <div class="class-form">
            <label for="state">State:</label>
            <select id="state" name="state" class="form-control"></select>
        </div>

        <hr>

        <div class="class-form">
            <label for="price">Sale Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}"/>
        </div>

        <div class="class-form">
            <label for="description">Home Description:</label>
            <textarea name="description" id="description" class="form-control" rows="10" value="{{old('description')}}"></textarea>
        </div>

        <div class="class-form">
            <label for="photos">Photos:</label>
            <input type="file" name="photos" id="photos" class="form-control" value="{{old('photos')}}"/>
        </div>

        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Flyer</button>
        </div>

    </form>
@stop