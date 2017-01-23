@inject('countries' , 'App\Http\Utilities\Country')


@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
    <form method="post" enctype="multipart/form-data" action="/flyers">

        {{csrf_field()}}

        <div class="col-md-6">
            <div class="class-form">
                <label for="street">Street:</label>
                <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}" required/>
            </div>

            <div class="class-form">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" required/>
            </div>

            <div class="class-form">
                <label for="zip">Zip/Postal Code:</label>
                <input type="text" name="zip" id="zip" class="form-control" value="{{old('zip')}}" required/>
            </div>

            <div class="class-form">
                <label for="country">Country:</label>
                <select id="country" name="country" class="form-control" required>
                    @foreach($countries::all() as $code => $country)
                        <option value="{{$code}}">{{$country}}</option>
                    @endforeach
                </select>
            </div>

            <div class="class-form">
                <label for="state">State:</label>
                <input type="text" name="state" id="state" class="form-control" value="{{old('state')}}" required/>
            </div>

            <div class="class-form">
                <label for="price">Sale Price:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}" required/>
            </div>
        </div>

        <div class="col-md-9">
            <div class="class-form">
                <label for="description">Home Description:</label>
                <textarea name="description" id="description" class="form-control" rows="10"
                          value="{{old('description')}}"></textarea>
            </div>
        </div>


        <hr>

        <div class="col-md-12" STYLE="margin-top:30px;">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Flyer</button>
            </div>
        </div>

    </form>
</div>