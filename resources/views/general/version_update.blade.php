@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Version Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Version Update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> {{ session('success') }}.
                </div>
              @endif
              @if (session('Fail'))
                <div class="alert alert-danger" role="alert">
                    <strong>Fail!</strong> {{ session('Fail') }}.
                </div>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                            <strong>Fail!</strong>{{ $error }}.
                    @endforeach
                </div>
              @endif

            <form action="{{url('/version_save')}}" method="post" enctype="multipart/form-data"> 
            {{ csrf_field() }}
              <div class="card card-info">
                <!-- /.card-header -->
                <!-- form start -->
                <div class="col-md-6 col-sm-12">
                  <div class="card-body">
                  <input class="form-control" type="hidden" id="data" name="url" required></input>

                    <div class="form-group">
                      <label>Select Domain</label>
                      <select name="domain[]" class="select2 allselect" multiple="multiple" data-placeholder="Select domain" style="width: 100%;" required>
                        <option value="all">Select All</option>
                        @foreach($domain as $resdomain)
                          <option value="{{$resdomain->id}}">{{ $resdomain->folder_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="name">Choose File or Folder</label><br>
                      <div class="icheck-success d-inline col-sm-3">
                        <input type="radio" name="choose" value="cfolder" id="radioSuccess1">
                        <label for="radioSuccess1">Folder</label>
                      </div>
                      <div class="icheck-success d-inline col-sm-3">
                        <input type="radio" name="choose" value="cfile"  id="radioSuccess2">
                        <label for="radioSuccess2">File</label>
                      </div>
                    </div>  
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select Directory</label>
                      <select id="main" name="d1" class="form-control mb-3" >
                        <option value="">Select</option>
                        <option value="app">app</option>
                        <option value="config">config</option>
                        <option value="public">public</option>
                        <option value="resources">resources</option>
                        <option value="routes">routes</option>
                      </select>

                      <select id="appsub" name="d2" class="form-control mb-3">
                        <option value="">Select APP Subfolder</option>
                        <option value="Http">Http</option>
                        <option value="Models">Models</option>
                      </select>

                      <select id="httpsub" name="d3" class="form-control mb-3">
                        <option value="">Select Http Subfolder</option>
                        <option value="Controllers">Controllers</option>
                        <option value="Middleware">Middleware</option>
                      </select>

                      <select id="controllersub" name="d4" class="form-control mb-3">
                        <option value="">Select Controllers Subfolder</option>
                        <option value="AdminControllers">AdminControllers</option>
                        <option value="App">App</option>
                        <option value="Auth">Auth</option>
                        <option value="DeliveryBoy">DeliveryBoy</option>
                        <option value="Web">Web</option>
                      </select>

                      <select id="middlewaresub" name="d5" class="form-control mb-3">
                        <option value="">Select Middleware Subfolder</option>
                        <option value="admin_type">admin_type</option>
                        <option value="app_setting">app_setting</option>
                        <option value="categories">categories</option>
                        <option value="collection">collection</option>
                        <option value="coupon">coupon</option>
                        <option value="customer">customer</option>
                        <option value="dashboard">dashboard</option>
                        <option value="deliveryboy">deliveryboy</option>
                        <option value="finance">finance</option>
                        <option value="general_setting">general_setting</option>
                        <option value="languages">languages</option>
                        <option value="loyalty">loyalty</option>
                        <option value="manage_admin">manage_admin</option>
                        <option value="user_permission">user_permission</option>
                        <option value="management">management</option>
                        <option value="manufacturer">manufacturer</option>
                        <option value="media">media</option>
                        <option value="news">news</option>
                        <option value="newsletter">newsletter</option>
                        <option value="notification">notification</option>
                        <option value="order">order</option>
                        <option value="payment">payment</option>
                        <option value="pos_setting">pos_setting</option>
                        <option value="product">product</option>
                        <option value="report">report</option>
                        <option value="reviews">reviews</option>
                        <option value="shipping">shipping</option>
                        <option value="shoppinginfo">shoppinginfo</option>
                        <option value="tax">tax</option>
                        <option value="ticket">ticket</option>
                        <option value="vendors">vendors</option>
                        <option value="web_setting">web_setting</option>
                      </select>

                      <select id="modelsub" name="d6" class="form-control mb-3">
                        <option value="">Select Model Subfolder</option>
                        <option value="Admin">Admin</option>
                        <option value="AppModels">AppModels</option>
                        <option value="Core">Core</option>
                        <option value="DeliveryBoyModel">DeliveryBoyModel</option>
                        <option value="Web">Web</option>
                      </select>

                      <select id="publicsub" name="d7" class="form-control mb-3">
                        <option value="">Select Public Subfolder</option>
                        <option value="admin">admin</option>
                        <option value="images">images</option>
                        <option value="web">web</option>
                      </select>


                      <select id="adminsub" name="d8" class="form-control mb-3">
                        <option value="">Select Admin Subfolder</option>
                        <option value="css">css</option>
                        <option value="js">js</option>
                        <option value="top-offer">Top Offer</option>
                      </select>

                      <select id="adminimagesub" name="d9" class="form-control mb-3">
                        <option value="">Select Admin Images Subfolder</option>
                        <option value="prototypes">prototypes</option>       
                      </select>

                      <select id="websub" name="d10" class="form-control mb-3">
                        <option value="">Select Web Subfolder</option>
                        <option value="css">css</option>
                        <option value="images">images</option>
                        <option value="js">js</option>
                        <option value="webfonts">webfonts</option>
                      </select>

                      <select id="webimagesub" name="d11" class="form-control mb-3">
                        <option value="">Select Web Images Subfolder</option>
                        <option value="miscellaneous">miscellaneous</option>       
                      </select>

                      <select id="resourcessub" name="d12" class="form-control mb-3">
                        <option value="">Select Resources Subfolder</option>
                        <option value="assets">assets</option>
                        <option value="lang">lang</option>
                        <option value="views">views</option>
                      </select>


                      <select id="assetssub" name="d13" class="form-control mb-3">
                        <option value="">Select Assets Subfolder</option>
                        <option value="js">js</option>
                      </select>

                      <select id="jssub" name="d14" class="form-control mb-3">
                        <option value="">Select Assets JS Subfolder</option>
                        <option value="components">components</option>
                      </select>

                      <select id="langsub" name="d15" class="form-control mb-3">
                        <option value="">Select Lang Subfolder</option>
                        <option value="en">en</option>
                      </select>

                      <select id="viewssub" name="d16" class="form-control mb-3">
                        <option value="">Select Views Subfolder</option>
                        <option value="admin">admin</option>
                        <option value="auth">auth</option>
                        <option value="ipay">ipay</option>
                        <option value="mail">mail</option>
                        <option value="web">web</option>
                      </select>


                      <select id="authsub" name="d17" class="form-control mb-3">
                        <option value="">Select Auth Subfolder</option>
                        <option value="logins">logins</option>
                        <option value="passwords">passwords</option>
                      </select>



                      <select id="viewadminsub" name="d18" class="form-control mb-3">
                        <option value="">Select View Admin Subfolder</option>
                        <option value="admin">admin</option>
                        <option value="admins">admins</option>
                        <option value="Banners">Banners</option>
                        <option value="banners_views">banners_views</option>
                        <option value="categories">categories</option>
                        <option value="clientbrand">clientbrand</option>
                        <option value="collection">collection</option>
                        <option value="common">common</option>
                        <option value="countries">countries</option>
                        <option value="coupons">coupons</option>
                        <option value="currencies">currencies</option>
                        <option value="customers">customers</option>
                        <option value="deliveryboys">deliveryboys</option>
                        <option value="deliveryrates">deliveryrates</option>
                        <option value="languages">languages</option>
                        <option value="loyalty">loyalty</option>
                        <option value="managements">managements</option>
                        <option value="manufacturers">manufacturers</option>
                        <option value="media">media</option>
                        <option value="menus">menus</option>
                        <option value="news">news</option>
                        <option value="newscategories">newscategories</option>
                        <option value="newsletter">newsletter</option>
                        <option value="Notifications">Notifications</option>
                        <option value="Orders">Orders</option>
                        <option value="pages">pages</option>
                        <option value="paymentmethods">paymentmethods</option>
                        <option value="products">products</option>
                        <option value="products_attributes">products_attributes</option>
                        <option value="readyTemplate">readyTemplate</option>
                        <option value="reports">reports</option>
                        <option value="reviews">reviews</option>
                        <option value="settings">settings</option>
                        <option value="shippingmethods">shippingmethods</option>
                        <option value="shoppinginfo">shoppinginfo</option>
                        <option value="sliders_view">sliders_view</option>
                        <option value="tax">tax</option>
                        <option value="theme">theme</option>
                        <option value="ticket">ticket</option>
                        <option value="zones">zones</option>
                      </select>


                      <select id="viewadmincustomersub" name="d19" class="form-control mb-3">
                        <option value="">Select View Admin Customer Subfolder</option>
                        <option value="address">address</option>
                      </select>

                      <select id="viewadmindeliveryboysub" name="d20" class="form-control mb-3">
                        <option value="">Select View Admin Deliveryboy Subfolder</option>
                        <option value="finance">finance</option>
                        <option value="floatingcash">floatingcash</option>
                        <option value="status">status</option>
                        <option value="withdraw">withdraw</option>
                      </select>

                      <select id="viewadminpagessub" name="d21" class="form-control mb-3">
                        <option value="">Select View Admin Pages Subfolder</option>
                        <option value="deliveryboys">deliveryboys</option>
                        <option value="webpages">webpages</option>
                        <option value="zippages">zippages</option>
                      </select>

                      <select id="viewadminproductssub" name="d22" class="form-control mb-3">
                        <option value="">Select View Admin Products Subfolder</option>
                        <option value="attribute">attribute</option>
                        <option value="inventory">inventory</option>
                        <option value="modals">modals</option>
                        <option value="pop_up_forms">pop_up_forms</option>
                        <option value="images">images</option>
                        <option value="videos">videos</option>
                      </select>

                      <select id="viewadminproductsimagesub" name="d23" class="form-control mb-3">
                        <option value="">Select View Admin Products Image / Video Subfolder</option>
                        <option value="modal">modal</option>
                      </select>

                      <select id="viewadminproductsattrsub" name="d24" class="form-control mb-3">
                        <option value="">Select View Admin Products Attributes Subfolder</option>
                        <option value="options">options</option>
                      </select>

                      <select id="viewadminsettingssub" name="d25" class="form-control mb-3">
                        <option value="">Select View Admin Settings Subfolder</option>
                        <option value="app">app</option>
                        <option value="general">general</option>
                        <option value="web">web</option>
                      </select>

                      <select id="viewadminsettingsappsub" name="d26" class="form-control mb-3">
                        <option value="">Select View Admin Settings app Subfolder</option>
                        <option value="labels">labels</option>
                      </select>

                      <select id="viewadminsettingsgeneralsub" name="d27" class="form-control mb-3">
                        <option value="">Select View Admin Settings General Subfolder</option>
                        <option value="geo">geo</option>
                        <option value="units">units</option>
                      </select>

                      <select id="viewadminsettingswebsub" name="d28" class="form-control mb-3">
                        <option value="">Select View Admin Settings Web Subfolder</option>
                        <option value="banners">banners</option>
                        <option value="homebanners">homebanners</option>
                        <option value="sliders">sliders</option>
                      </select>


                      <select id="viewswebsub" name="d29" class="form-control mb-3">
                        <option value="">Select View Web Subfolder</option>
                        <option value="banners">banners</option>
                        <option value="brand">brand</option>
                        <option value="carousels">carousels</option>
                        <option value="carts">carts</option>
                        <option value="category">category</option>
                        <option value="common">common</option>
                        <option value="contacts">contacts</option>
                        <option value="details">details</option>
                        <option value="flash">flash</option>
                        <option value="footers">footers</option>
                        <option value="headers">headers</option>
                        <option value="info_box">info_box</option>
                        <option value="news">news</option>
                        <option value="Orders">Orders</option>
                        <option value="paytm">paytm</option>
                        <option value="product-sections">product-sections</option>
                        <option value="shop-pages">shop-pages</option>
                        <option value="tickets">tickets</option>
                      </select>

                      <select id="viewswebcommonsub" name="d30" class="form-control mb-3">
                        <option value="">Select View Web Common Subfolder</option>
                        <option value="product_card_style">product_card_style</option>
                        <option value="scripts">scripts</option>
                      </select>

                      <select id="viewswebdetailsub" name="d31" class="form-control mb-3">
                        <option value="">Select View Web Detail Subfolder</option>
                        <option value="partials">partials</option>
                      </select>

                      <select id="viewswebfootersub" name="d32" class="form-control mb-3">
                        <option value="">Select View Web Footer Subfolder</option>
                        <option value="partials">partials</option>
                      </select>

                      <select id="viewswebheadersub" name="d33" class="form-control mb-3">
                        <option value="">Select View Web Header Subfolder</option>
                        <option value="cartButtons">cartButtons</option>
                      </select>

                      <select id="viewswebticketsub" name="d34" class="form-control mb-3">
                        <option value="">Select View Web Ticket Subfolder</option>
                        <option value="includes">includes</option>
                        <option value="layouts">layouts</option>
                      </select>
                    </div>

                    <div id="fileID" class="form-group">
                      <label for="name">Upload File</label>
                      <input class="form-control"  type="file" name="files[]" multiple>
                    </div>

                    <div id="folderID" class="form-group">
                      <label for="name">Folder Name</label>
                      <input class="form-control"  type="text" placeholder="Enter Folder Name" name="folder">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
                  <!-- /.card-body -->
                 
              </div>
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection