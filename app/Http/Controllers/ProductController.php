<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);      
    }
    
    public function store(Request $request)
    {
        $disk = 'public_uploads';
        $destination_path = "public/uploads";
        $hostUrl = config('app.url');
        $path = '';
        
        if ($request->hasFile('picture')) {
            $logo = $request->picture;
            $image = Image::make($logo)->encode('jpg', 90);
            $filename = md5($logo . time()) . '.jpg';
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $path = $hostUrl . '/' . $public_destination_path . '/' . $filename;
            Storage::disk($disk)->put($filename, $image->stream());
        }
        $product = new Product([
            'name' => $request->input('name'),
            'picture' => $path
        ]);
        $product->save();
        return response()->json('Product created!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $disk = 'public_uploads';
        $destination_path = "public/uploads";
        $hostUrl = config('app.url');
        if ($request->name == "") {
            $name = $product->name;
        } else {
            $name = $request->name;
        }
        if ($request->hasFile('picture')) {
            $logo = $request->picture;
            $image = Image::make($logo)->encode('jpg', 90);
            $filename = md5($logo . time()) . '.jpg';
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $path = $hostUrl . '/' . $public_destination_path . '/' . $filename;
            Storage::disk($disk)->put($filename, $image->stream());
        } else {
            $path = $product->picture;
        }
        $product->update([
            'name' => $name,
            'picture' => $path
        ]);
        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted!');
    }
}