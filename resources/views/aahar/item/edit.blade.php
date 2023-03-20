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
                    <h1>Update Item</h1>
                    <form action="{{ route('item.update', $item->id) }}" method="post">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <tr>
                                <th style="font-size: 15px; width: 20%">Item Category</th>
                                <th>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="{{ $item->category->id }}">{{ $item->category->name }}</option>
                                        @foreach ($category as $v)
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>

                                </th>
                                <th style="font-size: 15px">Item Name</th>
                                <th>
                                    <input type="text" name="item_name" class="form-control"
                                        value="{{ $item->item_name }}">

                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Avg Per Head Qunatity</th>
                                <th><input type="text" name="avg_per_head_qunatity" class="form-control"
                                        value="{{ $item->avg_per_head_qunatity }}">

                                </th>
                                <th style="font-size: 15px">Unit of Measurement</th>
                                <th>
                                    <input type="text" name="unit_of_measurement" class="form-control"
                                        value="{{ $item->unit_of_measurement }}">

                                </th>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><input type="submit" class="form-control btn btn-primary" value="Update"></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
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
                            @forelse ($items as $i=>$v)
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
@endsection
