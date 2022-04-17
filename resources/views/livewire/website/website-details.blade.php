<div class="container">



    <form autocomplete="off"  wire:submit.prevent="{{$item ?   'createDetails' : 'updateDetails'}} ">
     @csrf
    <div class="card  ">

        <div class="card container mt-3">


        <h2 class="text-center">Website Details</h2>
        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.email') is-invalid @enderror  "
                placeholder="Email" name="email" id="email"
               wire:model.defer="request.email">

            @error('request.email')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.facebook') is-invalid @enderror  "
                placeholder="Facebook" name="facebook" id="facebook"
               wire:model.defer="request.facebook">

            @error('request.facebook')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Whatsapp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.whatsapp') is-invalid @enderror  "
                placeholder="Whatsapp" name="whatsapp" id="whatsapp"
               wire:model.defer="request.whatsapp">

            @error('request.whatsapp')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Twitter</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.twitter') is-invalid @enderror  "
                placeholder="Twitter" name="twitter" id="twitter"
               wire:model.defer="request.twitter">

            @error('request.twitter')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Youtube</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.youtube') is-invalid @enderror  "
                placeholder="youtube" name="youtube" id="youtube"
               wire:model.defer="request.youtube">

            @error('request.youtube')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Youtube Video Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.youtube_video') is-invalid @enderror  "
                placeholder="youtube_video" name="youtube_video" id="youtube_video"
               wire:model.defer="request.youtube_video">

            @error('request.youtube_video')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Google Map</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.map') is-invalid @enderror  "
                placeholder="map" name="map" id="map"
               wire:model.defer="request.map">

            @error('request.map')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>


    </div>

    <div class="card">
        <h2 class="card-title text-center ">Office Details</h2>
        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label"> Main Office Phone</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control @error('request.office_one_phone') is-invalid @enderror  "
                placeholder="Phone" name="Phone" id="Phone"
               wire:model.defer="request.office_one_phone">

            @error('request.office_one_phone')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Main Office Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.office_one_address') is-invalid @enderror  "
                placeholder="address" name="address" id="address"
               wire:model.defer="request.office_one_address">

            @error('request.office_one_address')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label"> Branch Office Phone</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control @error('request.office_two_phone') is-invalid @enderror  "
                placeholder="Phone" name="Phone" id="Phone"
               wire:model.defer="request.office_two_phone">

            @error('request.office_two_phone')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>



        <div class="form-row mx-3 my-2">


            <label for="company" class="col-sm-2 col-form-label">Branch Office Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.office_two_address') is-invalid @enderror  "
                placeholder="office_two_address" name="office_two_address" id="office_two_address"
               wire:model.defer="request.office_two_address">

            @error('request.address')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

    </div>
    <div class="card">


        <div class="form-row mx-3 my-2">



            <label for="map" class="col-sm-2 col-form-label">Propiter</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.propiter') is-invalid @enderror  "
                placeholder="propiter" name="propiter" id="propiter"
               wire:model.defer="request.propiter">

            @error('request.propiter')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Landing Title 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.landing_title_one') is-invalid @enderror  "
                placeholder="landing_title_one" name="landing_title_one" id="landing_title_one"
               wire:model.defer="request.landing_title_one">

            @error('request.landing_title_one')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Landing Titl 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.landing_title_two') is-invalid @enderror  "
                placeholder="landing_title_two" name="landing_title_two" id="landing_title_two"
               wire:model.defer="request.landing_title_two">

            @error('request.landing_title_two')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Landing Title 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.landing_title_three') is-invalid @enderror  "
                placeholder="landing_title_three" name="landing_title_three" id="landing_title_three"
               wire:model.defer="request.landing_title_three">

            @error('request.landing_title_three')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">About Us</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('request.aboutUs') is-invalid @enderror  "
                placeholder="aboutUs" name="aboutUs" id="aboutUs"
               wire:model.defer="request.aboutUs"></textarea>

            @error('request.aboutUs')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Destribution Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('request.distribution_title') is-invalid @enderror  "
                placeholder="services_title_one" name="services_title_one" id="services_title_one"
                wire:model.defer="request.distribution_title">

                @error('request.distribution_title')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Destribution Description </label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('request.distribution_description') is-invalid @enderror  "
                placeholder="services_description_one" name="services_description_one" id="services_description_one"
                wire:model.defer="request.distribution_description"></textarea>

                @error('request.distribution_description')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>

        </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Services Title 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('services.title_one') is-invalid @enderror  "
                placeholder="services_title_one" name="services_title_one" id="services_title_one"
                wire:model.defer="services.title_one">

                @error('services.title_one')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Services Description 1</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('services.description_one') is-invalid @enderror  "
                placeholder="services_description_one" name="services_description_one" id="services_description_one"
                wire:model.defer="services.description_one"></textarea>

                @error('services.description_one')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Services Title 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('services.title_two') is-invalid @enderror  "
                placeholder="services_title_two" name="services_title_two" id="services_title_two"
                wire:model.defer="services.title_two">

                @error('services.title_two')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Services Description 2</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('services.description_two') is-invalid @enderror  "
                placeholder="services_description_two" name="services_description_two" id="services_description_two"
                wire:model.defer="services.description_two"></textarea>

                @error('services.description_two')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Services Title 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('services.title_three') is-invalid @enderror  "
                placeholder="services_title_three" name="services_title_three" id="services_title_three"
                wire:model.defer="services.title_three">

                @error('services.title_three')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Services Description 3</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('services.description_three') is-invalid @enderror  "
                placeholder="services_description_three" name="services_description_three" id="services_description_three"
                wire:model.defer="services.description_three"></textarea>

                @error('services.description_three')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Services Title 4</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('services.title_four') is-invalid @enderror  "
                placeholder="services_title_four" name="services_title_four" id="services_title_four"
                wire:model.defer="services.title_four">

                @error('services.title_four')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Services Description 4</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('services.description_four') is-invalid @enderror  "
                placeholder="services_description_four" name="services_description_four" id="services_description_four"
                wire:model.defer="services.description_four"></textarea>

                @error('services.description_four')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Services Title 5</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('services.title_five') is-invalid @enderror  "
                placeholder="services_title_five" name="services_title_five" id="services_title_five"
                wire:model.defer="services.title_five">

                @error('services.title_five')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Services Description 5</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('services.description_five') is-invalid @enderror  "
                placeholder="services_description_five" name="services_description_five" id="services_description_five"
                wire:model.defer="services.description_five"></textarea>

                @error('services.description_five')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Services Title 6</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('services.title_six') is-invalid @enderror  "
                placeholder="services_title_six" name="services_title_six" id="services_title_six"
                wire:model.defer="services.title_six">

                @error('services.title_six')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">Services Description 6</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('services.description_six') is-invalid @enderror  "
                placeholder="services_description_six" name="services_description_six" id="services_description_six"
                wire:model.defer="services.description_six"></textarea>

                @error('services.description_six')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>

    </div>


        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">Feature Title 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('feature.title_one') is-invalid @enderror  "
                placeholder="feature_title_one" name="feature_title_one" id="feature_title_one"
                wire:model.defer="feature.title_one">

                @error('feature.title_one')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">feature Description 1</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('feature.description_one') is-invalid @enderror  "
                placeholder="feature_description_one" name="feature_description_one" id="feature_description_one"
                wire:model.defer="feature.description_one"></textarea>

                @error('feature.description_one')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">feature Title 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('feature.title_two') is-invalid @enderror  "
                placeholder="feature_title_two" name="feature_title_two" id="feature_title_two"
                wire:model.defer="feature.title_two">

                @error('feature.title_two')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">feature Description 2</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('feature.description_two') is-invalid @enderror  "
                placeholder="feature_description_two" name="feature_description_two" id="feature_description_two"
                wire:model.defer="feature.description_two"></textarea>

                @error('feature.description_two')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>
        <div class="card">

            <div class="form-row mx-3 my-2">


                <label for="map" class="col-sm-2 col-form-label">feature Title 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('feature.title_three') is-invalid @enderror  "
                placeholder="feature_title_three" name="feature_title_three" id="feature_title_three"
                wire:model.defer="feature.title_three">

                @error('feature.title_three')

                <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-row mx-3 my-2">


            <label for="map" class="col-sm-2 col-form-label">feature Description 3</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control @error('feature.description_three') is-invalid @enderror  "
                placeholder="feature_description_three" name="feature_description_three" id="feature_description_three"
                wire:model.defer="feature.description_three"></textarea>

                @error('feature.description_three')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
          </div>
        </div>
    </div>

    <button type="Submit" class=" btn btn-lg btn-primary">Save</button>
    </div>
</form>






</div>
</div>










