

        <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a  href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>Dashboard <span class="fa fa-chevron-down"></span></a>
            
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a href="{{url('category/addCategory')}}" ><i class="fa fa-home"></i> Category <span class="fa fa-chevron-down"></span></a>
            
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a href="{{url('subCategory/addSub')}}" ><i class="fa fa-home"></i>Sub Category <span class="fa fa-chevron-down"></span></a>
            
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a  ><i class="fa fa-home"></i>Product Manage <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: block;">
                    <li><a href="{{route('product.create')}}">Create</a></li>
                    <li><a href="{{route('product.list')}}">list</a></li>
                </ul>
            </li>
        </ul>
        
    </div>
        

    </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>

           