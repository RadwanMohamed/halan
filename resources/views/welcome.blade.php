<html>
<head>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="span10">
            <table class="table table-striped table-condensed">
                <thead>
                <tr>
                    <th>Request URL </th>
                    <th>Desc</th>
                    <th>Request Body</th>
                    <th>Method</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/users/store</td>
                    <td>used to register new user</td>
                    <td>
                        name                   : required,  string <br>
                        email                  : required, Email<br>
                        phone                  : required, numeric, unique.<br>
                        password               : required, min 9 characters.<br>
                        password_confirmation  : required, min 9 characters.<br>
                        address                : required, string.<br>
                        city                   : required, string.<br>
                    </td>

                    <td><span class="label label-success">Post</span>
                    </td>
                </tr>
<tr>
                    <td>http://tayeb.feckrah.com/public/api/user/show</td>
                    <td>show user</td>
                    <td>
                        api_token
                    </td>

                    <td><span class="label label-success">get</span>
                    </td>
                </tr>


                <tr>
                    <td>http://tayeb.feckrah.com/public/api/login</td>
                    <td>
                        used to login  user
                    </td>

                    <td>
                        phone     : required <br>
                        password  : required <br>
                    </td>

                    <td><span class="label label-success">Post</span>
                </tr>


                <tr>
                    <td>http://tayeb.feckrah.com/public/api/logout</td>
                    <td>Logout</td>
                    <td>
                        no param
                    </td>
                    <td><span class="label label-success">post</span></td>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/target</td>
                    <td>select branches according to the city </td>
                    <td>
                        city
                    </td>
                    <td><span class="label label-warning">GET</span></td>
                </tr>

                <tr>
                    <td>http://tayeb.feckrah.com/public/api/settings</td>
                    <td>
                        ال APi الخاصة بالاعدادات تحتوى على كل شئ يضيفه مدير الموقع من لوحة التحكم مثال (الايميل - الشروط والاحكام )
                    </td>
                    <td>no param</td>
                    <td><span class="label label-warning">GET</span></td>
                </tr>

                 <tr>
                    <td>http://tayeb.feckrah.com/public/api/password/email</td>
                    <td>
                        reset password
                        النظام هيبعت رسالة على ايميل المستخدم ده
                    </td>
                    <td>
                        phone
                    </td>
                    <td><span class="label label-success">Post</span></td>
                </tr>

                <tr>
                    <td>http://tayeb.feckrah.com/public/api/password/reset</td>
                    <td>
                        تغيير كلمة السر
                    </td>
                    <td>
                        oldpassword<br>
                        password : required<br>
                        password_confirmation : required
                    </td>
                    <td><span class="label label-success">PUT</span></td>
                </tr>

                 <tr>
                    <td>http://tayeb.feckrah.com/public/api/message</td>
                    <td>
                        ارسال رسالة
                    </td>
                    <td>
                        name        : required  <br>
                        phone        : required  <br>
                        email        : required  <br>
                        subject     : required<br>
                        Message     : required<br>
                    </td>
                    <td><span class="label label-success">Post</span></td>
                </tr>





























                <tr>
                    <td>http://tayeb.feckrah.com/public/api/users</td>
                    <td>get all users</td>
                    <td>
                        api_token : required
                    </td>

                    <td><span class="label label-warning">get</span>
                    </td>
                </tr>


                <tr>
                    <td>http://tayeb.feckrah.com/public/api/users/{user}</td>
                    <td>
                           show  specific user according to id {user}
                    </td>

                    <td>
                       api_token
                    </td>

                    <td><span class="label label-warning">get</span>
                </tr>

                <tr>
                    <td>http://tayeb.feckrah.com/public/api/user/update</td>
                    <td>
                            edit current user
                    </td>

                    <td>
                       name    : nullable,
                       email   : nullable,email,
                       address : nullable
                       city    : nullable
                       api_token
                    </td>

                    <td><span class="label label-warning">PUT</span>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/users/{user}</td>
                    <td>
                            delete specific user according to id {user}
                    </td>

                    <td>
                       api_token
                    </td>

                    <td><span class="label label-warning">Delete</span>
                </tr>



                 <tr>
                    <td>http://tayeb.feckrah.com/public/api/users/requests</td>
                    <td>
                           get all requests for specific user
                    </td>

                    <td>
                       api_token
                    </td>

                    <td><span class="label label-warning">get</span>
                </tr>



                 <tr>
                    <td>http://tayeb.feckrah.com/public/api/users/orders</td>
                    <td>
                           get all orders for specific user according {user}
                    </td>

                    <td>
                       api_token
                    </td>

                    <td><span class="label label-warning">get</span>
                </tr>


                <tr>
                    <td>http://tayeb.feckrah.com/public/api/categories</td>
                    <td>
                          get all categories in database
                    </td>

                    <td>
                       api_token
                        locale = ar || en
                    </td>

                    <td><span class="label label-warning">get</span>
                </tr>

                <tr>
                    <td>http://tayeb.feckrah.com/public/api/categories/{category}</td>
                    <td>
                          get specific category according to id {category}
                    </td>

                    <td>
                       api_token
                        locale = ar || en
                    </td>

                    <td><span class="label label-warning">get</span>
                </tr>

                <tr>
                    <td>http://tayeb.feckrah.com/public/api/categories/{category}/products</td>
                    <td>
                          get all products for specific category according to id {category}
                    </td>

                    <td>
                       api_token
                        locale = ar || en
                    </td>

                    <td><span class="label label-warning">get</span>
                </tr>




                <tr>
                    <td>http://tayeb.feckrah.com/public/api/cutter/size</td>
                    <td>
                        عرض جميع الاحجام المتاحة
                    </td>
                    <td>
                        api_token
                        locale = ar || en
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/cutter/kind</td>
                    <td>
                        عرض جميع الانواع المتاحة
                    </td>
                    <td>
                        api_token
                        locale = ar || en
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>
                 <tr>
                    <td>http://tayeb.feckrah.com/public/api/products</td>
                    <td>
                        عرض جميع  المنتجات
                    </td>
                    <td>
                        api_token
                        locale = ar || en
                    </td>
                    <td><span class="label label-wrning">get</span></td>
                </tr>


                <tr>
                    <td>http://tayeb.feckrah.com/public/api/product/{product}/branches</td>
                    <td>
                    get all braches that have this product
                    </td>
                    <td>
                        city
                    </td>
                    <td><span class="label label-warning">GET</span></td>
                </tr>


                <tr>
                    <td>http://tayeb.feckrah.com/public/api/orders/request</td>
                    <td>
                        make new Request
                    </td>
                    <td>
                        name        : nullable, string <br>
                        address     : required, string <br>
                        city        : required, string <br>
                        orders      : [{
                                            cuttersize_id   : numeric<br>
                                            cutterkind_id   : numeric<br>
                                            quantity        : numeric<br>
                                            product_id      : numeric<br>
                                        }]
                        code        : nullable<br>
                        api_token

                    </td>
                    <td><span class="label label-success">Post</span></td>
                </tr>

 <tr>
                    <td>http://tayeb.feckrah.com/public/api/requests</td>
                    <td>
                        get all requests
                    </td>
                    <td>
                        api_token
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/requests/{request}/orders</td>
                    <td>
                        get all orders that are belong to specific request
                    </td>
                    <td>
                        api_token
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/orders</td>
                    <td>
                        get all orders
                    </td>
                    <td>
                        api_token
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/branch</td>
                    <td>
                        get all branches
                    </td>
                    <td>
                        api_token
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>
                <tr>
                    <td>http://tayeb.feckrah.com/public/api/branch/{branch}/products</td>
                    <td>
                        get all products in specific branch and specific category
                    </td>
                    <td>
                        category_id :numeric
                        api_token
                    </td>
                    <td><span class="label label-warning">get</span></td>
                </tr>



                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>


