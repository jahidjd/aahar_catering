@extends('aahar.layout.layout')
@section('body')
    <div class="page-container">
        @php
            $order = $data;
        @endphp

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
                    <h1>Correlation Form</h1>
                    @if ($message = Session::get('success'))
                        <span style="color: green">{{ $message }}</span>
                    @endif
                    @if ($message = Session::get('error'))
                        <span style="color: red">{{ $message }}</span>
                    @endif
                    <form action="{{ route('addCorrelation') }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            @foreach ($order as $k => $item)
                                @php
                                    $category = \App\Models\Category::where('id', $item['category_id'])->first();
                                    $itms = explode(',', $item['item_id']);
                                    $item_all = \App\Models\Item::whereIn('id', $itms)->get();
                                @endphp
                                <tr>
                                    <td>
                                        <input type="hidden" name="category_id[]" id="category_id_{{ $k + 1 }}"
                                            value="{{ $item['category_id'] ?? '' }}">
                                        {{ $category->name ?? '' }}
                                    </td>
                                    <td>
                                        @foreach ($item_all as $key => $val)
                                            {{ $loop->first ? '' : ', ' }}
                                            <input type="hidden" name="item_id[]" id="item_id_{{ $k + 1 }}"
                                                value="{{ $item['item_id'] ?? '' }}">
                                            {{ $val->item_name ?? '' }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <input type="text" name="ratio[]" id="ratio_{{ $k + 1 }}"
                                            class="form-control" placeholder="Enter Ratio">
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right"><input type="submit" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        @include('aahar.footer.footer')

    </div>
@endsection
