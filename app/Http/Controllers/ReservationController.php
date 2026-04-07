<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Cabin;
use App\Models\DisableDay;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($service_type = 'cabañas', $slug = null)
    {
        //
        $dateAux = date('Y-m-d');
        $newDateTime = Carbon::now()->addMonth(-2);
        // echo $newDateTime->format('Y-m-d');

        $service_id = 1;
        if($service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($service_type == 'amenidades'){
            $service_id = 3;
        }
        
        $cabins_cat = Cabin::where('active',1)->where('service_id', $service_id)->whereNull('deleted_at')->get();
        
        //Log::info('Catalogo de cabañas:', ['cat_cabañas' => $cabins_cat]);
        $cabin = [];
        if($slug){
            
            //Log::info('Slug Recibido:', ['slug' => $slug]);
            
            $cabin = Cabin::where('slug', $slug)->whereNull('deleted_at')->first();
            
            //Log::info('Cabaña encontrada:', ['cabaña' => $cabin]);
            //Log::info('ID de cabaña encontrada:', ['cabaña' => $cabin->id]);
        
        
            if(!empty($cabin)){
                $reservations = Reservation::where('cabin_id', $cabin->id)->where('end', '>', $newDateTime->format('Y-m-d'))->whereNull('deleted_at')->orderBy('start', 'asc')->orderBy('cabin_id', 'asc')->get();
                
                //Log::info('reservaciones encontradas:', ['reserv' => $reservations]);
                $days = DisableDay::where('cabin_id', $cabin->id)->get();
            }else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            $days = DisableDay::get();
            $reservations = Reservation::whereNull('deleted_at')->where('end', '>', $newDateTime->format('Y-m-d'))->whereRelation('cabin', 'service_id', $service_id)->orderBy('start', 'asc')->orderBy('cabin_id', 'asc')->get();
        }
        
        if($service_id == 1){
            return view('backend.reservation.index', compact('cabin', 'reservations', 'cabins_cat', 'days'));
        }else if($service_id == 2){
            $schedules = Schedule::whereNull('deleted_at')->orderBy('start_time', 'asc')->orderBy('end_time', 'asc')->get();
            return view('backend.jacuzzi.reservations.index', compact('cabin', 'reservations', 'cabins_cat', 'days', 'schedules'));
        }else if($service_id == 3){
            $schedules = Schedule::whereNull('deleted_at')->orderBy('start_time', 'asc')->orderBy('end_time', 'asc')->get();
            return view('backend.amenities.reservations.index', compact('cabin', 'reservations', 'cabins_cat', 'days', 'schedules'));
        }

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        if($request->id == 0){
            $reservation = Reservation::create([
                'cabin_id' => $request->cabin_id,
                'customer' => $request->customer,
                'phone_number' => $request->phone_number,
                'start' => $request->start,
                'end' => $request->end,
                'notes' => $request->notes
            ]);
        }else{
            $reservation = Reservation::where('id', $request->id)->update([
                'cabin_id' => $request->cabin_id,
                'customer' => $request->customer,
                'phone_number' => $request->phone_number,
                'start' => $request->start,
                'end' => $request->end,
                'notes' => $request->notes
            ]);
        }
        return response('Ok', 200);
    }

    public function storeJacuzzi(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'cabin_id' => 'required|numeric',
            'customer' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date' => 'required|date',
            'schedule_id' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);


        $full_day_discount = null;
        $start = null;
        $end = null;

        if($request->schedule_id == 0){
            $scheduleFirst = Schedule::whereNull('deleted_at')->orderBy('start_time', 'asc')->orderBy('end_time', 'asc')->first();
            $scheduleLast = Schedule::whereNull('deleted_at')->orderBy('start_time', 'desc')->orderBy('end_time', 'desc')->first();
            
            $start = $request->date.' '.$scheduleFirst->start_time;
            $end = $request->date.' '.$scheduleLast->end_time;

            $settings = User::where('id', 1)->first();
            $full_day_discount = $settings->reservation_discount;
        }else{
            $schedule = Schedule::where('id', $request->schedule_id)->first();
            
            $start = $request->date.' '.$schedule->start_time;
            $end = $request->date.' '.$schedule->end_time;
        }

        $reservasCompletasActuales = Reservation::whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->whereDate('start',$request->date)->where('schedule_id',0)->where('id','<>',$request->id)->get();
        $reservasParcialesActuales = Reservation::whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->whereDate('start',$request->date)->where('schedule_id',$request->schedule_id)->where('id','<>',$request->id)->get();

        if(count($reservasCompletasActuales) == 0 && count($reservasParcialesActuales) == 0){
            if($request->id == 0){
                    $reservation = Reservation::create([
                        'cabin_id' => $request->cabin_id,
                        'customer' => $request->customer,
                        'phone_number' => $request->phone_number,
                        'start' => $start,
                        'end' => $end,
                        'notes' => $request->notes,
                        'full_day_discount' => $full_day_discount,
                        'schedule_id' => $request->schedule_id
                    ]);
            }else{
    
                $reservation = Reservation::where('id', $request->id)->update([
                    'cabin_id' => $request->cabin_id,
                    'customer' => $request->customer,
                    'phone_number' => $request->phone_number,
                    'start' => $start,
                    'end' => $end,
                    'notes' => $request->notes,
                    'full_day_discount' => $full_day_discount,
                    'schedule_id' => $request->schedule_id
                ]);
            }

            return response('Ok', 200);
        }else{
            return response('Fail', 400);

        }

        
    }

    public function checkJacuzziDayAvailability(Request $request){
        $reservasCompletasActuales = Reservation::whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->where('cabin_id', $request->cabin_id)->whereDate('start',$request->date)->where('schedule_id',0)->where('id','<>',$request->id)->get();

        $json = [];
        if(count($reservasCompletasActuales) == 0){
            $reservasParcialesActuales = Reservation::select('schedule_id')->whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->where('cabin_id', $request->cabin_id)->whereDate('start',$request->date)->where('id','<>',$request->id)->get()->toArray();
            
            // var_dump($reservasParcialesActuales);
            
            $horariosLibres = Schedule::whereNull('deleted_at')->whereNotIn('id', $reservasParcialesActuales)->get();
            $horarios = Schedule::whereNull('deleted_at')->get();

            if(count($horarios) == count($horariosLibres)){
                $json[] = [
                    'id' => 0
                ];
            }

            foreach($horariosLibres as $horarioLibre){
                $json[] = [
                    'id' => $horarioLibre->id,
                    'startTime' => date('H:i', strtotime($horarioLibre->start_time)),
                    'endTime' => date('H:i', strtotime($horarioLibre->end_time))
                ];
            }

        }else{
        }
        
        return response()->json($json); 

        // return response('Ok', count($reservasCompletasActuales) == 0 && count($reservasParcialesActuales) == 0 ? 200 : 400);
    }


    public function storeAmenitie(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'cabin_id' => 'required|numeric',
            'customer' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date' => 'required|date',
            'schedule_id' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);


        $full_day_discount = null;
        $start = null;
        $end = null;

        if($request->schedule_id == 0){
            $scheduleFirst = Schedule::whereNull('deleted_at')->orderBy('start_time', 'asc')->orderBy('end_time', 'asc')->first();
            $scheduleLast = Schedule::whereNull('deleted_at')->orderBy('start_time', 'desc')->orderBy('end_time', 'desc')->first();
            
            $start = $request->date.' '.$scheduleFirst->start_time;
            $end = $request->date.' '.$scheduleLast->end_time;

            $settings = User::where('id', 1)->first();
            $full_day_discount = $settings->reservation_discount;
        }else{
            $schedule = Schedule::where('id', $request->schedule_id)->first();
            
            $start = $request->date.' '.$schedule->start_time;
            $end = $request->date.' '.$schedule->end_time;
        }

        $reservasCompletasActuales = Reservation::whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->whereDate('start',$request->date)->where('schedule_id',0)->where('id','<>',$request->id)->get();
        $reservasParcialesActuales = Reservation::whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->whereDate('start',$request->date)->where('schedule_id',$request->schedule_id)->where('id','<>',$request->id)->get();

        if(count($reservasCompletasActuales) == 0 && count($reservasParcialesActuales) == 0){
            if($request->id == 0){
                    $reservation = Reservation::create([
                        'cabin_id' => $request->cabin_id,
                        'customer' => $request->customer,
                        'phone_number' => $request->phone_number,
                        'start' => $start,
                        'end' => $end,
                        'notes' => $request->notes,
                        'full_day_discount' => $full_day_discount,
                        'schedule_id' => $request->schedule_id
                    ]);
            }else{
    
                $reservation = Reservation::where('id', $request->id)->update([
                    'cabin_id' => $request->cabin_id,
                    'customer' => $request->customer,
                    'phone_number' => $request->phone_number,
                    'start' => $start,
                    'end' => $end,
                    'notes' => $request->notes,
                    'full_day_discount' => $full_day_discount,
                    'schedule_id' => $request->schedule_id
                ]);
            }

            return response('Ok', 200);
        }else{
            return response('Fail', 400);

        }

        
    }

    public function checkAmenitieDayAvailability(Request $request){
        $reservasCompletasActuales = Reservation::whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->where('cabin_id', $request->cabin_id)->whereDate('start',$request->date)->where('schedule_id',0)->where('id','<>',$request->id)->get();

        $json = [];
        if(count($reservasCompletasActuales) == 0){
            $reservasParcialesActuales = Reservation::select('schedule_id')->whereNull('deleted_at')->whereRelation('cabin', 'service_id', 2)->where('cabin_id', $request->cabin_id)->whereDate('start',$request->date)->where('id','<>',$request->id)->get()->toArray();
            
            // var_dump($reservasParcialesActuales);
            
            $horariosLibres = Schedule::whereNull('deleted_at')->whereNotIn('id', $reservasParcialesActuales)->get();
            $horarios = Schedule::whereNull('deleted_at')->get();

            if(count($horarios) == count($horariosLibres)){
                $json[] = [
                    'id' => 0
                ];
            }

            foreach($horariosLibres as $horarioLibre){
                $json[] = [
                    'id' => $horarioLibre->id,
                    'startTime' => date('H:i', strtotime($horarioLibre->start_time)),
                    'endTime' => date('H:i', strtotime($horarioLibre->end_time))
                ];
            }

        }else{
        }
        
        return response()->json($json); 

        // return response('Ok', count($reservasCompletasActuales) == 0 && count($reservasParcialesActuales) == 0 ? 200 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id, $cabin_id = null)
    {
        //
        $dateAux = date('Y-m-d');
        $newDateTime = Carbon::now()->addMonth(-2);

        $service_id = 1;

        if($request->service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($request->service_type == 'amenidades'){
            $service_id = 3;
        }

        if($id != 0){
            $reservation = Reservation::findOrFail($id);
            return response()->json(['data' => $reservation]);
        }else{
            $aux = Reservation::whereNull('deleted_at')->where('end', '>', $newDateTime->format('Y-m-d'))->whereRelation('cabin', 'service_id', $service_id);
            if($cabin_id){
                $aux->where('cabin_id', $cabin_id);
            }
            
            $aux->orderBy('start', 'asc');
            $aux->orderBy('cabin_id', 'asc');
            
            $reservations = $aux->get();

            //LOGS PARA DEBUGGEAR
            logger('Este es un mensaje en el log que aparecerá en la consola');
           

            if($service_id == 1){
                return response()->json([
                    'table_view' => view('backend.partials.reservationTable', compact('reservations'))->render(),
                    'detail_view' => view('backend.partials.reservationCard', compact('reservations'))->render()
                ]);
                
            }else{
                return response()->json([
                    'table_view' => view('backend.partials.jacuzzis.reservationTable', compact('reservations'))->render(),
                    'detail_view' => view('backend.partials.jacuzzis.reservationCard', compact('reservations'))->render()
                ]);

            }

        }
    }
    
    /**
     * Get json events.
     */
    public function mobileJsonReservations(Request $request, $service_type = 'cabañas', $cabin_id = null)
    {
        //
        $newDateTime = Carbon::now()->addMonth(-2);

        $service_id = 1;
        if($service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($service_type == 'amenidades'){
            $service_id = 3;
        }
        
        $aux = Reservation::whereNull('deleted_at')->where('end', '>', $newDateTime->format('Y-m-d'));
        // $aux = Reservation;
        $aux->whereRelation('cabin', 'service_id', $service_id);
        if($cabin_id){
            $aux->where('cabin_id', $cabin_id);
        }
        
        if(!empty($request->start) && !empty($request->end)){
            $req_start = date($request->start);
            $req_end = date($request->end);
            
            $aux->where(function (Builder $query) use($req_start, $req_end) {
                $query->orWhereBetween('start', [$req_start, $req_end]);
                $query->orWhereBetween('end', [$req_start, $req_end]);
            });
            
            // $aux->orWhereBetween('start', [$req_start, $req_end]);
            // $aux->orWhereBetween('end', [$req_start, $req_end]);
            // $aux->whereRelation('cabin', 'service_id', $service_id);
        }
        //$aux->whereNull('deleted_at');
        $aux->orderBy('start', 'asc');
        $aux->orderBy('cabin_id', 'asc');
        
        $reservations = $aux->get();
        
        // var_dump($reservations);
        
        $json = [];
        $list = [];
        foreach($reservations as $reservation){
            if(is_null($reservation->deleted_at)){
                $end=date_create(substr($reservation->end, 0, 10));
                $start=date_create(substr($reservation->start, 0, 10));
                $diff=date_diff($start,$end);
                
                if($service_id == 1){
                    $auxStart = date_create(substr($reservation->start, 0, 10));
                    // $added = $auxStart;
                    for($i = 0; $i<$diff->d; $i++){
                                  $auxStart = date_create(substr($reservation->start, 0, 10));
                        $added = $auxStart;
                        // $added = date_add($auxStart,date_interval_create_from_date_string(strval($i) . " days"));
                        date_add($added,date_interval_create_from_date_string(strval($i) . " days"));
                        $auxAdded = date_format($added,"Y-m-d");
                        
                        $el = [
                            // 'start'=> $reservation->start,
                            // 'end'=> $reservation->end,
                            'start' => $auxAdded,
                            'end' => $auxAdded,
                            'title'=> $reservation->customer.' - '.$reservation->cabin->name,
                            'displayEventTime'=> false,
                            'color' => $reservation->cabin->color,
                            'textColor' => '#fff',
                            'cabin_id' => $reservation->cabin->id,
                            'dif' => $diff->d,
                            'auxStart' => $start
                        ];
                        
                        $item = [
                            'start' => $auxAdded,
                            'end' => $auxAdded,
                            'cabin_id' => $reservation->cabin->id,
                        ];
                        
                        if(!in_array($item, $list)){
                            array_push($list, $item);
                            array_push($json, $el);
                        }
                        
                        
                    }
                }else{
                    $auxEl = [
                        'start'=> $reservation->start,
                        'end'=> $reservation->end,
                        'title'=> $reservation->customer.' - '.$reservation->cabin->name,
                        'displayEventTime'=> false,
                        'color' => $reservation->cabin->color,
                        'textColor' => '#fff',
                        'cabin_id' => $reservation->cabin->id,
                    ];
                    
                    if(!in_array($auxEl, $json)){
                        array_push($json, $auxEl);
                    }
                }
            }
            
        }
    

        return response()->json($json);
        
        
        /*
        $aux = Reservation::whereNull('deleted_at');
        // $aux = Reservation::whereNotNull('created_at');
        if($cabin_id){
            $aux->where('cabin_id', $cabin_id);
        }
        
        if(!empty($request->start) && !empty($request->end)){
            $req_start = date($request->start);
            $req_end = date($request->end);
            
            $aux->orWhereBetween('start', [$req_start, $req_end]);
            $aux->orWhereBetween('end', [$req_start, $req_end]);
        }
        $aux->whereNull('deleted_at');
        $aux->orderBy('start', 'asc');
        $aux->orderBy('cabin_id', 'asc');
        
        $reservations = $aux->get();
        
        $json = [];
        foreach($reservations as $reservation){
            *//*
            array_push($json, [
                'start'=> $reservation->start,
                'end'=> $reservation->end,
                'title'=> $reservation->customer.' - '.$reservation->cabin->name,
                'displayEventTime'=> false,
                'color' => $reservation->cabin->color,
                'textColor' => '#fff',
                //'cabin_id' => $reservation->cabin->id,
            ]);
            *//*
            if(is_null($reservation->deleted_at)){
                $auxEl = [
                    'start'=> $reservation->start,
                    'end'=> $reservation->end,
                    'title'=> $reservation->customer.' - '.$reservation->cabin->name,
                    'displayEventTime'=> false,
                    'color' => $reservation->cabin->color,
                    'textColor' => '#fff',
                    'cabin_id' => $reservation->cabin->id,
                ];
                
                if(!in_array($auxEl, $json)){
                    array_push($json, $auxEl);
                }
            }
            
        }
    

        return response()->json($json);
        */
    }
    
    /**
     * Get json events.
     */
    public function jsonReservations(Request $request, $service_type = 'cabañas', $cabin_id = null)
    {
        //

        $service_id = 1;
        if($service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($service_type == 'amenidades'){
            $service_id = 3;
        }
        // echo $service_type;
        // echo $service_id;

        $newDateTime = Carbon::now()->addMonth(-2);
        $aux = Reservation::whereRelation('cabin', 'service_id', $service_id)->whereNull('deleted_at')->where('end', '>', $newDateTime->format('Y-m-d'));
        // $aux = Reservation::whereNotNull('created_at');
        if($cabin_id){
            $aux->where('cabin_id', $cabin_id);
        }
        
        if(!empty($request->start) && !empty($request->end)){
            $req_start = date($request->start);
            $req_end = date($request->end);
            
            $aux->where(function (Builder $query) use($req_start, $req_end) {
                $query->orWhereBetween('start', [$req_start, $req_end]);
                $query->orWhereBetween('end', [$req_start, $req_end]);
                
            });
            // $aux->orWhereBetween('start', [$req_start, $req_end]);
            // $aux->orWhereBetween('end', [$req_start, $req_end]);
            
        }
        
        $aux->whereNull('deleted_at');
        $aux->orderBy('start', 'asc');
        $aux->orderBy('cabin_id', 'asc');

        
        $reservations = $aux->get();
        // var_dump($reservations);
        
        $json = [];
        foreach($reservations as $reservation){
            if(is_null($reservation->deleted_at)){
                $auxEl = [
                    'start'=> $reservation->start,
                    'end'=> $reservation->end,
                    'title'=> $reservation->customer.' - '.$reservation->cabin->name,
                    'displayEventTime'=> $service_type == 'jacuzzis' ? true : false,
                    'color' => $reservation->cabin->color,
                    'textColor' => '#fff',
                    'cabin_id' => $reservation->cabin->id,
                    'allDay' => $reservation->full_day_discount != null,
                    'display' => $reservation->full_day_discount != null ? 'background' : 'auto',
                    'classNames' => ['jacuzzi-full-day']
                ];
                
                if(!in_array($auxEl, $json)){
                    array_push($json, $auxEl);
                }
            }
            
        }
    

        return response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $reservation = Reservation::where('id', $request->id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
    }
    
    public function loadDay(Request $request){
        $days = DisableDay::where('date', $request->date)->get();
        $cabins_cat = Cabin::where('active',1)->whereNull('deleted_at')->get();
        $cabin = null;
        if(!empty($request->cabin_id)){
            $cabin = Cabin::where('id', $request->cabin_id)->whereNull('deleted_at')->first();
        }
        
        return response()->json([
            'canvas_view' => view('backend.partials.disableDaysCanvas', compact('days', 'cabins_cat', 'cabin'))->render()
        ]);
    }
    
    public function disableDay(Request $request){
        if($request->status == 0){
            $reg = DisableDay::create([
                'cabin_id' => $request->cabin_id,
                'date' => $request->date
            ]);
        }else{
            DisableDay::where('cabin_id', $request->cabin_id)->where('date', $request->date)->delete();
        }
        return response()->json(['OK']);
    }
    
    /**
     * Get json events.
     */
    public function jsonDisableDays(Request $request, $cabin_id = null)
    {
        //
        
        if($cabin_id){
            $days = DisableDay::where('cabin_id', $cabin_id)->get();
        }else{
            $days = DisableDay::get();
        }
        
        $json = [];
        $d = [];
        foreach($days as $k => $day){
            if(!in_array($day->date, $d)){
                array_push($d, $day->date);
                array_push($json, [
                    'start'=> $day->date,
                    'end'=> $day->date,
                    'allDay' => true,
                    'title'=> '',
                    'displayEventTime'=> false,
                    'display' => 'background',
                    'color' => '#ff5b64',
                    'textColor' => '#9e262d',
                ]);
            }
            
        }
    

        return response()->json($json);
    }
    
    public function getEventsByDate(Request $request, $service_type = 'cabañas'){

        $service_id = 1;
        if($service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($service_type == 'amenidades'){
            $service_id = 3;
        }

        if(isset($request->start) && isset($request->end)){
            $start = $request->start;
            $end = $request->end;
            /*$reservations = Reservation::where(function($query) use ($start, $end){
                $query->whereBetween('start', [$start,$end])
                ->orWhereBetween('end', [$start,$end]);*/
            if($service_id == 1){
                $reservations = Reservation::whereRaw('DATE(?) BETWEEN DATE(start) AND DATE_SUB(DATE(end), INTERVAL 1 DAY) ', [$start])->whereRelation('cabin', 'service_id', $service_id)->whereNull('deleted_at')->get();
                foreach($reservations as $r => $reservation){
                    $reservations[$r]->cabinName = $reservation->cabin->name;
                }
                
            }else{
                $reservations = Reservation::whereRaw('DATE(?) = DATE(start)', [$start])->whereRelation('cabin', 'service_id', $service_id)->whereNull('deleted_at')->get();
                foreach($reservations as $r => $reservation){
                    $reservations[$r]->cabinName = $reservation->cabin->name;
                    $reservations[$r]->startTime = date('H:i', strtotime($reservation->start));
                    $reservations[$r]->endTime = date('H:i', strtotime($reservation->end));

                }
            }
            
            return response()->json(['data' => $reservations]);
        }
    }


    public function searchReservations(Request $request)
    {
        //VERIFICAR SI ES UNA RESERVA DE CABAÑA O JACUZZI
        $service_id = 1;
        if($request->service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($request->service_type == 'amenidades'){
            $service_id = 3;
        }

        $start = $request->input('start');
        Log::info('Fecha de inicio recibida:', ['start' => $start]);
        $startDate = '2024-10-30';
        $reservations = Reservation::whereDate('start', $start)
            ->whereNull('deleted_at')
            ->whereRelation('cabin', 'service_id', $service_id)
            ->orderBy('start', 'asc')
            ->orderBy('cabin_id', 'asc')
            ->get();
        // $reservations = Reservation::where('start', $start)->get();

        // return response()->json(['reservaciones' => $reservations]);
         if($service_id == 1){
            return response()->json([
                'table_view' => view('backend.partials.reservationTable', compact('reservations'))->render(),
                'detail_view' => view('backend.partials.reservationCard', compact('reservations'))->render()
            ]);
            
        }else{
            return response()->json([
                'table_view' => view('backend.partials.jacuzzis.reservationTable', compact('reservations'))->render(),
                'detail_view' => view('backend.partials.jacuzzis.reservationCard', compact('reservations'))->render()
            ]);

        }
    }

    
    public function searchReservationsByName(Request $request)
    {
        $name = $request->input('name');
        Log::info('Fecha de inicio recibida:', ['name' => $name]);
        $newDateTime = Carbon::now()->addMonth(-2);
        $reservations = [];

        //VERIFICAR SI ES UNA RESERVA DE CABAÑA O JACUZZI
        $service_id = 1;
        if($request->service_type == 'jacuzzis'){
            $service_id = 2;
        }else if($request->service_type == 'amenidades'){
            $service_id = 3;
        }

        if(strlen($name) > 3){
            //FALTA FILTRAR LOS QUE NO ESTEN ELIMINADOS, QUE SEAN CABAÑAS Y QUE EL NOMBRE COINCIDA CON LA BUSQUEDA
            $reservations = Reservation::where('customer', 'like', '%' . $name . '%')
            ->whereNull('deleted_at')
            ->whereRelation('cabin', 'service_id', $service_id)
            ->orderBy('start', 'asc')
            ->orderBy('cabin_id', 'asc')
            ->get();
            
        }else if(strlen($name) >1 && strlen($name) <3){
            //NO BUSCAR NI HACER NADA
        }else if(strlen($name) == 0){
            
            $aux = Reservation::whereNull('deleted_at')->where('end', '>', $newDateTime->format('Y-m-d'))->whereRelation('cabin', 'service_id', $service_id);
            $aux->orderBy('start', 'asc');
            $aux->orderBy('cabin_id', 'asc');
            
            $reservations = $aux->get();
        }

        // return response()->json(['reservaciones' => $reservations]);
        if($service_id == 1){
            return response()->json([
                'table_view' => view('backend.partials.reservationTable', compact('reservations'))->render(),
                'detail_view' => view('backend.partials.reservationCard', compact('reservations'))->render()
            ]);
            
        }else{
            return response()->json([
                'table_view' => view('backend.partials.jacuzzis.reservationTable', compact('reservations'))->render(),
                'detail_view' => view('backend.partials.jacuzzis.reservationCard', compact('reservations'))->render()
            ]);

        }
    }
}
