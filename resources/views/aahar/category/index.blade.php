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
                    <h1> Add Category</h1>
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
                                <td style="font-size: 15px"><input type="submit" class="btn btn-primary form-control"></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    @if ($message = Session::get('category'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <h1>Category list</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">SL</th>
                                <th style="font-size: 15px">Name</th>
                                <th style="font-size: 15px">Description</th>
                                <th style="font-size: 15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($category as $i=>$v)
                                <tr>
                                    <td style="font-size: 15px">{{ ++$i }}</td>
                                    <td style="font-size: 15px">{{ $v->name }}</td>
                                    <td style="font-size: 15px">{{ $v->description }}</td>
                                    <td style="font-size: 15px">
                                        <a href="{{ route('category.edit', $v->id) }}" style="color: green"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('category.destroy', $v->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure?')"
                                                style="color: red"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="font-size: 15px">No Category Addedd Yet</td>
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
