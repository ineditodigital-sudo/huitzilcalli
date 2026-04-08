<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Http\Requests\StoreCabinRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateCabinRequest;
use App\Models\Amenitie;
use App\Models\Gallery;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::whereNull('deleted_at')->get();
        //
        // return response()->json(['data' => 'test']);
        return view('backend.jacuzzi.schedules.index', compact('schedules'));
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
    public function store(StoreScheduleRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            if($request->id == 0){
                $schedule = Schedule::create([
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'service_id' => $request->service_id
                ]);
            }else{
                $schedule = Schedule::where('id', $request->id)->update([
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'service_id' => $request->service_id
                ]);
            }
            return response('Ok', 200);
        });
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        //
        if($id != 0){
            $schedule = Schedule::findOrFail($id);
            return response()->json(['data' => $schedule]);
        }else{
            $schedules = Schedule::whereNull('deleted_at')->get();
            return response()->json([
                'table_view' => view('backend.partials.scheduleTable', compact('schedules'))->render(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateScheduleRequest $request, Schedule $schedule)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $schedule = Schedule::where('id', $request->id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Upload images
     */
    public function upload(Request $request, $id){
        // return response()->json(['files' => json_encode($request->file('gallery')), 'id' => $id]);
		$images = $request->file('gallery');

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
