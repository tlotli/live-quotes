@extends('layouts.app_layouts.main_app')

@section('main-section')

    @if(session()->has('message'))
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <strong>Success</strong> {{session('message')}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="widget has-shadow">

                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                <h4 class="text-muted">Update Company Information</h4>
                            </div>

                            <div class="widget-body">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label  @error('company_name') text-danger @enderror ">Company
                                                    Name <span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" value="{{old('company_name')}}"
                                                       class="form-control @error('company_name') border-danger @enderror"
                                                       wire:model.lazy="company_name">
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_name') {{$message}} @enderror</div>
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label @error('company_registration_number') text-danger @enderror ">Company
                                                    Registration Number <span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" value="{{old('company_registration_number')}}"
                                                       class="form-control  @error('company_registration_number') border-danger @enderror "
                                                       wire:model="company_registration_number"
                                                >
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_registration_number') {{$message}} @enderror</div>
                                            </div>

                                            <div class="col-lg-4 mt-2">
                                                <label class="form-control-label">Tax Number </label>
                                                <input type="text" value="{{old('tax_number')}}" class="form-control"
                                                       name="tax_number"
                                                       wire:model="tax_number"
                                                >
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label  @error('company_address') text-danger @enderror ">Address
                                                    <span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" value="{{old('company_address')}}"
                                                       class="form-control   @error('company_address')  border-danger  @enderror "
                                                       name="company_address"
                                                       wire:model="company_address"
                                                >
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_address') {{$message}} @enderror</div>
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label @error('company_province') text-danger @enderror ">Province
                                                    <span
                                                        class="text-danger"> *</span></label>
                                                <select name="company_province" wire:model="company_province"
                                                        id="company_province"
                                                        class="form-control    @error('company_province')  border-danger  @enderror ">
                                                    <option value="0">Select Province</option>
                                                    @foreach($provinces as $p)
                                                        <option value="{{$p->name}}">{{$p->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_province') {{$message}} @enderror</div>
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label  @error('company_city') text-danger @enderror ">City
                                                    <span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" value="{{old('company_city')}}"
                                                       class="form-control    @error('company_city')  border-danger  @enderror "
                                                       name="company_city"
                                                       wire:model="company_city"
                                                >
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_city') {{$message}} @enderror</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label @error('company_telephone') text-danger @enderror ">Contact
                                                    Number <span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" value="{{old('company_telephone')}}"
                                                       class="form-control @error('company_telephone')  border-danger  @enderror "
                                                       name="company_telephone"
                                                       wire:model="company_telephone"
                                                >
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_telephone') {{$message}} @enderror</div>
                                            </div>

                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label  @error('company_email') text-danger @enderror ">Email
                                                    <span
                                                        class="text-danger"> *</span>
                                                </label>
                                                <input type="text" value="{{old('company_email')}}"
                                                       class="form-control   @error('company_email')  border-danger  @enderror "
                                                       name="company_email"
                                                       wire:model="company_email"
                                                >
                                                <div
                                                    class="form-control-feedback text-danger">@error('company_email') {{$message}} @enderror</div>
                                            </div>

                                            <div class="col-lg-4 mt-2">
                                                <label class="form-control-label">Fax </label>
                                                <input type="text" class="form-control"
                                                       name="company_fax"
                                                       wire:model="company_fax"
                                                >
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-4 mt-2">
                                                <label class="form-control-label">Website</label>
                                                <input type="text" class="form-control" value="{{old('website')}}"
                                                       name="website"
                                                       wire:model="website"
                                                >
                                            </div>

                                            <div class="col-lg-4 mt-2">
                                                <label
                                                    class="form-control-label  @error('business_sector_id') text-danger @enderror ">Business
                                                    Sector<span
                                                        class="text-danger"> *</span> </label>
                                                <select name="business_sector_id" name="business_sector_id"
                                                        wire:model="business_sector_id" id="business_sector_id"
                                                        class="form-control @error('business_sector_id') border-danger @enderror">
                                                    <option value="0">Select Business Sector</option>
                                                    @foreach($business_sector as $sector)
                                                        <option value="{{$sector->id}}">{{$sector->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div
                                                    class="form-control-feedback text-danger">@error('business_sector_id') {{$message}} @enderror</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 mt-2">
                                                <label class="form-control-label">Company Logo </label>
                                                <input type="file" name="photo"
                                                       placeholder="Upload your company logo here"
                                                       class="form-control"
                                                       id="photo"
                                                       wire:change="$emit('fileChoosen')"
                                                >

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mt-4">
                                                <label class="form-control-label">Company Profile </label>
                                                <textarea name="company_profile" id="company_profile" cols="30"
                                                          rows="10" class="form-control"
                                                          wire:model="company_profile">{{old('company_profile')}}</textarea>
                                            </div>
                                        </div>

                                        <div class="text-left mt-3">
                                            <button type="submit" class="btn btn-success btn-lg mr-1 mb-2"><i
                                                    class="la la-check"></i>Update Business Profile
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        window.livewire.on('fileChoosen', () => {
            // alert("Got You all in check");
            let inputField = document.getElementById('photo');
            let file = inputField.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('fileUpload', reader.result);
            }
            reader.readAsDataURL(file);
        })
    </script>

@endsection

