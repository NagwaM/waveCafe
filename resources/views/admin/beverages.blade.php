<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.includesAdmin.headList')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.includesAdmin.body')

            <!-- menu profile quick info -->
            @include('admin.includesAdmin.menuProfile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.includesAdmin.sidebarMenu')
			      <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('admin.includesAdmin.menuFooter')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('admin.includesAdmin.topNavigation')
        <!-- /top navigation -->

        <!-- page content -->
        @include('admin.includesAdmin.pageContentBeverages')
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.includesAdmin.footerContent')
        <!-- /footer content -->
      </div>
    </div>

    @include('admin.includesAdmin.footerJsList')

  </body>
</html>