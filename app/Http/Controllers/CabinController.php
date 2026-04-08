<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Http\Requests\StoreCabinRequest;
use App\Http\Requests\UpdateCabinRequest;
use App\Models\Amenitie;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabins = Cabin::where('service_id',1)->whereNull('deleted_at')->get();
        //
        // return response()->json(['data' => 'test']);
        return view('backend.cabin.index', compact('cabins'));
    }

    public function list(){
        // $cabins = Cabin::whereNull('deleted_at')->get();
        return response()->json(['data' => 'test']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(StoreCabinRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            if($request->id == 0){
                $cabaña = Cabin::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'capacity' => $request->capacity, 
                    'precio1' => $request->precio1,
                    'precio2' => $request->precio2,
                    'entrada' => $request->entrada,
                    'salida' => $request->salida,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'slug' => Str::slug($request->name, '-'),
                    'color' => $request->color,
                    'service_id' => 1
                ]);
        
                if(!empty($cabaña)){
                    if(!empty($request->amenities)){
                        foreach(json_decode($request->amenities) as $amenitie){
                            $amenitie = Amenitie::create([
                                'cabin_id' => $cabaña->id,
                                'title' => $amenitie->title,
                                'specifications' => $amenitie->specifications,
                                'icon' => $amenitie->icon
                            ]);
                        }
                    }   
                }
            }else{
                $cabaña = Cabin::where('id', $request->id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'capacity' => $request->capacity,
                    'precio1' => $request->precio1,
                    'precio2' => $request->precio2,
                    'entrada' => $request->entrada,
                    'salida' => $request->salida,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'slug' => Str::slug($request->name, '-'),
                    'color' => $request->color,
                    'service_id' => 1
                ]);

                Amenitie::where('cabin_id', $request->id)->delete();

                foreach(json_decode($request->amenities) as $amenitie){
                    $amenitie = Amenitie::create([
                        'cabin_id' => $request->id,
                        'title' => $amenitie->title,
                        'specifications' => $amenitie->specifications,
                        'icon' => $amenitie->icon
                    ]);
                }
            }
            return response('Ok', 200);
        });
        
    }*/

    public function store(StoreCabinRequest $request)
    {
        $cabinId = null;
    
        DB::transaction(function() use ($request, &$cabinId) {
            if($request->id == 0) {
                $cabaña = Cabin::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'capacity' => $request->capacity, 
                    'precio1' => $request->precio1,
                    'precio2' => $request->precio2,
                    'entrada' => $request->entrada,
                    'salida' => $request->salida,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'slug' => Str::slug($request->name, '-'),
                    'color' => $request->color,
                    'service_id' => 1
                ]);
    
                $cabinId = $cabaña->id;
    
                if(!empty($request->amenities)){
                    foreach(json_decode($request->amenities) as $amenitie){
                        Amenitie::create([
                            'cabin_id' => $cabinId,
                            'title' => $amenitie->title,
                            'specifications' => $amenitie->specifications,
                            'icon' => $amenitie->icon
                        ]);
                    }
                }   
            } else {
                Cabin::where('id', $request->id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'capacity' => $request->capacity,
                    'precio1' => $request->precio1,
                    'precio2' => $request->precio2,
                    'entrada' => $request->entrada,
                    'salida' => $request->salida,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'slug' => Str::slug($request->name, '-'),
                    'color' => $request->color,
                    'service_id' => 1
                ]);
    
                $cabinId = $request->id;
    
                Amenitie::where('cabin_id', $cabinId)->delete();
    
                foreach(json_decode($request->amenities) as $amenitie){
                    Amenitie::create([
                        'cabin_id' => $cabinId,
                        'title' => $amenitie->title,
                        'specifications' => $amenitie->specifications,
                        'icon' => $amenitie->icon
                    ]);
                }
            }
        });
    
        return response()->json(['cabin_id' => $cabinId]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        //
        if($id != 0){
            $cabin = Cabin::findOrFail($id);
            $cabin->load('amenities');
            $cabin->load('gallery');
            return response()->json(['data' => $cabin]);
        }else{
            $cabins = Cabin::where('service_id',1)->whereNull('deleted_at')->get();
            return response()->json([
                'table_view' => view('backend.partials.cabinTable', compact('cabins'))->render(),
                'detail_view' => view('backend.partials.cabinCard', compact('cabins'))->render()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabin $cabin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCabinRequest $request, Cabin $cabin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $cabaña = Cabin::where('id', $request->id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Upload images
     */
    public function upload(Request $request, $id){
        // return response()->json(['files' => json_encode($request->file('gallery')), 'id' => $id]);
		$images = $request->file('gallery');
        
        Log::info('ID Recibido:', ['id' => $id]);
        $dbImages = Gallery::where('cabin_id', $id)->get();
        $preloaded = $request->preloaded;

        foreach($dbImages as $dbImage){
            if(is_null($preloaded) || count($preloaded) == 0){
                Gallery::where('id', $dbImage->id)->delete();
                if (file_exists(public_path($dbImage->route))){
                    $filedeleted = unlink(public_path($dbImage->route));
                }
            }else{
                if(!in_array($dbImage->id, $preloaded)){
                    Gallery::where('id', $dbImage->id)->delete();
                    if (file_exists(public_path($dbImage->route))){
                        $filedeleted = unlink(public_path($dbImage->route));
                    }
                }
            }
            
        }

        if(!is_null($images)){
            foreach($images as $key => $image){
                // return response()->json(['success'=>json_encode($image)]);
                $fileInfo = $image->getClientOriginalName();
                $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'-'.time().'.'.$extension;
                $size = $image->getSize();
                $route = '/uploads/cabañas/'.$file_name;
                $dimensions = getimagesize($image);
                
                // return response()->json([
                //     'fileinfo' => $fileInfo,
                //     'filename' => $filename,
                //     'extension' => $extension,
                //     'file_name' => $file_name,
                //     'route' => $route,
                //     'size' => $size_aux,
                //     'dimensions' => json_encode($dimensions),
                // ]);
                
                
                
                $image->move(public_path('uploads/cabañas'),$file_name);
                
                // if(!$size_aux){
                //     // $info = new SplFileInfo(public_path('uploads/cabañas'),$file_name);
                //     // $size = $info->getSize();
                //     // $dimensions = getimagesize($info);
                // }else{
                //     $size = $size_aux;
                //     // $dimensions = getimagesize($image);
                // }
                
                // $info = new SplFileInfo(public_path('uploads/cabañas'),$file_name);
                // $size = $info->getSize();
                // $dimensions = getimagesize($info);
                
                // return response()->json([
                //     'fileinfo' => $fileInfo,
                //     'filename' => $filename,
                //     'extension' => $extension,
                //     'file_name' => $file_name,
                //     'route' => $route,
                //     'size' => $size,
                //     'size_aux' => $size_aux
                // ]);
                
                
                Gallery::create([
                    'cabin_id' => $id,
                    'route' => $route,
                    'size' => $size,
                    'width' => $dimensions[0],
                    'height' => $dimensions[1],
                ]);
            }
        }
        

        // $imageUpload = new Gallery;
        // $imageUpload->original_filename = $fileInfo;
        // $imageUpload->filename = $file_name;
        // $imageUpload->save();
        return response()->json(['success'=>$images]);
	}

    /**
     * Update status of cabin
     */
    public function changeStatus(Request $request){
        Cabin::where('id', $request->id)->update([
            'active' => intval($request->status)
        ]);
    }
}
