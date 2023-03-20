@extends('aahar.layout.layout')
@section('body')
    <div class="page-container">
        {{-- side menu --}}
        @include('aahar.header.menu')

        <div class="main-content page-content" style="font-size: 20px">


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
                    <h1> Update Category</h1>
                    <form action="{{ route('category.update', $cat->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 15%">Category Name</th>
                                <th><input type="text" name="name" class="form-control" value="{{ $cat->name }}"
                                        placeholder="Enter Category Name">

                                </th>

                            </tr>
                            <tr>
                                <th style="width: 15%">Category Description</th>
                                <th>
                                    <textarea name="description" id="" cols="15" rows="5" class="form-control"
                                        placeholder="Enter Category Description">{{ $cat->description }}</textarea>

                                </th>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-primary form-control" value="Update"></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    <h1>Category list</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($category as $i=>$v)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->description }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $v->id) }}" style="color: green"><i
                                                class="fa-solid fa-pen-to-square"></i></a><br>

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
                                    <td colspan="4">No Category Addedd Yet</td>
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
