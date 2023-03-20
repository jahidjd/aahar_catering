@extends('aahar.layout.layout')
@section('body')
    <div class="page-container">
        {{-- side menu --}}
        @include('aahar.header.menu')

        <div class="main-content page-content">


            <div class="header-area mb-4">
                <div class="row align-items-center">
                    <div class="mobile-logo d_none_lg">
                        <a href="{{ route('dashboard') }}" style="color: black; font-family: cursive;">Aahar Catering</a>
                    </div>

                    <div class="col-md-6 d_none_sm d-flex align-items-center">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        {{-- <div class="search-box pull-left">
                            <form action="#">
                                <i class="ti-search"></i>
                                <input type="text" name="search" placeholder="Search..." required>
                            </form>
                        </div> --}}
                    </div>


                    {{-- top menu --}}
                    @include('aahar.header.topMenu')


                </div>
            </div>

            <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    <h1>Add Item</h1>
                    <form action="{{ route('item.store') }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th style="font-size: 15px; width: 20%">Item Category</th>
                                <th>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: green">If You Want to add New Category <button type="button"
                                            class=" btn-flat mt-2" data-toggle="modal" data-target=".bd-example-modal-lg"
                                            style="color: brown">Click Here
                                        </button></span>
                                    @error('category_id')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th style="font-size: 15px">Item Name</th>
                                <th>
                                    <input type="text" name="item_name" class="form-control"
                                        value="{{ old('item_name') }}" placeholder="Item Name">
                                    @error('item_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Avg Per Head Qunatity</th>
                                <th><input type="text" name="avg_per_head_qunatity" class="form-control"
                                        value="{{ old('avg_per_head_qunatity') }}"
                                        placeholder="Avg Per Head Qunatity (Number)">
                                    @error('avg_per_head_qunatity')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th style="font-size: 15px">Unit of Measurement</th>
                                <th>
                                    <input type="text" name="unit_of_measurement" class="form-control"
                                        value="{{ old('unit_of_measurement') }}" placeholder="ex: gm, ml,">
                                    @error('unit_of_measurement')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><input type="submit" class="form-control btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    @if ($message = Session::get('item'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <h1>Item list</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">SL</th>
                                <th style="font-size: 15px">Category Name</th>
                                <th style="font-size: 15px">Item Name</th>
                                <th style="font-size: 15px">Avg Per Head Quantity</th>
                                <th style="font-size: 15px">Unit of Measurement</th>
                                <th style="font-size: 15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item as $i=>$v)
                                <tr>
                                    <td style="font-size: 15px">{{ ++$i }}</td>
                                    <td style="font-size: 15px">{{ $v->category->name }}</td>
                                    <td style="font-size: 15px">{{ $v->item_name }}</td>
                                    <td style="font-size: 15px">{{ $v->avg_per_head_qunatity }}</td>
                                    <td style="font-size: 15px">{{ $v->unit_of_measurement }}</td>
                                    <td style="font-size: 15px">
                                        <a href="{{ route('item.edit', $v->id) }}" style="color: green"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('item.destroy', $v->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure?')"
                                                style="color: red"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="font-size: 15px">No Item addedd yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        @include('aahar.footer.footer')

    </div>

    {{-- add category modal --}}

    <div class="modal fade bd-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 15%; font-size: 15px">Category Name</th>
                                <th style="font-size: 15px"><input type="text" name="name" class="form-control"
                                        value="{{ old('name') }}" placeholder="Enter Category Name">
                                    @error('name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>

                            </tr>
                            <tr>
                                <th style="width: 15%; font-size: 15px">Category Description</th>
                                <th style="font-size: 15px">
                                    <textarea name="description" id="" cols="15" rows="5" class="form-control"
                                        placeholder="Enter Category Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 15px"><input type="submit" class="btn btn-primary form-control">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
