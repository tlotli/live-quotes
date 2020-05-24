@extends('layouts.app_layouts.main_app')

@section('main-section')
{{--    <div>--}}
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="widget has-shadow">

                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                <h4 class="text-muted">Request Quotation</h4>
                            </div>

                            <div class="widget-body">

                                <form wire:submit.prevent="submit">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 mt-2">
                                                    <label
                                                        class="form-control-label  @error('title') text-danger @enderror ">Title
                                                        <span
                                                            class="text-danger"> *</span></label>
                                                    <input type="text" value="{{old('title')}}"
                                                           class="form-control @error('title') border-danger @enderror"
                                                           wire:model.lazy="title">
                                                    <div
                                                        class="form-control-feedback text-danger">@error('title') {{$message}} @enderror</div>
                                                </div>
                                            </div>

                                            <div class="row ">

                                                <div class="col-lg-12 mt-2">
                                                    <label
                                                        class="form-control-label  @error('requirements') text-danger @enderror ">Requirements
                                                    </label>

                                                    <textarea name="requirements" id="requirements" rows="7"
                                                              wire:model="requirements"
                                                              class="form-control  @error('requirements') border-danger @enderror">{{old('requirements')}}</textarea>

                                                    <div
                                                        class="form-control-feedback text-danger">@error('requirements') {{$message}} @enderror</div>
                                                </div>

                                                <div class="col-lg-12 mt-2">
                                                    <label
                                                        class="form-control-label  @error('specification') text-danger @enderror ">Specification
                                                        <span
                                                            class="text-danger"> *</span></label>

                                                    <textarea name="specification" id="specification" rows="7"
                                                              wire:model.lazy="specification"
                                                              class="form-control">{{old('specification')}}</textarea>
                                                    <div
                                                        class="form-control-feedback text-danger">@error('specification') {{$message}} @enderror</div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 mt-2">
                                                    <label
                                                        class="form-control-label @error('closing_date') text-danger @enderror ">Closing
                                                        Date <span
                                                            class="text-danger"> *</span></label>
                                                    <input type="date" value="{{old('closing_date')}}"
                                                           class="form-control @error('closing_date')  border-danger  @enderror "
                                                           name="closing_date"
                                                           wire:model="closing_date"
                                                    >
                                                    <div
                                                        class="form-control-feedback text-danger">@error('closing_date') {{$message}} @enderror</div>
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

                                                <div class="col-lg-4 mt-2">
                                                    <label
                                                        class="form-control-label @error('status') text-danger @enderror ">Status
                                                        <span class="text-danger"> *</span> </label>
                                                    <select name="status" id="status" wire:model="status"
                                                            class="form-control  @error('status') border-danger @enderror">
                                                        <option value="">Choose Status</option>
                                                        <option value="0">Draft</option>
                                                        <option value="1">Submit For Bidding</option>
                                                    </select>
                                                    <div
                                                        class="form-control-feedback text-danger">@error('status') {{$message}} @enderror</div>
                                                </div>
                                            </div>

                                            <div class="text-left mt-3">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-check-all mr-2"></i>Submit Request
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection
