@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">
        <div class="col-md-9">
            @if($updateMode == 0)
                <form wire:submit.prevent="submit">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="widget has-shadow">
                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                            <h4 class="text-muted">Add Quote Item</h4>
                                        </div>
                                        <div class="widget-body">

                                            <div class="form-group row">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-xl-2 mt-2">
                                                            <label
                                                                class="form-control-label  @error('quantity') text-danger @enderror ">Quantity
                                                                <span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="number" value="{{old('quantity')}}"
                                                                   class="form-control @error('quantity') border-danger @enderror"
                                                                   wire:model.lazy="quantity">
                                                            <div
                                                                class="form-control-feedback text-danger">@error('quantity') {{$message}} @enderror</div>
                                                        </div>

                                                        <div class="col-xl-2 mt-2">
                                                            <label
                                                                class="form-control-label  @error('price') text-danger @enderror ">Unit
                                                                Price
                                                                <span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="" value="{{old('price')}}"
                                                                   class="form-control @error('price') border-danger @enderror"
                                                                   wire:model.lazy="price"  step="0.01" >
                                                            <div
                                                                class="form-control-feedback text-danger">@error('price') {{$message}} @enderror</div>
                                                        </div>

                                                        <div class="col-xl-8 mt-2">
                                                            <label
                                                                class="form-control-label  @error('description') text-danger @enderror ">Description
                                                                <span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="text" value="{{old('description')}}"
                                                                   class="form-control @error('description') border-danger @enderror"
                                                                   wire:model.lazy="description">
                                                            <div
                                                                class="form-control-feedback text-danger">@error('description') {{$message}} @enderror</div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i
                                            class="fa fa-plus-circle"></i> Add Item
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <form wire:submit.prevent="update">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="widget has-shadow">
                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                            <h4 class="text-muted">Update Quote Item</h4>
                                        </div>
                                        <div class="widget-body">

                                            <div class="form-group row">
                                                <div class="col-xl-12">
                                                    <div class="row">
                                                        <div class="col-xl-2 mt-2">
                                                            <input type="text" hidden wire:model="selectedId">
                                                            <label
                                                                class="form-control-label  @error('quantity') text-danger @enderror ">Quantity
                                                                <span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="number" value="{{old('quantity')}}"
                                                                   class="form-control @error('quantity') border-danger @enderror"
                                                                   wire:model.lazy="quantity">
                                                            <div
                                                                class="form-control-feedback text-danger">@error('quantity') {{$message}} @enderror</div>
                                                        </div>

                                                        <div class="col-xl-2 mt-2">
                                                            <label
                                                                class="form-control-label  @error('price') text-danger @enderror ">Unit
                                                                Price
                                                                <span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="" value="{{old('price')}}"
                                                                   class="form-control @error('price') border-danger @enderror"
                                                                   wire:model.lazy="price"  step="0.01" >
                                                            <div
                                                                class="form-control-feedback text-danger">@error('price') {{$message}} @enderror</div>
                                                        </div>

                                                        <div class="col-xl-8 mt-2">
                                                            <label
                                                                class="form-control-label  @error('description') text-danger @enderror ">Description
                                                                <span
                                                                    class="text-danger"> *</span></label>
                                                            <input type="text" value="{{old('description')}}"
                                                                   class="form-control @error('description') border-danger @enderror"
                                                                   wire:model.lazy="description">
                                                            <div
                                                                class="form-control-feedback text-danger">@error('description') {{$message}} @enderror</div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i
                                            class="fas fa-edit"></i> Update Item
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif

            <div class="card">
                <div class="card-body">

                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4 class="text-muted">Quotation Items</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quote_items as $q)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$q->description}}</td>
                                    <td>
                                        {{$q->quantity}}
                                    </td>
                                    <td>{{$q->price}}</td>
                                    <td>R{{$q->quantity * $q->price}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success" wire:click="edit({{$q->id}})"><i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" wire:click="delete({{$q->id}})"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="widget has-shadow">

                                <div class="widget-body" style="color: #ffffff">
                                    <div class="header-title" style="color: #ffffff">Subtotal</div>
                                    <h6 class="seling-data mb-1">R{{$quote_item_sum->total_price}}</h6>
                                    <hr style="color:#ffffff;">
                                    <div class="header-title" style="color: #ffffff">Sales Tax (15%)</div>
                                    <h6 class="seling-data mb-1">R{{($quote_item_sum->total_price) * 0.15 }}</h6>
                                    <hr>
                                    <div class="header-title" style="color: #ffffff">Total</div>
                                    <h6 class="seling-data mb-1">R{{($quote_item_sum->total_price) * 1.15 }}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

