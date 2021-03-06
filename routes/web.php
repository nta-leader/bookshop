<?php
Route::namespace('Auth')->group(function(){
    Route::get('/login',[
        'uses'=>'AuthController@login',
        'as'=>'auth.login'
    ]);
    Route::post('/login',[
        'uses'=>'AuthController@postLogin',
        'as'=>'auth.login'
    ]);
    Route::get('/password',[
        'uses'=>'AuthController@password',
        'as'=>'auth.password'
    ])->middleware('auth');
    Route::post('/password',[
        'uses'=>'AuthController@postPassword',
        'as'=>'auth.password'
    ])->middleware('auth');
    Route::get('/logout',[
        'uses'=>'AuthController@logout',
        'as'=>'auth.logout'
    ]);
});
Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function(){
    Route::prefix('home')->group(function(){
        Route::get('index',[
            'uses'=>'HomeController@index',
            'as'=>'admin.home.index'
        ]);
        Route::post('index',[
            'uses'=>'HomeController@edit',
            'as'=>'admin.home.index'
        ]);
    });
    Route::prefix('category')->group(function(){
        Route::get('index',[
            'uses'=>'CategoryController@index',
            'as'=>'admin.category.index'
        ]);
        Route::get('add',[
            'uses'=>'CategoryController@add',
            'as'=>'admin.category.add'
        ]);
        Route::post('add',[
            'uses'=>'CategoryController@postAdd',
            'as'=>'admin.category.add'
        ]);
        Route::get('edit/{id}',[
            'uses'=>'CategoryController@edit',
            'as'=>'admin.category.edit'
        ]);
        Route::post('edit/{id}',[
            'uses'=>'CategoryController@postEdit',
            'as'=>'admin.category.edit'
        ]);
        Route::get('del/{id}',[
            'uses'=>'CategoryController@del',
            'as'=>'admin.category.del'
        ]);
        Route::prefix('product')->group(function(){
            Route::get('index/{id_category}',[
                'uses'=>'CategoryController@indexProduct',
                'as'=>'admin.category.product.index'
            ]);
            Route::post('view/{id_category}',[
                'uses'=>'CategoryController@viewProduct',
                'as'=>'admin.category.product.view'
            ]);
            Route::get('add/{id_category}',[
                'uses'=>'CategoryController@addProduct',
                'as'=>'admin.category.product.add'
            ]);
            Route::post('add/{id_category}',[
                'uses'=>'CategoryController@postAddProduct',
                'as'=>'admin.category.product.add'
            ]);
            Route::get('del',[
                'uses'=>'CategoryController@delProduct',
                'as'=>'admin.category.product.del'
            ]);
        });
    });
    Route::prefix('product')->group(function(){
        Route::get('index',[
            'uses'=>'ProductController@index',
            'as'=>'admin.product.index'
        ]);
        Route::post('view',[
            'uses'=>'ProductController@view',
            'as'=>'admin.product.view'
        ]);
        Route::get('add',[
            'uses'=>'ProductController@add',
            'as'=>'admin.product.add'
        ]);
        Route::post('add',[
            'uses'=>'ProductController@postAdd',
            'as'=>'admin.product.add'
        ]);
        Route::get('edit/{id}',[
            'uses'=>'ProductController@edit',
            'as'=>'admin.product.edit'
        ]);
        Route::post('edit/{id}',[
            'uses'=>'ProductController@postEdit',
            'as'=>'admin.product.edit'
        ]);
        Route::get('active',[
            'uses'=>'ProductController@active',
            'as'=>'admin.product.active'
        ]);
        Route::get('del',[
            'uses'=>'ProductController@del',
            'as'=>'admin.product.del'
        ]);
    });
    Route::prefix('sale')->group(function(){
        Route::get('index',[
            'uses'=>'SaleController@index',
            'as'=>'admin.sale.index'
        ]);
        Route::post('view',[
            'uses'=>'SaleController@view',
            'as'=>'admin.sale.view'
        ]);
        Route::get('add',[
            'uses'=>'SaleController@add',
            'as'=>'admin.sale.add'
        ]);
        Route::post('add',[
            'uses'=>'SaleController@postAdd',
            'as'=>'admin.sale.add'
        ]);
        Route::get('edit/{id}',[
            'uses'=>'SaleController@edit',
            'as'=>'admin.sale.edit'
        ]);
        Route::post('edit/{id}',[
            'uses'=>'SaleController@postEdit',
            'as'=>'admin.sale.edit'
        ]);
        Route::get('active',[
            'uses'=>'SaleController@active',
            'as'=>'admin.sale.active'
        ]);
        Route::get('del/{id}',[
            'uses'=>'SaleController@del',
            'as'=>'admin.sale.del'
        ]);
        Route::prefix('product')->group(function(){
            Route::get('index/{id_sale}',[
                'uses'=>'SaleController@indexProduct',
                'as'=>'admin.sale.product.index'
            ]);
            Route::post('view/{id_sale}',[
                'uses'=>'SaleController@viewProduct',
                'as'=>'admin.sale.product.view'
            ]);
            Route::get('add/{id_sale}',[
                'uses'=>'SaleController@addSaleProduct',
                'as'=>'admin.sale.product.add'
            ]);
            Route::get('list',[
                'uses'=>'SaleController@list',
                'as'=>'admin.sale.product.list'
            ]);
            Route::post('add/{id_sale}',[
                'uses'=>'SaleController@addPostSaleProduct',
                'as'=>'admin.sale.product.add'
            ]);
            Route::get('del',[
                'uses'=>'SaleController@delSaleProduct',
                'as'=>'admin.sale.product.del'
            ]);
        });
    });
    Route::prefix('news')->group(function(){
        Route::get('index',[
            'uses'=>'NewsController@index',
            'as'=>'admin.news.index'
        ]);
        Route::post('view',[
            'uses'=>'NewsController@view',
            'as'=>'admin.news.view'
        ]);
        Route::get('add',[
            'uses'=>'NewsController@add',
            'as'=>'admin.news.add'
        ]);
        Route::post('add',[
            'uses'=>'NewsController@postAdd',
            'as'=>'admin.news.add'
        ]);
        Route::get('edit/{id}',[
            'uses'=>'NewsController@edit',
            'as'=>'admin.news.edit'
        ]);
        Route::post('edit/{id}',[
            'uses'=>'NewsController@postEdit',
            'as'=>'admin.news.edit'
        ]);
        Route::get('active',[
            'uses'=>'NewsController@active',
            'as'=>'admin.news.active'
        ]);
        Route::get('del',[
            'uses'=>'NewsController@del',
            'as'=>'admin.news.del'
        ]);
    });
    Route::prefix('orderform')->group(function(){
        Route::get('index',[
            'uses'=>'OrderformController@index',
            'as'=>'admin.orderform.index'
        ]);
        Route::post('index',[
            'uses'=>'OrderformController@api_index',
            'as'=>'admin.orderform.apiindex'
        ]);
        Route::get('confirmed',[
            'uses'=>'OrderformController@confirmed',
            'as'=>'admin.orderform.confirmed'
        ]);
        Route::post('confirmed',[
            'uses'=>'OrderformController@api_confirmed',
            'as'=>'admin.orderform.apiconfirmed'
        ]);
        Route::get('success',[
            'uses'=>'OrderformController@success',
            'as'=>'admin.orderform.success'
        ]);
        Route::post('success',[
            'uses'=>'OrderformController@api_success',
            'as'=>'admin.orderform.apisuccess'
        ]);
        Route::get('cancel',[
            'uses'=>'OrderformController@cancel',
            'as'=>'admin.orderform.cancel'
        ]);
        Route::post('cancel',[
            'uses'=>'OrderformController@api_cancel',
            'as'=>'admin.orderform.apicancel'
        ]);
        Route::get('detail',[
            'uses'=>'OrderformController@detail',
            'as'=>'admin.orderform.detail'
        ]);
        Route::get('update',[
            'uses'=>'OrderformController@update',
            'as'=>'admin.orderform.update'
        ]);
        Route::get('del',[
            'uses'=>'ProductController@del',
            'as'=>'admin.product.del'
        ]);
    });
});
Route::namespace('Book')->group(function(){
    Route::prefix('gio-hang')->group(function(){
        Route::get('',[
            'uses'=>'CartController@index',
            'as'=>'book.cart.index'
        ]);
        Route::get('kiem-tra-don-hang',[
            'uses'=>'CartController@check_waybill_code',
            'as'=>'book.cart.checkwaybillcode'
        ]);
        Route::get('them-san-pham-vao-gio-hang',[
            'uses'=>'CartController@addProduct',
            'as'=>'book.cart.addProduct'
        ]);
        Route::get('cap-nhat-so-luong',[
            'uses'=>'CartController@update',
            'as'=>'book.cart.update'
        ]);
        Route::get('dat-hang',[
            'uses'=>'CartController@checkout',
            'as'=>'book.cart.checkout'
        ]);
        Route::get('huy-don-hang',[
            'uses'=>'CartController@delCart',
            'as'=>'book.cart.delCart'
        ]);
    });
    Route::get('/',[
        'uses'=>'HomeController@index',
        'as'=>'book.home.index'
    ]);
    Route::get('/gioi-thieu.html',[
        'uses'=>'AboutController@index',
        'as'=>'book.about.index'
    ]);
    Route::get('/lien-he.html',[
        'uses'=>'ContactController@index',
        'as'=>'book.contact.index'
    ]);
    Route::get('/chinh-sach-mua-hang.html',[
        'uses'=>'AboutController@guarantee',
        'as'=>'book.about.guarantee'
    ]);
    Route::get('/huong-dan-mua-sach.html',[
        'uses'=>'AboutController@shopping_guide',
        'as'=>'book.about.shopping_guide'
    ]);
    Route::get('/tim-kiem.html',[
        'uses'=>'CategoryController@search',
        'as'=>'book.category.search'
    ]);
    Route::get('/{url}.html',[
        'uses'=>'CategoryController@index',
        'as'=>'book.category.index'
    ]);
    Route::get('/sach/{url}.html',[
        'uses'=>'ProductController@index',
        'as'=>'book.product.index'
    ]);
    Route::prefix('su-kien-sale')->group(function(){
        route::get('',[
            'uses'=>'SaleController@index',
            'as'=>'book.sale.index'
        ]);
        route::get('{url}.html',[
            'uses'=>'SaleController@detail',
            'as'=>'book.sale.detail'
        ]);
    });
    Route::prefix('tin-tuc')->group(function(){
        route::get('',[
            'uses'=>'NewsController@index',
            'as'=>'book.news.index'
        ]);
        route::get('{url}.html',[
            'uses'=>'NewsController@detail',
            'as'=>'book.news.detail'
        ]);
    });
});