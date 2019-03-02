<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Article;
use App\Models\Category;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\Settings;
use App\Models\Contact;

class HomeController extends Controller {

    public function listBloodTypes() {
        return jsonResponce(1, "جميع فصائل الدم", BloodType::all());
    }

    public function listGovernorates() {
        return jsonResponce(1, "جميع المحافظات", Governorate::all());
    }

    public function listGovernorateCities($governorate_id) {
        $data = City::where(['governorate_id' => $governorate_id])->get();
        return jsonResponce(1, "جميع مدن المحافظة", $data);
    }

    public function listCities() {
        return jsonResponce(1, "جميع المدن", City::all());
    }

    public function listArticles() {
        return jsonResponce(1, "جميع المقالات", Article::with('categories')->paginate(10));
    }

    public function listCategories() {
        return jsonResponce(1, "جميع الأقسام", Category::all());
    }

    public function listCategoryArticles($category_id) {
        $category = Category::where('id', $category_id)->first();
        if ($category) {
            return jsonResponce(1, "جميع مقالات القسم", $category->articles()->paginate(10));
        }
        return jsonResponce(0, "هذا القسم غير موجود", null, 404);
    }

    public function listClientFacouriteArticles() {
        $client = Client::where('id', auth()->user()->id)->first();
        if ($client) {
            return jsonResponce(1, "المقالات المفضلة", $client->articles()->paginate(10));
        }
        return jsonResponce(0, "هذا المستخدم غير موجود", null, 404);
    }

    //favourite and unfavourite an article
    public function favouriteArticle(Request $request) {
        $client = auth()->guard('api')->user();
        $validator = validator()->make($request->all(), [
            'article_id' => 'required|exists:articles,id'
        ]);
        if ($validator->fails()) {
            return jsonResponce(0, 'بيانات غير صحيحة', $validator->errors(), 404);
        }
        $article_id = $request->article_id;
        if (!Article::find($article_id)) {
            return jsonResponce(0, "هذا المقال غير موجود", null, 404);
        }

        $article = $client->articles()->where('article_id', $article_id)->first();
        $article ? $client->articles()->detach($article_id) :
                        $client->articles()->attach($article_id);

        return $article ? jsonResponce(1, "تم حذف المقال من المفضلة") :
                jsonResponce(1, "تم اضافة المقال الي المفضلة");
    }

    public function createDonationRequest(Request $request) {
        $validator = validator()->make($request->all(), [
            'patient_name' => 'required',
            'patient_age' => 'required|integer',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_number' => 'required|integer|min:1',
            'hospital_name' => 'required',
            'hospital_latitude' => ['required', 'regex:/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/'],
            'hospital_longitude' => ['required', 'regex:/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/'],
            'city_id' => 'required|exists:cities,id',
            'phone' => ['required', 'regex:/\d{3}-\d{3}-\d{4}|\d{10}/'],
        ]);
        if ($validator->fails()) {
            return jsonResponce(0, "بيانات غير صحيحة", $validator->errors(), 400);
        }
        $client = auth()->guard('api')->user();
        $donationRequest = $client->donationRequests()->create($request->all());
        $notification = $donationRequest->notification()->create([
            'title' => 'يوجد حالة تبرع جديدة',
            'content' => $donationRequest->bloodType->name . 'هناك احتياج لفصيلة دم  '
        ]);
        $clientsIds = $donationRequest->city->governorate->clients()->whereHas('bloodTypes', function ($query) use ($donationRequest) {
                    $query->where('blood_types.id', $donationRequest->bloodType->id);
                })->get()->pluck('id');
        $notification->clients()->attach($clientsIds);

        return jsonResponce(1, "تم اضافة الطلب بنجاح");
    }

    public function getNotifications() {
        $client = auth()->guard('api')->user();
        return jsonResponce(1, 'جميع الاشعارات', $client->notifications()->paginate(10));
    }

    public function setNotificationsSubscription(Request $request) {

        $validator = validator()->make($request->all(), [
            'governorates_ids' => 'array|required|exists:governorates,id',
            'blood_types_ids' => 'array|required|exists:blood_types,id'
        ]);
        if ($validator->fails()) {
            return jsonResponce(0, 'بيانات غير صحيحية', $validator->errors(), 400);
        }
        $client = auth()->guard('api')->user();
        $client->governorates()->sync($request->governorates_ids);
        $client->bloodTypes()->sync($request->blood_types_ids);
        return jsonResponce(1, "تم تغيير اعدادات الاشعارات بنجاح");
    }

    public function contact(Request $request) {
        $validator = validator()->make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return jsonResponce(0, "جميع الحقول مطلوبة", null, 400);
        }
        $client = auth()->guard('api')->user();
        $contact = new Contact($request->all());
        $contact->name = $client->name;
        $contact->email = $client->email;
        $contact->phone = $client->phone;
        $contact->save();
        return jsonResponce(1, 'تم الارسال');
    }

    public function settings() {
        $settings = Settings::find(1);
        return jsonResponce(1, 'معلومات التطبيق', $settings);
    }

}
