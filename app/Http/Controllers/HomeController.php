<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::where('activo', 1)->get();
        $user = User::where('id', 1)->first();
        $cabins = Cabin::whereNull('deleted_at')->where('active', 1)->where('service_id', 1)->orderBy('capacity')->get();
        $amenities = Cabin::whereNull('deleted_at')->where('active', 1)->where('service_id', 3)->orderBy('capacity')->get();
        SEOTools::setTitle('Huitzilcalli');
        SEOTools::setDescription('Descubre las encantadoras cabañas Los Huitzilcalli. Disfruta de la naturaleza y relájate en un refugio sereno. ¡Reserva ahora y vive una experiencia única!');
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com');
        SEOTools::setCanonical('https://huitzilcalli.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://huitzilcalli.com/resources/img/logo-lg.webp');
        
        $promotions = Promotion::where('active', 1)->orderBy('created_at', 'desc')->get();
        
        return view('frontend.services.cabins.index', compact('cabins', 'user', 'amenities', 'promotions'));
        //return view('frontend.index', compact('services', 'user'));
    }


    /**
     * Show the cabins index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cabins()
    {
        $cabins = Cabin::whereNull('deleted_at')->where('active', 1)->where('service_id', 1)->orderBy('capacity')->get();
        $user = User::where('id', 1)->first();

        SEOTools::setTitle('Huitzilcalli');
        SEOTools::setDescription('Descubre las encantadoras cabañas Los Huitzilcalli. Disfruta de la naturaleza y relájate en un refugio sereno. ¡Reserva ahora y vive una experiencia única!');
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com/cabañas');
        SEOTools::setCanonical('https://huitzilcalli.com/cabañas');
        SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://huitzilcalli.com/resources/img/logo-lg.webp');
        
        $promotions = Promotion::where('active', 1)->orderBy('created_at', 'desc')->get();
        
        return view('frontend.services.cabins.index', compact('cabins', 'user', 'promotions'));
    }

    public function amenities()
    {
        $cabins = Cabin::whereNull('deleted_at')->where('active', 1)->where('service_id', 3)->orderBy('capacity')->get();
        $user = User::where('id', 1)->first();

        SEOTools::setTitle('Huitzilcalli');
        SEOTools::setDescription('Descubre las encantadoras cabañas Los Huitzilcalli. Disfruta de la naturaleza y relájate en un refugio sereno. ¡Reserva ahora y vive una experiencia única!');
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com/cabañas');
        SEOTools::setCanonical('https://huitzilcalli.com/cabañas');
        SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://huitzilcalli.com/resources/img/logo-lg.webp');
        
        return view('frontend.services.amenities.index', compact('cabins', 'user'));
    }

    /**
     * Show cabin details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details(Request $request, $slug)
    {
        $cabin = Cabin::where('slug', $slug)->whereNull('deleted_at')->orderBy('created_at', 'desc')->first();
        if(empty($cabin)){
            return redirect('/');
        }
        $cabin->load('Amenities')->load('Gallery')->load('reservations')->load('disableDays');
        $user = User::where('id', 1)->first();
        
        SEOTools::setTitle($cabin->name.' - Huitzilcalli');
        SEOTools::setDescription($cabin->description);
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com/cabaña/'.$slug);
        SEOTools::setCanonical('https://huitzilcalli.com/cabaña/'.$slug);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'es_MX');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        // OpenGraph::addProperty('locale', 'pt-br');
        // SEOMeta::addMeta('article:published_time', $cabin->created_at->toW3CString(), 'property');
        // SEOMeta::addMeta('article:section', 'cabaña', 'property');
        if(count($cabin->gallery->toArray()) > 0){
            SEOTools::opengraph()->addImage('https://huitzilcalli.com/public'.$cabin->gallery[0]->route);
            SEOTools::jsonLd()->addImage('https://huitzilcalli.com/public'.$cabin->gallery[0]->route);
        }
        
        return view('frontend.services.cabins.detalles', compact('slug', 'cabin', 'user'));
    }


     public function detailsAmenitie(Request $request, $slug)
    {
        $cabin = Cabin::where('slug', $slug)->whereNull('deleted_at')->orderBy('created_at', 'desc')->first();
        if(empty($cabin)){
            return redirect('/');
        }
        $cabin->load('Amenities')->load('Gallery')->load('reservations')->load('disableDays');
        $user = User::where('id', 1)->first();
        
        SEOTools::setTitle($cabin->name.' - Huitzilcalli');
        SEOTools::setDescription($cabin->description);
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com/amenidades/'.$slug);
        SEOTools::setCanonical('https://huitzilcalli.com/amenidades/'.$slug);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'es_MX');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        // OpenGraph::addProperty('locale', 'pt-br');
        // SEOMeta::addMeta('article:published_time', $cabin->created_at->toW3CString(), 'property');
        // SEOMeta::addMeta('article:section', 'cabaña', 'property');
        if(count($cabin->gallery->toArray()) > 0){
            SEOTools::opengraph()->addImage('https://huitzilcalli.com/public'.$cabin->gallery[0]->route);
            SEOTools::jsonLd()->addImage('https://huitzilcalli.com/public'.$cabin->gallery[0]->route);
        }
        
        return view('frontend.services.amenities.detalles', compact('slug', 'cabin', 'user'));
    }

    /**
     * Show the cabins index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jacuzzis()
    {
        $cabins = Cabin::whereNull('deleted_at')->where('active', 1)->where('service_id', 2)->orderBy('capacity')->get();
        $user = User::where('id', 1)->first();

        SEOTools::setTitle('Huitzilcalli');
        SEOTools::setDescription('Descubre las encantadoras cabañas Los Huitzilcalli. Disfruta de la naturaleza y relájate en un refugio sereno. ¡Reserva ahora y vive una experiencia única!');
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com/jacuzzis');
        SEOTools::setCanonical('https://huitzilcalli.com/jacuzzis');
        SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://huitzilcalli.com/resources/img/logo-lg.webp');
        
        return view('frontend.services.jacuzzis.index', compact('cabins', 'user'));
    }

    /**
     * Show cabin details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detailsJacuzzi(Request $request, $slug)
    {
        $cabin = Cabin::where('slug', $slug)->orderBy('created_at', 'desc')->first();
        if(empty($cabin)){
            return redirect('/');
        }
        $cabin->load('Amenities')->load('Gallery')->load('reservations')->load('disableDays');
        $user = User::where('id', 1)->first();
        $schedules = Schedule::whereNull('deleted_at')->get();

        $scheduleFirst = Schedule::whereNull('deleted_at')->orderBy('start_time', 'asc')->orderBy('end_time', 'asc')->first();
        $scheduleLast = Schedule::whereNull('deleted_at')->orderBy('start_time', 'desc')->orderBy('end_time', 'desc')->first();
        $full_time_schedule = null;

        if(!empty($scheduleFirst) && !empty($scheduleLast)){
            $full_time_schedule = [
                'start' => $scheduleFirst->start_time,
                'end' => $scheduleLast->end_time
            ];
        }
        
        SEOTools::setTitle($cabin->name.' - Huitzilcalli');
        SEOTools::setDescription($cabin->description);
        SEOTools::opengraph()->setUrl('https://huitzilcalli.com/jacuzzi/'.$slug);
        SEOTools::setCanonical('https://huitzilcalli.com/jacuzzi/'.$slug);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'es_MX');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        // OpenGraph::addProperty('locale', 'pt-br');
        // SEOMeta::addMeta('article:published_time', $cabin->created_at->toW3CString(), 'property');
        // SEOMeta::addMeta('article:section', 'cabaña', 'property');
        if(count($cabin->gallery->toArray()) > 0){
            SEOTools::opengraph()->addImage('https://huitzilcalli.com/public'.$cabin->gallery[0]->route);
            SEOTools::jsonLd()->addImage('https://huitzilcalli.com/public'.$cabin->gallery[0]->route);
        }
        
        return view('frontend.services.jacuzzis.detalles', compact('slug', 'cabin', 'user', 'schedules', 'full_time_schedule'));
    }

    public function availableSchedules(Request $request){
        $schedules = Schedule::whereNull('deleted_at')->get();
        $reservations = Reservation::whereNull('deleted_at')->where('cabin_id', $request->cabin_id)->whereRaw('DATE(?) = DATE(start)',[$request->date])->get();

        foreach($schedules as $s => $schedule){
            $schedules[$s]->available = 1;
            foreach($reservations as $reservation){
                if($schedule->id == $reservation->schedule_id){
                    $schedules[$s]->available = 0;
                }
            }
        }

        return response()->json($schedules);
    }
}
