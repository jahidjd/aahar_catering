<div class="sidebar-menu light-sidebar">
    <div class="sidebar-header">

        <div class="logo">
            {{-- <a href="index.html"><img src="assets/images/logo-dark.svg" alt="logo"></a> --}}
            <a href="{{ route('dashboard') }}" style="color: black; font-family: cursive;"> Aahar Catering</a>
        </div>

    </div>

    <div class="main-menu">
        <div class="menu-inner" id="sidebar_menu">
            <nav>
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="feather ft-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-ios-photos"></i>
                            <span>Order</span>
                        </a>
                        <ul class="collapse">
                            <li><a href="{{ route('order.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Order</span></a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-ios-photos"></i>
                            <span>Category</span>
                        </a>
                        <ul class="collapse">
                            <li><a href="{{ route('category.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Category</span></a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-ios-photos"></i>
                            <span>Item</span>
                        </a>
                        <ul class="collapse">
                            <li><a href="{{ route('item.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Items</span></a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-ios-photos"></i>
                            <span>Ingredient</span>
                        </a>
                        <ul class="collapse">
                            <li><a href="{{ route('ingredient_type.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Ingredient Type</span></a></li>
                            <li><a href="{{ route('ingredient.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Ingredients</span></a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-ios-photos"></i>
                            <span>Event</span>
                        </a>
                        <ul class="collapse">
                            <li><a href="{{ route('event.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Event</span></a></li>

                        </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ion-ios-photos"></i>
                            <span>Event Menu</span>
                        </a>
                        <ul class="collapse">
                            <li><a href="{{ route('eventMenu.index') }}"><i class="ion-ios-photos"></i><span>Add
                                        Event Menu</span></a></li>

                        </ul>
                    </li> --}}








                </ul>
            </nav>
        </div>
    </div>

</div>
