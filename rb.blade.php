@foreach($packages as $package)
   {{-- time order end fetching --}}
   @php
   $order = DB::table('order')->where('user_id', Auth::user()->id)->get();
   @endphp
   <p>{{$order->end_date}}</p>
   <div>
    {{-- countdown ie 20d:10hrs:30min:12secs --}}
    <p>
        {{-- help me add time counting down from end date and now in js --}}
    </p>
   </div>
@endforech

