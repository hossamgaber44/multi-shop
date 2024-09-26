<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\products_color;
use App\Models\products_size;
use App\Models\products_color_size;
use App\Models\product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class productController extends Controller
{
        public function index(){
            $data['Product']=Product::select( 'id', 'category_id', 'small_desc', 'description', 'information', 'name', 'img', 'rating', 'price', )->orderBy('id','desc')->get();
                return view('admin.products.index')->with($data);
        }

        public function create(){
            $data['Category']=Category::select('id','name')->get();
        return view('admin.products.create')->with($data);
        }

        public function store(Request $r){
            $validator=FacadesValidator::make($r->all(),[
                'name'=> 'required|string|max:50',
                'price'=> 'required|integer',
                'rating'=> 'required|integer',
                'descount'=> 'required|integer',
                'small_desc'=> 'required|string|max:191',
                'description'=> 'required|string',
                'information'=> 'required|string',
                'img'=> 'required|image|mimes:jpg,jpeg,png',
                'category_id'=> 'required', // |exists:categories,id

                'color'=>'required|array|min:1',
                'size'=>'required|array|min:1',
                'images'=>'nullable|array',

            ],[
                'name.required'=> 'name faild is required',
                'price.required'=> 'price faild is required',
                'rating.required'=> 'rating faild is required',
                'descount.required'=> 'rating faild is required',
                'small_desc.required'=> 'small desc faild is required',
                'description.required'=> 'desc faild is required',
                'information.required'=> 'desc faild is required',
                'category_id.required'=> 'category_id faild is required',
                'img.required'=> 'image faild is required',
                'img.image'=> 'the image is none',

                'color.required'=>'at least one color',
                'size.required'=>'at least one color',
            ]);
            if($validator ->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $file_extension = $r->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/product';
            $r->img->move($path, $file_name);
            $data=[
                'name'=> $r->name,
                'price'=> $r->price,
                'rating'=> $r->rating,
                'descount'=>$r->descount,
                'small_desc'=> $r->small_desc,
                'description'=> $r->description,
                'information'=> $r->information,
                'category_id'=> $r->category_id,
                'img'=> $file_name,
            ];
            $productId = Product::create($data)->id;
            $color=array_values($r->color);
            $size=array_values($r->size);
            if(isset($color) && isset($size) && is_array($color) && is_array($size)){
                $colorId=[];
                $sizeId=[];

                foreach($color as $color){
                    $products_color_id = products_color::create([
                        'product_id' =>$productId,
                        'color' => $color
                    ])->id;
                    $colorId =[...$colorId,$products_color_id];
                }

                foreach($size as $size){
                    $products_size_id = products_size::create([
                        'product_id' =>$productId,
                        'size' => $size
                    ])->id;
                    $sizeId =[...$sizeId,$products_size_id];
                }

                foreach($colorId as $color){
                    foreach($sizeId as $size){
                        products_color_size::create([
                            'product_size_id' =>$size,
                            'product_color_id' => $color,
                        ]);
                    }
                }
            }
            // add many images
            if($r->images){
            $images=array_values($r->images);
            $count=1;
            foreach($images as $image){
                $file_extension = $image->getClientOriginalExtension();
                $file_name = $count. time() . '.' . $file_extension;
                $path = 'images/product';
                $image->move($path, $file_name);
                product_image::create([
                    'product_id' =>$productId,
                    'img' => $file_name,
                ]);
                $count+=1;
            }
            }
        return redirect(route('admin.product'));
        }

        public function edit($id){
            $data['product']=Product::findOrFail($id);
            $data['Category']=Category::select('id','name')->get();
            $data['productsColor']=products_color::select('id','product_id')->where('product_id',$id)->get();
            $data['productsSize']=products_size::select('id','product_id')->where('product_id',$id)->get();
            return view('admin.products.edit')->with($data);
        }

        public function update(Request $r){

            $validator=FacadesValidator::make($r->all(),[
                'name'=> 'required|string|max:50',
                'price'=> 'required|integer',
                'rating'=> 'required|integer',
                'descount'=> 'required|integer',
                'small_desc'=> 'required|string|max:191',
                'description'=> 'required|string',
                'information'=> 'required|string',
                'category_id'=> 'required',//|exists:categories,id
                'img'=> 'nullable|image|mimes:jpg,jpeg,png',
            ],[
                'name.required'=> 'name faild is required',
                'price.required'=> 'price faild is required',
                'rating.required'=> 'rating faild is required',
                'descount.required'=> 'rating faild is required',
                'small_desc.required'=> 'small desc faild is required',
                'description.required'=> 'desc faild is required',
                'information.required'=> 'desc faild is required',
                'category_id.required'=> 'category_id faild is required',
                'img.image'=> 'the image is none',
            ]);

            if($validator ->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $oldImage=Product::findOrFail($r->id)->img;
            $imagName=$oldImage;
            if($r->hasFile('img')){
                $image_path = public_path('images/product/' . $oldImage);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $file_extension = $r->img->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $path = 'images/product';
                $r->img->move($path, $file_name);
                $imagName = $file_name;
            }else{
                $imagName=$oldImage;
            }
            $data=[
                'name'=> $r->name,
                'price'=> $r->price,
                'rating'=> $r->rating,
                'descount'=>$r->descount,
                'small_desc'=> $r->small_desc,
                'description'=> $r->description,
                'information'=> $r->information,
                'category_id'=> $r->category_id,
                'img'=> $imagName,
                ];
            Product::findOrFail($r->id)->update($data);
            // update colore and size
            // -1- delete colore and size
            // delete from products_color *******************************************
                $productColor =products_color::select('id')->where('product_id',$r->id)->get();
                foreach($productColor as $productColor){
                    $productColor_id =$productColor->id;
                    products_color::findOrFail($productColor_id)->delete();
                }
            // delete from products_size *******************************************
                $productSize =products_size::select('id')->where('product_id',$r->id)->get();
                    foreach($productSize as $productSize){
                        $productSize_id =$productSize->id;
                        products_size::findOrFail($productSize_id)->delete();
                    }
            // delete from products_color_size *******************************************
                $products_color_size =products_color::select('id')->where('product_id',$r->id)->get();
                foreach($products_color_size as $products_color_size){
                    $products_color_size_id =$products_color_size->id;
                    products_color_size::findOrFail($products_color_size_id)->delete();
                }
             // -1- add new colore and size
                $color=array_values($r->color);
                $size=array_values($r->size);
                    if(isset($color) && isset($size) && is_array($color) && is_array($size)){
                        $colorId=[];
                        $sizeId=[];
                    foreach($color as $color){
                        $products_color_id = products_color::create([
                            'product_id' =>$r->id,
                            'color' => $color
                        ])->id;
                        $colorId =[...$colorId,$products_color_id];
                    }
                    foreach($size as $size){
                        $products_size_id = products_size::create([
                            'product_id' =>$r->id,
                            'size' => $size
                        ])->id;
                        $sizeId =[...$sizeId,$products_size_id];
                    }
                    foreach($colorId as $color){
                        foreach($sizeId as $size){
                            products_color_size::create([
                                'product_size_id' =>$size,
                                'product_color_id' => $color,
                            ]);
                        }
                    }
                    }

            return redirect(route('admin.product'));
        }

        public function delete($id){

            // delete from product_image table  ********************************************
            $productImages =product_image::select('id','img')->where('product_id',$id)->get();

            foreach($productImages as $image){
                $imageName = $image->img ;
                $images_path = public_path('images/product/' . $imageName);
                    if (file_exists($images_path)) {
                    unlink($images_path);
                    }
            }
            foreach($productImages as $image){
                $imageId = $image->id ;
                product_image::findOrFail($imageId)->delete();
            }

            // delete from products_color *******************************************
                $productColor =products_color::select('id')->where('product_id',$id)->get();
                foreach($productColor as $productColor){
                    $productColor_id =$productColor->id;
                    products_color::findOrFail($productColor_id)->delete();
                }
            // delete from products_size *******************************************
                $productSize =products_size::select('id')->where('product_id',$id)->get();
                    foreach($productSize as $productSize){
                        $productSize_id =$productSize->id;
                        products_size::findOrFail($productSize_id)->delete();
                    }
            // delete from products_color_size *******************************************
                $products_color_size =products_color::select('id')->where('product_id',$id)->get();
                foreach($products_color_size as $products_color_size){
                    $products_color_size_id =$products_color_size->id;
                    products_color_size::findOrFail($products_color_size_id)->delete();
                }
            // delete from product table ********************************************
            $old_name = Product::findOrFail($id)->img;
            $image_path = public_path('images/product/' . $old_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            Product::findOrFail($id)->delete();

            return back();
        }
}
