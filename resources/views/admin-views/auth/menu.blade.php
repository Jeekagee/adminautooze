<head>
  <title>Menu Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0"></div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2"></div>

            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2 mt-2">
                <div class="card">
                    <div class="card-header flex-between"></div>
                    <div class="table-responsive"  style="width:80%; margin-left:10%;">
                    <table class="table table-hover">
                            <thead>
                            <tr style="color:white; background-color:#111111; font-weight:bold; text-align:left;">
                                <th>{{translate('#')}}</th>
                                <th style="width: 50%">{{translate('Menu item')}}</th>
                                <th style="width: 20%">{{translate('Price')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                                use App\Http\Controllers\Admin\CategoryController;
                                $i = 1;
                            ?>
                            @foreach($categories as $category)
                                <tr style="color:white; background-color:#4f4f4f; font-weight:bold;">
                                    <td colspan="3">{{$category->name}}</td>
                                </tr>
                                <?php 
                                    $is_sub_cat = CategoryController::sub_categories($category->id); 
                                    //if($is_sub_cat == 0)
                                    //{
                                        $sub_products = CategoryController::main_products($category->id); 
                                        foreach($sub_products as $sub)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>{{$sub->name}}</td>
                                                <td>{{ Helpers::set_symbol($sub->price) }}</td>
                                            </tr>
                                            <?php 
                                            $i = $i + 1; 
                                        }
                                    //}
                                    /*else
                                    {
                                        $sub_products = CategoryController::sub_products($category->id); 
                                        foreach($sub_products as $sub)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>{{$sub->name}}</td>
                                                <td>{{ Helpers::set_symbol($sub->price) }}</td>
                                            </tr>
                                            <?php 
                                            $i = $i + 1; 
                                        }
                                    }*/
                                ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>