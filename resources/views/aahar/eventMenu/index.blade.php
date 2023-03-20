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
                    <h1>Add Event Menu </h1>
                    <form action="{{ route('eventMenu.store') }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th style="font-size: 15px">Event Name</th>
                                <th>
                                    <select name="event_id" id="" class="form-control">
                                        <option value="">Select Event</option>
                                        @foreach ($event as $item)
                                            <option value="{{ $item->id }}">{{ $item->event_name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th style="font-size: 15px">Menu Name</th>
                                <th>
                                    <input type="text" name="menu_name" class="form-control"
                                        value="{{ old('menu_name') }}" placeholder="Enter Menu Name">
                                    @error('menu_name')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                            <tr>
                                <th style="font-size: 15px">Number of Attendees</th>
                                <th>
                                    <input type="text" name="number_of_attendees" class="form-control"
                                        value="{{ old('number_of_attendees') }}" placeholder="Enter Number of Attendees">
                                    @error('number_of_attendees')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th style="color:red" colspan="2"><input type="submit"
                                        class="form-control btn btn-primary"></th>
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
                    <h1>Event Menu list</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="font-size: 15px">SL</th>
                                <th style="font-size: 15px">Event Name</th>
                                <th style="font-size: 15px">Menu Name</th>
                                <th style="font-size: 15px">Number of Attendees</th>
                                <th style="font-size: 15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($eventMenu as $i=>$v)
                                <tr>
                                    <td style="font-size: 15px">{{ ++$i }}</td>
                                    <td style="font-size: 15px">{{ $v->event->event_name }}</td>
                                    <td style="font-size: 15px">{{ $v->menu_name }}</td>
                                    <td style="font-size: 15px">{{ $v->number_of_attendees }}</td>
                                    <td style="font-size: 15px">
                                        <a href="{{ route('eventMenu.edit', $v->id) }}" style="color: green"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{ route('eventMenu.destroy', $v->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure?')"
                                                style="color: red"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td style="font-size: 15px" colspan="5">No Menu added Yet</td>
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
