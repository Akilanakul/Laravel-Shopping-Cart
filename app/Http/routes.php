<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	// $product=App\models\Product::find(3);
    // return view('welcome');
    // return $product->type;
    // return $product->where('price','<',4)->get();


    // $user=App\models\User::find(1);
    // return $user->orders;

    // $Order=App\models\Order::find(2);
    // // return view('welcome');
    // return $Order->user;


// ************************Many to Many
     // $Order=App\models\Order::find(1);
    // // return view('welcome');
    // return $Order->products;

    $type=App\models\Type::find(2);
    // ['type'=>$type]==compact('type')
    return view('productList',compact('type'));

    // ['key'=>value]

});

// ->where('id', '[0-9]+');
// get(user/id) users referes to the url in the broser


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
            Route::get('types/{id}', function ($id) {
            sleep(1);
             $type=App\models\Type::find($id);
            // ['type'=>$type]==compact('type')
            return view('productList',compact('type'));
        })->middleware(['auth']);
      
        Route::get('users/create', function() {

            return view('registerForm');
        }
        );
          Route::get('users/{id}',function ($id) {

             $user=App\models\User::find($id);

             //return $user;
            
            return view('userdetails',['user'=>$user]);
        });

        Route::post('users', function(App\Http\Requests\createUserRequest $req) {

            // App\Http\Requests\Request\createUserRequest link to create user request page

            // Input==$post
            // $user=App\models\User::create($req=>all());
            $user=App\models\User::create(Request::all());
            $user->password=bcrypt($user->password);
            $user->save();
            return redirect('users/'.$user->id);

        // create will create a new object fir you new user
            //   $user=new App\models\User();
            // $user->username=Request::get("username");
            // return $user->username;
            // $user->email=Request::get("username");
            // $user->password=Request::get("username");
            // $user->firstname=Request::get("username");
            // $user->lastname=Request::get("username");
            // $user->save();
    
    });
        Route::get('users/{id}/edit', function($id) {
            $user=App\models\User::find($id);
            return view('edituserForm',['user'=>$user]);
        }
        )->middleware(['auth']);



        Route::put('users/{id}', function($id) {
            
            $user=App\models\User::find($id);
            if(!Request::ajax())
            {
               $user->fill(Request::all());
                $user->save();
                return redirect('users/'.$id); 
            }
            else{
                //get column to update
                    $column=Request::input('column');

                //get value to update
                    $value=Request::input('value');

                    $user->$column=$value;
                     $user->save();
                     return $value;
            }
        });

        //   Route::get('product/create', function() {
                
            
        //     })->middleware(['auth']);

        //    Route::post('products', function() {

            

    
        //     })->middleware(['auth']);

        //     Route::get('products/{id}', function ($id) {

        //     })->where('id', '[0-9]+');

        //      Route::get('products/{id}/edit', function($id) {
            
        //     })->middleware(['auth']);

        //       Route::put('products/{id}', function(App\Http\Requests\EditProductRequest $req ,$id) {
        //     ;
            

        // })->middleware(['auth']);

          Route::resource('products','ProductController');
         
         Route::get('login',"LoginController@showLoginForm") ;  

         Route::post('login',"LoginController@processLogin");
        Route::get('logout',"LoginController@logout") ;  

//############################################# shopping cart
        Route::get('cart-items',function(){
       
            return view('showcart');

         }) ; 
        Route::post('cart-items',function(){
            
            $product=App\models\Product::find(Request::input('product_id'));
               $items = array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => Request::input('quantity'));

            // Make the insert...
            Cart::insert($items);
            return redirect('cart-items');
         }) ; 
        Route::delete('cart-items/{identifier}',function($identifier){
            Cart::item($identifier)->remove();
            return redirect('cart-items');

         }) ; 
     
        Route::post('orders', function () {
        $order = new App\Models\Order();
        $order->user_id = Auth::user()->id;
        $order->status = "Pending";
        $order->save();

        foreach(Cart::contents() as $item){

            $order->products()->attach($item->id,
                                        ["quantity"=>$item->quantity]);
        }

        Cart::destroy();
        return redirect("types/1");
        
    })->middleware(['auth']);


    Route::get('orders', function () {

        $orders = Auth::user()->orders;
        $orders[0]->products;
        return view("showorder",['orders'=>$orders]);

    })->middleware(['auth']);


});
