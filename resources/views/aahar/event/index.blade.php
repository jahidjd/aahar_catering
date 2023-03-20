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
                    <h1>Add Event</h1>
                    <form action="{{ route('event.store') }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th style="font-size: 15px">Event Name</th>
                                <th style="font-size: 15px"><input type="text" name="event_name" class="form-control"
                                        value="{{ old('event_name') }}" placeholder="Enter Your Event Name">

                                    @error('event_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th style="font-size: 15px">Event Date</th>
                                <th style="font-size: 15px"><input type="date" name="event_date" class="form-control"
                                        value="{{ old('event_date') }}">

                                    @error('event_date')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Event Factor</th>
                                <th style="font-size: 15px"><input type="text" name="event_factor" class="form-control"
                                        value="{{ old('event_factor') }}" placeholder="Enter Your Event Factor">


                                </th>
                                <th style="font-size: 15px">Address</th>
                                <th style="font-size: 15px"><input type="text" name="address" class="form-control"
                                        value="{{ old('address') }}" placeholder="Enter Your Event Address">

                                    @error('address')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Phone</th>
                                <th style="font-size: 15px"><input type="text" name="phone" class="form-control"
                                        value="{{ old('phone') }}" placeholder="Enter Your Phone Number">

                                    @error('phone')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th style="font-size: 15px">Email</th>
                                <th style="font-size: 15px"><input type="email" name="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="Enter Your Email">

                                    @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Party Name</th>
                                <th style="font-size: 15px"><input type="text" name="party_name" class="form-control"
                                        value="{{ old('party_name') }}" placeholder="Enter Party Name">

                                    @error('party_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th style="font-size: 15px">Organized By</th>
                                <th style="font-size: 15px"><input type="text" name="organized_by" class="form-control"
                                        value="{{ old('organized_by') }}"
                                        placeholder="Enter Name who will organize the event">

                                    @error('organized_by')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Arrangement</th>
                                <th style="font-size: 15px"><input type="text" name="arrangement" class="form-control"
                                        value="{{ old('arrangement') }}" placeholder="Enter Arrangement Settings ">

                                    @error('arrangement')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th colspan="2"><input type="submit" class="btn btn-primary form-control"></th>
                            </tr>
                        </table>
                    </form>

                </div>

            </div>
            {{-- <div class="main-content-inner">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <h1>Event list</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">Job No</th>
                                <th style="font-size: 15px">Event Name</th>
                                <th style="font-size: 15px">Event Date</th>
                                <th style="font-size: 15px">Event Factor</th>
                                <th style="font-size: 15px">Address</th>
                                <th style="font-size: 15px">Phone</th>
                                <th style="font-size: 15px">Email</th>
                                <th style="font-size: 15px">Party Name</th>
                                <th style="font-size: 15px">Organized By</th>
                                <th style="font-size: 15px">Arrangement</th>
                                <th style="font-size: 15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($event as $v)
                                <tr>
                                    <td style="font-size: 15px">{{ $v->job_no }}</td>
                                    <td style="font-size: 15px">{{ $v->event_name }}</td>
                                    <td style="font-size: 15px">{{ $v->event_date }}</td>
                                    <td style="font-size: 15px">{{ $v->event_factor }}</td>
                                    <td style="font-size: 15px">{{ $v->address }}</td>
                                    <td style="font-size: 15px">{{ $v->phone }}</td>
                                    <td style="font-size: 15px">{{ $v->email }}</td>
                                    <td style="font-size: 15px">{{ $v->party_name }}</td>
                                    <td style="font-size: 15px">{{ $v->organized_by }}</td>
                                    <td style="font-size: 15px">{{ $v->arrangement }}</td>
                                    <td style="font-size: 15px">
                                        <a href="{{ route('event.edit', $v->id) }}" style="color: green"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('event.destroy', $v->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure?')"
                                                style="color: red"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" style="font-size: 15px">No Event Created Yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div> --}}

        </div>

        @include('aahar.footer.footer')

    </div>
@endsection
