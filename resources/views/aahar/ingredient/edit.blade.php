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
                    <h1>Update Ingredient</h1>
                    <form action="{{ route('ingredient.update', $ig->id) }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th style="font-size: 15px">Item Name</th>
                                <th style="font-size: 15px">
                                    <select name="item_id" id="" class="form-control">
                                        <option value="{{ $ig->item->id }}">{{ $ig->item->item_name }}</option>
                                        @foreach ($item as $i)
                                            <option value="{{ $i->id }}">{{ $i->item_name }}</option>
                                        @endforeach
                                    </select>

                                </th>
                                <th style="font-size: 15px">Ingredient type</th>
                                <th style="font-size: 15px">
                                    <select name="ingredient_type_id" id="" class="form-control">
                                        <option value="{{ $ig->ingredient_type->id }}">{{ $ig->ingredient_type->type }}
                                        </option>
                                        @foreach ($igrd_type as $i)
                                            <option value="{{ $i->id }}">{{ $i->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('ingredient_type_id')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>

                            </tr>
                            <tr>
                                <th style="font-size: 15px">Ingredient Name</th>
                                <th style="font-size: 15px">
                                    <input type="text" name="name" class="form-control" value="{{ $ig->name }}">

                                </th>
                                <th style="font-size: 15px">Quantity Per Unit</th>
                                <th style="font-size: 15px">
                                    <input type="text" name="quantity_per_unit" class="form-control"
                                        value="{{ $ig->quantity_per_unit }}">

                                </th>

                            </tr>
                            <tr>
                                <th style="font-size: 15px">Unit of Quantity</th>
                                <th style="font-size: 15px">
                                    <input type="text" name="unit_of_quantity" class="form-control"
                                        value="{{ $ig->unit_of_quantity }}">

                                </th>
                                <th style="font-size: 15px" colspan="2"><input type="submit"
                                        class="form-control btn btn-primary" value="Update"></th>
                            </tr>
                        </table>
                    </form>

                </div>

            </div>
            <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <h1>Ingredient list</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">SL</th>
                                <th style="font-size: 15px">Item Name</th>
                                <th style="font-size: 15px">Ingredient Type</th>
                                <th style="font-size: 15px">Ingredient Name</th>
                                <th style="font-size: 15px">Quantity Per Unit</th>
                                <th style="font-size: 15px">Unit of Quantity</th>
                                <th style="font-size: 15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($igrd as $i=>$v)
                                <tr>
                                    <td style="font-size: 15px">{{ ++$i }}</td>
                                    <td style="font-size: 15px">{{ $v->item->item_name }}</td>
                                    <td style="font-size: 15px">{{ $v->ingredient_type->type }}</td>
                                    <td style="font-size: 15px">{{ $v->name }}</td>
                                    <td style="font-size: 15px">{{ $v->quantity_per_unit }}</td>
                                    <td style="font-size: 15px">{{ $v->unit_of_quantity }}</td>
                                    <td style="font-size: 15px">
                                        <a href="{{ route('ingredient.edit', $v->id) }}" style="color: green"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('ingredient.destroy', $v->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure?')"
                                                style="color: red"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th style="font-size: 15px" colspan="7">No Ingredient Added Yet</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        @include('aahar.footer.footer')

    </div>
@endsection
