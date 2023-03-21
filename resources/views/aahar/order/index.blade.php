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


            <div class="main-content-inner" id="button">
                <div class="card col-lg-12 col-md-12 col-xs-12">
                    @if ($message = Session::get('success'))
                        <span style="color: green">{{ $message }}</span>
                    @endif
                    @if ($message = Session::get('error'))
                        <span style="color: red">{{ $message }}</span>
                    @endif
                    <h1 class="btn btn-primary newOrder">Create Order For New Event</h1>
                    <h1 class="btn btn-info oldOrder">Create Order For Existing Event</h1>


                </div>

            </div>


            <div class="main-content-inner" id="NewEvent">
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
                                        value="{{ old('event_factor') }}" placeholder="Enter Your Event Factor (Optional)">


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



            @if (Session::get('eventAdded') == 'eventAdded')
                <div class="main-content-inner">
                    <div class="card col-lg-12 col-md-12 col-xs-12">
                        <h1>Order Form</h1>
                        @if ($message = Session::get('success'))
                            <span style="color: green">{{ $message }}</span>
                        @endif
                        @if ($message = Session::get('error'))
                            <span style="color: red">{{ $message }}</span>
                        @endif
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th style="font-size: 15px">Event Menu</th>
                                    <th>
                                        <select name="menu_name" id="" class="form-control">
                                            <option value="">Select Event Menu</option>
                                            <option value="breakfast">Breakfast</option>
                                            <option value="lunch">Lunch</option>
                                            <option value="dinner">Dinner</option>
                                            {{-- @foreach ($menu as $v)
                                            <option value="{{ $v->id }}">{{ $v->menu_name }}</option>
                                        @endforeach --}}
                                        </select>
                                    </th>
                                    <th style="font-size: 15px">Party Name</th>
                                    <th>
                                        <select name="party_name" id="" class="form-control">
                                            <option value="">Select Party Name</option>
                                            @foreach ($event as $v)
                                                <option value="{{ $v->id }}">{{ $v->party_name }}</option>
                                            @endforeach
                                        </select>
                                    </th>


                                </tr>
                                <tr>
                                    <th style="font-size: 15px">Number of Attendees</th>
                                    <td>
                                        <input type="text" name="number_of_attendees" class="form-control"
                                            value="{{ old('number_of_attendees') }}" placeholder="number of attendees">
                                    </td>
                                    <th style="font-size: 15px">Number of Veg</th>
                                    <td>
                                        <input type="text" name="number_of_veg" class="form-control"
                                            value="{{ old('number_of_veg') }}"
                                            placeholder="number of vegetarian optional">
                                    </td>
                                </tr>
                                <tr colspan="3">

                                </tr>
                            </table>

                            <table class="table table-bordered table-hover" id="orderTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="45%">Category</th>
                                        <th class="text-center" width="45%">Item</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody id="addOrderItem">
                                    <tr>
                                        <td class="wt">
                                            <select name="item_category[]" id="item_category_1"
                                                class="form-control item_category itemCat">
                                                <option value="">Select One</option>
                                                @foreach ($category as $i)
                                                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="wt">
                                            <select name="item[]" id="item_1" class="form-control item mselect"
                                                onChange="itmVal(1)" multiple>
                                                {{-- @foreach ($item as $i)
                                                    <option value="{{ $i->id }}">{{ $i->item_name }}</option>
                                                @endforeach --}}
                                            </select>
                                            <input type="hidden" name="item_hidden[]" id="item_hidden_1">
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-danger" type="button" value="Delete"
                                                onclick="deleteOrderRow(this)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="button" class="btn btn-success"
                                                onclick="addmore('addOrderItem');" value="Add More item">
                                        </td>
                                        <td>
                                            <input type="submit" class="form-control btn btn-primary">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>

                </div>
            @endif
        </div>

        @include('aahar.footer.footer')
        <div class="modal fade bd-example-modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
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
                                            placeholder="Avg Per Head Qunatity">
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

                                    <td colspan="4"><input type="submit" class="form-control btn btn-primary"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg-cat">
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
                                    <th style="font-size: 15px"><input type="text" name="name"
                                            class="form-control" value="{{ old('name') }}"
                                            placeholder="Enter Category Name">
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
                                    <td style="font-size: 15px"><input type="submit"
                                            class="btn btn-primary form-control">
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

    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        var count = 2;
        var limits = 500;

        function addmore(divName) {
            'use strict';
            if (count == limits) {
                alert("You have reached the limit of adding " + count + " inputs");
            } else {
                var newdiv = document.createElement('tr');
                newdiv = document.createElement("tr");
                var items = <?php echo json_encode($item); ?>;
                var categories = <?php echo json_encode($category); ?>;
                var option = "";
                items.forEach((element) => {
                    option += '<option value="' + element.id + '">' + element.item_name + "</option>"
                })

                var option2 = "";
                categories.forEach((element) => {
                    option2 += '<option value="' + element.id + '">' + element.name + "</option>"
                })

                newdiv.innerHTML = '<td class="wt"><select name="item_category[]" id="item_category_' + count +
                    '" class="form-control item_category_' + count + '"> ' + option2 +
                    ' </select></td><td class="wt"><select name="item[]" id="item_' + count +
                    '" class="form-control mselect item_' + count + '" onChange="itmVal(' + count +
                    ')" multiple> <option value="">Select One</option>' + option +
                    '</select><input type="hidden" name="item_hidden[]" id="item_hidden_' + count +
                    '"></td><td class="text-right"><button class="btn btn-danger" type="button" value="Delete" onclick="deleteOrderRow(this)">Delete</button></td>';
                document.getElementById(divName).appendChild(newdiv);
                count++;
            }
        }

        //Delete a row of table
        function deleteOrderRow(t) {
            'use strict';
            var a = $("#orderTable > tbody > tr").length;
            if (1 == a) {
                alert("There only one row you can't delete.");
            } else {
                var e = t.parentNode.parentNode;
                e.parentNode.removeChild(e);
            }
        };

        function itmVal(val) {
            var itms = $('#item_' + val).val();
            $("#item_hidden_" + val).val(itms);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#NewEvent').hide()
            $('.newOrder').on('click', function() {
                $('#NewEvent').show()
                $('#button').hide()
            })
            $('.oldOrder').on('click', function() {
                $('#button').hide()
            })
        })
        $(document).on('change', '.itemCat', function() {
            $('#opCat').append(
                '<option value="1">Option 1</option>');
            let catID = $(this).val()
            $.ajax({
                url: "{{ route('selectItem') }}",
                type: "POST",
                data: {
                    cat_id: catID,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    let catItem = res
                    let options = ''

                    catItem.forEach((item) => {
                        options +=
                            `<option value="${item.id}">${item.item_name}</option>`
                    })
                    // console.log(options);
                    $('select[name="item[]"]').append(options) // Updated selector
                }
            })
        })
    </script>
@endsection
