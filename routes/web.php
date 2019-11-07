<?php
Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::prefix('home')->group(function(){
        Route::get('index',[
            'uses'=>'HomeController@index',
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
});
Route::namespace('Book')->group(function(){
    Route::get('/',[
        'uses'=>'HomeController@index',
        'as'=>'book.home.index'
    ]);
    Route::get('/{url}.html',[
        'uses'=>'CategoryController@index',
        'as'=>'book.category.index'
    ]);
});