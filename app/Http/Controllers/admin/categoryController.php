<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Darryldecode\Cart\Validators\Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $data['category']=Category::select('id','name', 'img',)->orderBy('id','desc')->get();
            return view('admin.categories.index')->with($data);
    }

    public function create(){
            return view('admin.categories.create');
    }

    public function store(Request $r){
        $validator=FacadesValidator::make($r->all(),[
            'name'=> 'required|string|max:50',
            'img'=> 'required|image|mimes:jpg,jpeg,png',
        ],[
            'name.required'=> 'the faild is required',
            'img.required'=> 'the faild is required',
            'img.image'=> 'the image is non',
        ]);

        if($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($r->all());
        }

        $file_extension = $r->img->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/category';
        $r->img->move($path, $file_name);
        $data=[
            'name'=> $r->name,
            'img'=> $file_name,
        ];
        Category::create($data);
        return redirect(route('admin.category'));
    }

    public function edit($id){
            $data['category']=Category::findOrFail($id);
            return view('admin.categories.edit')->with($data);
    }

    public function update(Request $r){

            $validator=FacadesValidator::make($r->all(),[
                'name'=> 'required|string|max:50',
                'img'=> 'nullable|image|mimes:jpg,jpeg,png',
                ],[
                'name.required'=> 'the faild is required',
                // 'img.image'=> 'the image is non',
                ]);

            if($validator ->fails()){
                return redirect()->back()->withErrors($validator)->withInputs($r->all());
            }
            $oldImage=Category::findOrFail($r->id)->img;
            $imagName=$oldImage;
            if($r->hasFile('img')){
                $image_path = public_path('images/category/' . $oldImage);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $file_extension = $r->img->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $path = 'images/category';
                $r->img->move($path, $file_name);
                $imagName = $file_name;
            }else{
                $imagName=$oldImage;
            }
            $data=[
                    'name'=> $r->name,
                    'img'=> $imagName,
                        ];
            Category::findOrFail($r->id)->update($data);

            return redirect(route('admin.category'));
    }

    public function delete($id){
            $old_name = Category::findOrFail($id)->img;
            $image_path = public_path('images/category/' . $old_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            Category::findOrFail($id)->delete();

            return back();
    }
}
