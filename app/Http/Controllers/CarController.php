<?php

    namespace App\Http\Controllers;

    use App\Events\SearchEvent;
    use App\Car;
    use Illuminate\Http\Request;

    class CarController extends Controller
    {
        //
        public function search(Request $request)
        {
            $query = $request->query('query');
            $cars = Car::where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->get();

               // dd($cars);
            //broadcast search results with Pusher channels
            //event(new SearchEvent($cars));

           // return response()->json("ok");
            return response()->json($cars);
        }

        //fetch all cars
        public function get(Request $request)
        {
            $cars = Car::all();
            return response()->json($cars);
        }
    }