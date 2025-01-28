{{-- to use empty array if the listings array not passed instead error  --}}
@props(['listings' => []])
@if(count($listings) != 0)
@foreach($listings as $listing)
<div class="bg-gray-20 border border-gray-10 rounded p-2">
    <div class="flex">
        <img
        class="hidden w-48 mr-6 md:block"
         src="{{$listing->logo ? asset('storage/' . $listing->logo ) :
         asset('images/job.png')}}"
        alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="listings/{{ $listing->id }}" style="color: #0000FF; font-family: 'Arial', sans-serif;" >{{$listing->title}}</a>
            </h3>
            <h class="text-2xl">
                <p >{{ $listing['description'] }}</p>
            </h>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <ul class="flex">
                <?php  $array = explode(",",$listing->tags); ?>
                <?php  $array =  array_map('trim', $array); ?>
                @foreach($array as $tag)
                <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                    <a href="?tag={{$tag}}">{{ $tag }}</a>
                </li>
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</div>
@endforeach


@else
 {{ 'No liseners a vailable' }}
@endif
<div class="mt-6 ml-4 p-1" >
    {{$listings->links()}}
</div>
