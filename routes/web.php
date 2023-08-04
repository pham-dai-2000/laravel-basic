<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('daipham', function(){
    return "Hello World";
});

Route::get('daipham/{name}', function($ten){
    return "Ten cua toi la: {$ten}";
});

Route::get('daipham1/{name}', function($ten){
    return "Ten cua toi la: {$ten}";
})->where(['name'=>'[a-zA-Z]+']);

//Dinh danh

Route::get('Route1', ['as'=>'MyRoute', function(){
    echo "Xin chao";
}]);
Route::get('Route2', function(){
    echo "Xin chao 2";
})->name('MyRoute2');

Route::get('GoiTen', function (){
    return redirect()->route('MyRoute2');
});
Route::group(['prefix'=>'MyGroup'], function (){
    Route::get('User1', function (){
        return 'user 1';
    });
    Route::get('User2', function (){
        return 'user 2';
    });
    Route::get('User3', function (){
        return 'user 3';
    });
});
//Goi controller
Route::get('controller', [MyController::class, 'XinChao']);
Route::get('thamso/{ten}', [MyController::class, 'GetName']);
//url
Route::get('geturl', [MyController::class, 'GetURL']);
//Gui nhan du lieu voi request
Route::get('getForm', function (){
    return view('postForm');
});
Route::post('postForm',[MyController::class, 'PostForm'])->name('postForm');
//cookie
Route::get('setCookie', [MyController::class, 'setCookie']);
Route::get('getCookie', [MyController::class, 'getCookie']);
//file
Route::get('uploadFile',function (){
    return view('postFile');
});
Route::post('postFile', [MyController::class, 'postFile'])->name('postFile');
//json
Route::get('getJson', [MyController::class, 'getJson']);
//view
Route::get('myView', [MyController::class, 'myView']);
Route::get('time/{t}', [MyController::class, 'time']);
View::share('KhoaHoc', 'Laravel');
//blade template
Route::get('blade', function (){
    return view('pages.laravel');
});
Route::get('bladeTemplate/{str}',[MyController::class, 'blade']);
//database
Route::get('database', function (){
    Schema::create('loaisanpham', function ($table){
        $table->increments('id');
        $table->string('ten', 200)->nullable();
        $table->string('nsx')->default('Nha san xuat');
    });
    echo "da thuc hien lenh tao bang";
});
Route::get('lienketbang', function (){
    Schema::create('test', function ($table){
        $table->increments('id');
        $table->string('ten');
        $table->float('gia');
        $table->integer('soluong')->default(0);
        $table->integer('id_loaisanpham')->unsigned();
        $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
    });
     echo "da thuc hien lenh lk bang";
});
Route::get('suabang', function (){
    Schema::table('loaisanpham', function ($table){
        $table->dropColumn('nsx');
    });
});
Route::get('themcot', function (){
    Schema::table('loaisanpham', function ($table){
        $table->string('email');
    });
    echo "them cot email thanh cong";
});
Route::get('doiten', function (){
    Schema::rename('theloai', 'nguoidung');
    echo "doi ten bang thanh cong";
});
Route::get('xoabang', function (){
    Schema::dropIfExists('nguoidung' );
    echo "xoa bang thanh cong";
});
Route::get('taobang', function (){
    Schema::create('nguoidung', function ($table){
        $table->increments('id');
        $table->string('ten', 200)->nullable();
        $table->string('nsx')->default('Nha san xuat');
    });
     echo "da thuc hien lenh tao bang nguoidung";
});
//queryBuilder
Route::get('qb/get', function (){
    $data =DB::table('user')->get();
    //var_dump($data)
    foreach ($data as $row){
        foreach ($row as $key=>$value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});
//select * from user where id = 2
Route::get('qb/where', function (){
    $data =DB::table('user')->where('id', '=', 126)->get();
    //var_dump($data)
    foreach ($data as $row){
        foreach ($row as $key=>$value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});
//select id, name, email...
Route::get('qb/select', function (){
    $data =DB::table('user')->select(['id', 'password'])->where('id', 126)->get();
    //var_dump($data)
    foreach ($data as $row){
        foreach ($row as $key=>$value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});
//select ten as name from...
Route::get('qb/raw', function (){
    $data =DB::table('user')->select(DB::raw('id, ten as name, email'))->get();
    //var_dump($data)
    foreach ($data as $row){
        foreach ($row as $key=>$value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/orderby', function (){
    $data = DB::table('user')->select(DB::raw('id, ten as name, email'))->orderby('id', 'desc')->skip(1)->take(3)->get();
//    echo 'Số phần tử là: '.$data->count()."<br>";
    foreach ($data as $row){
        foreach ($row as $key=>$value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/update', function (){
   DB::table('user')->where('id', 126)->update(['ten'=>'phamdai','email'=>'daiabsc@gmail.com']);
   echo 'Đã update';
});

Route::get('qb/delete', function (){
   DB::table('user')->truncate();
   echo 'Đã xóa';
});

//model
Route::get('model/save', function (){
   $user = new App\Models\User();
   $user->name = 'Dai Pham';
   $user->email = 'dai@gmail.com';
   $user->password = 'matkhau';

   $user->save();
   echo 'đã thực hiện save';
});
Route::get('model/query', function (){
   $user = App\Models\User::find(2);
   echo $user->name;
});
Route::get('model/sanpham/save/{ten}', function ($ten){
   $sanpham = new App\Models\sanpham();
   $sanpham->ten = $ten;
   $sanpham->soluong = 100;
   $sanpham->id_loaisanpham = 1;
   $sanpham->save();
   echo 'thuc hien save';
});

Route::get('model/sanpham/all', function (){
   $sanpham = App\Models\sanpham::all()->toArray();
   var_dump($sanpham);
});
Route::get('model/sanpham/ten', function (){
   $sanpham = App\Models\sanpham::where('ten', 'ipad')->get()->toArray();
   echo $sanpham[0]['ten'];
});
Route::get('model/sanpham/delete', function (){
    App\Models\sanpham::destroy(2);
    echo 'da xoa';
});
Route::get('themcot', function (){
    Schema::table('sanpham', function ($table){
        $table->integer('id_loaisanpham')->unsigned();
    });
});

Route::get('lienket', function (){
    $data = App\Models\Product::create()->loaisanpham->toArray();
    var_dump($data);
});

Route::get('diem', function (){
    echo 'Ban da co diem';
})->middleware('Mymiddle')->name('diem');

Route::get('loi', function (){
    echo 'Ban chua du diem';
})->name('loi');

Route::get('nhapdiem', function (){
    return view('nhapdiem');
})->name('nhapdiem');

//Auth
Route::get('dangnhap', function (){
   return view('dangnhap');
});
Route::get('thu', function (){
   return view('thanhcong');
});
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout']);
