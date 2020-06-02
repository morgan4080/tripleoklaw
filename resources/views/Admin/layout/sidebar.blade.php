<aside class="main-sidebar" style="background : #000000;">



    <!-- sidebar: style can be found in sidebar.less -->

<section class="sidebar">



      <!-- Sidebar user panel (optional) -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="{{url('uploads/images/girl.svg')}}" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p>Administrator</p>

          <!-- Status -->

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>



      <!-- search form (Optional) -->

      <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

          <span class="input-group-btn">

              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

              </button>

            </span>

        </div>

      </form>

      <!-- /.search form -->



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('admin.home') }}"><i class="fa fa-tachometer" aria-hidden="true" style="color:red"></i><span>Dashboad</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('admin.home') }}">Dashboard</a></li>


          </ul>
        
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('article.index') }}"><i class="fa fa-book" aria-hidden="true" style="color:green"></i><span>Perspective Page</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('article.create') }}">Add Articles</a></li>

            <li><a href="{{ route('article.index') }}">View Articles</a></li>

          </ul>
        
        </li>
      </ul>
  <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('category.index') }}"><i class="fa fa-users" aria-hidden="true" style="color:green"></i><span>Categories</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('category.create') }}">Add Categories</a></li>

            <li><a href="{{ route('category.index') }}">View Category</a></li>

          </ul>
        
        </li>
      </ul>
      
       <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('job.index') }}"><i class="fa fa-briefcase" aria-hidden="true" style="color:green"></i><span>Job Applications</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('job.create') }}">Add Jobs</a></li>

            <li><a href="{{route('job.index')}}">View Added Jobs</a></li>
            <li><a href="/admin/application">View Applied  Jobs</a></li>


          </ul>
        
        </li>
      </ul>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('practice.index') }}"><i class="fa fa-plug" aria-hidden="true" style="color:green"></i><span>Practice</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('practice.create') }}">Add Practice</a></li>

            <li><a href="{{ route('practice.index') }}">View Practice</a></li>

          </ul>
        
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('category.index') }}"><i class="fa fa-cubes" aria-hidden="true" style="color:green"></i><span>Practice Categories</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('pracategory.create') }}">Add New Practice Categories</a></li>

            <li><a href="{{ route('pracategory.index') }}">View Practice Category</a></li>

          </ul>
        
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('team.index') }}"><i class="fa fa-users" aria-hidden="true" style="color:green"></i><span>Team</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('team.create') }}">Add Team </a></li>

            <li><a href="{{ route('team.index') }}">View Team</a></li>

          </ul>
        
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('team.index') }}"><i class="fa fa-newspaper-o" aria-hidden="true" style="color:green"></i><span>Newsletter</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('news.newsletter') }}">Create Newsletter</a></li>

          </ul>
        
        </li>
      </ul>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview"><a href="{{ route('pages.index') }}"><i class="fa fa-users" aria-hidden="true" style="color:green"></i><span>Dynamic Pages</span>
                    <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>
        </a>

          <ul class="treeview-menu">

            <li><a href="{{ route('pages.create') }}">Add Dynamic Page</a></li>

            <li><a href="{{ route('pages.index') }}">View Dynamic Pages</a></li>

          </ul>
        
        </li>
      </ul>
    </section>
  </aside>