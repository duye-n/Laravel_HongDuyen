

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

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
    $user = new User();
    $allUser = $user::all();
    dd($allUser);
    // return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/unicode', function () {
    return "Phương thức Post của Path";
});

Route::get('/unicode', function () {
    return "Phương thức Get của Path";
});

Route::put('/unicode', function () {
    return "Phương thức Put của Path";
});

Route::delete('/unicode', function () {
    return "Phương thức delete của Path";
});

Route::patch('/unicode', function () {
    return "Phương thức patch của Path";
});

Route::match(['get', 'post'], '/unicode', function () {
    return $_SERVER['REQUEST_METHOD'];
});

Route::get('/show-form', function () {
    return view('form');
});

Route::any('/unicode', function (Request $request) {
    return $request->method();
});

Route::redirect('/unicode', 'show-form', 404);

Route::view('show', 'form');

Route::prefix('admin')->group(function () {
    Route::get('unicode', function () {
        return 'Phương thức Get của path /unicode';
    });
    Route::get('show-form', function () {
        return view('form');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', function () {
            return 'Danh sách sản phẩm';

        });
        Route::get('add', function () {
            return 'Thêm sản phẩm'; });
        Route::get('edit', function () {
            return 'Sửa sản phẩm';
        });
        Route::get('delete', function () {
            return 'Xoá sản phẩm';
        });
    });
});
