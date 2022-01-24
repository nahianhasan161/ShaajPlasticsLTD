<div>
    <div class="container m-3" wire:click ="createModalButton">
        <button type="button" class="btn btn-primary" >
            Create New Row Metarial
           </button>

    </div>
 <x-partials.modal>



    <form autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateRowMetarial' : 'createRowMetarial' }}">
        @csrf


    <div class="form-row mx-3 my-2">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">

          <input type="text" class="form-control @error('request.name') is-invalid @enderror  " placeholder="Row Metarial Name" name="name" id="name" wire:model.defer="request.name">

          @error('request.name')

          <div class="invalid-feedback">
             {{$message}}
          </div>
          @enderror
        </div>
        </div>



            <div class="form-row mx-3 my-2">

                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
          <div class="col-sm-10">

          <input type="text" class="form-control @error('request.quantity') is-invalid @enderror" placeholder="Row Metarial Quantity" id="quantity" wire:model.defer="request.quantity">

          @error('request.quantity')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
      </div>
      </div>



      <div class="form-row mx-3 my-2">


          <label for="price" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
          <input type="text" class="form-control @error('request.price') is-invalid @enderror  " placeholder="Row Metarial Price" name="price" id="price" wire:model.defer="request.price">

          @error('request.price')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
        </div>
        </div>







    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Save changes</button>
    </div>
</form>







   {{--  <form autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateParcel' : 'createParcel' }}">

                <h6>Sender Details</h6>
                <hr>
                <div class="form-row mx-3">

                  <div class="col-6">

                    <input type="text" class="form-control @error('request.senderName') is-invalid @enderror  " placeholder="Name" name="senderName" id="senderName" wire:model.defer="request.senderName">

                    @error('request.senderName')

                    <div class="invalid-feedback">
                        Required
                    </div>
                    @enderror
                  </div>

                  <div class="col-6">

                    <input type="text" class="form-control @error('request.senderPhone') is-invalid @enderror" placeholder="Phone" id="senderPhone" wire:model.defer="request.senderPhone">

                    @error('request.senderName')

                    <div class="invalid-feedback">
                        Required
                    </div>
                    @enderror
                </div>

                </div>


                <div class="form-row mx-1">
                  <div class="col-4">

                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect" >State</label>
                        <select class="custom-select mr-sm-2 @error('request.senderState') is-invalid @enderror" id="inlineFormCustomSelect" wire:model="senderState">
                          <option selected value="">Choose...</option>
                          @forelse ($States as $state)

                            <option value="{{$state->name}}">{{$state->name}}</option>
                            @empty
                            <option selected value="">Please Add States</option>

                          @endforelse
                        </select>
                        @error('request.senderState')

                        <div class="invalid-feedback">
                            Required
                        </div>
                        @enderror

                      </div>

                  </div>
                  <div class="col-4">

                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">City</label>
                        <select class="custom-select mr-sm-2 @error('request.senderCity') is-invalid @enderror" id="inlineFormCustomSelect" wire:model="senderCity">
                          <option selected value="">Choose...</option>
                          @forelse ($senderCities as $city)

                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @empty
                            <option selected value="">Please Add Cities</option>

                          @endforelse
                        </select>

                        @error('request.senderCity')

                        <div class="invalid-feedback">
                            Required
                        </div>
                        @enderror
                      </div>

                  </div>
                  <div class="col-4">

                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Area</label>
                        <select class="custom-select mr-sm-2 @error('request.senderArea') is-invalid @enderror " id="inlineFormCustomSelect" wire:model.defer="request.senderArea">
                          <option selected value="">Choose...</option>
                          @forelse ($senderAreas as $area)

                          <option value="{{$area->name}}">{{$area->name}}</option>
                          @empty
                          <option selected value="">Please Add Areas</option>

                        @endforelse
                        </select>

                        @error('request.senderArea')

                        <div class="invalid-feedback">
                            Required
                        </div>
                        @enderror
                      </div>

                  </div>
                  </div>
                  <div class="form-row mx-3 ">

                    <div class="col-12">


                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Spacial Instraction" rows="3" wire:model.defer="request.senderAddress"></textarea>
                    </div>


                </div>

                  <h6>Receiver Details</h6>
                  <hr>
                  <div class="form-row mx-3">

                    <div class="col-6">

                        <input type="text" class="form-control @error('request.receiverName') is-invalid @enderror" placeholder="Name" id="receiverName" wire:model.defer="request.receiverName">

                        @error('request.receiverName')

                        <div class="invalid-feedback">
                            Required
                        </div>
                        @enderror

                    </div>

                    <div class="col-6">

                      <input type="text" class="form-control @error('request.receiverPhone')   is-invalid @enderror" placeholder="Phone" id="receiverPhone" wire:model.defer="request.receiverPhone">
                      @csrf
                  </div>
                  @error('request.receiverPhone')

                  <div class="invalid-feedback">
                      Required
                  </div>
                  @enderror
                  </div>

                  <div class="form-row mx-1" >
                    <div class="col-4">

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect" >State</label>
                          <select class="custom-select mr-sm-2   @error('request.receiverState') is-invalid @enderror " id="inlineFormCustomSelect" wire:model="receiverState">
                            <option selected value="">Choose...</option>
                            @forelse ($States as $state)

                            <option value="{{$state->name}}">{{$state->name}}</option>
                            @empty
                            <option selected value="">Please Add States</option>

                          @endforelse

                          </select>

                          @error('request.receiverState')

                          <div class="invalid-feedback">
                              Required
                          </div>
                          @enderror
                        </div>

                    </div>
                    <div class="col-4">

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">City</label>
                          <select class="custom-select mr-sm-2 @error('request.receiverCity') is-invalid @enderror" id="inlineFormCustomSelect" wire:model="receiverCity">
                            <option selected value="">Choose...</option>
                            @forelse ($receiverCities as $city)

                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @empty
                            <option selected value="">Please Add Cities</option>

                          @endforelse

                          </select>

                          @error('request.receiverCity')

                          <div class="invalid-feedback">
                             {{$message}}
                          </div>
                          @enderror
                        </div>

                    </div>
                    <div class="col-4">

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Area</label>
                          <select class="custom-select mr-sm-2 @error('request.receiverArea') is-invalid @enderror" id="inlineFormCustomSelect" wire:model.defer="request.receiverArea">
                            <option selected value="">Choose...</option>
                            @forelse ($receiverAreas as $area)

                            <option value="{{$area->name}}">{{$area->name}}</option>
                            @empty
                            <option selected value="">Please Add Areas</option>

                          @endforelse
                          </select>

                          @error('request.receiverArea')

                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                          @enderror
                        </div>

                    </div>
                </div>
                <div class="form-row mx-3 ">

                    <div class="col-12">


                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Spacial Instraction" rows="3" wire:model.defer="request.receiverAddress"></textarea>
                    </div>


                </div>

                    <h6>Parcel Details</h6>
                    <hr>



                    <div class="form-row mx-1">
                      <div class="col-4">

                          <div class="col-auto my-1">
                              <label class="mr-sm-2" for="inlineFormCustomSelect">Type</label>
                            <select class="custom-select mr-sm-2  @error('request.parcelType') is-invalid @enderror" id="inlineFormCustomSelect" wire:model.defer="request.parcelType">

                                <option selected value="">Choose...</option>
                              @foreach ($typeList as $type)

                              <option value="{{$type}}">{{ucwords($type)}}</option>
                              @endforeach


                            </select>
                            @error('request.parcelType')

                            <div class="invalid-feedback">
                                Required
                            </div>
                            @enderror
                          </div>

                      </div>
                      <div class="col-4">

                          <div class="col-auto my-1">
                              <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                              <select class="custom-select mr-sm-2 @error('request.parcelCategory') is-invalid @enderror" id="inlineFormCustomSelect" wire:model.defer="request.parcelCategory">
                                  <option selected value="">Choose...</option>
                              @foreach ($categoryList as $category)

                              <option value="{{$category}}">{{ucwords($category)}}</option>
                              @endforeach

                            </select>
                            @error('request.parcelCategory')

                            <div class="invalid-feedback">
                                Required
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-4">

                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">weight</label>
                            <input type="number" class="form-control  @error('request.parcelWeight') is-invalid @enderror" name="weight" placeholder="Weight" min="1" max="1000" wire:model.defer="request.parcelWeight">
                        </div>
                        @error('request.parcelWeight')

                        <div class="invalid-feedback">
                            Required
                        </div>
                        @enderror
                    </div>

                </div>


                    <div class="form-row mx-1">
                        <div class="col-2"></div>
                        <div class="col-8">

                            <div class="col-auto my-1">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
                                <select class="custom-select mr-sm-2 @error('request.status') is-invalid @enderror" id="inlineFormCustomSelect" wire:model.defer="request.status">
                                    <option selected value="">Choose...</option>

                                    <option value="pending">Pending</option>
                                    <option value="received">Receive</option>
                                    <option value="delivering">Delivering</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="received">Received</option>
                                    <option value="Canceled">Canceled</option>
                              </select>
                              @error('request.status')

                              <div class="invalid-feedback">
                                  Required
                              </div>
                              @enderror

                          </div>

                      <div class="col-2"></div>
                    </div>

                </div>
                    <div class="form-row mx-3 ">

                        <div class="col-12">


                            <textarea class="form-control @error('request.parcelInstraction')

                            @enderror" id="exampleFormControlTextarea1" placeholder="Spacial Instraction" rows="3" wire:model.defer="request.parcelInstraction"></textarea>

                            @error('request.parcelInstraction')

                            <div class="invalid-feedback">
                                Required
                            </div>
                            @enderror
                        </div>


                    </div>




                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
            </form> --}}


 </x-partials.modal>
</div>

