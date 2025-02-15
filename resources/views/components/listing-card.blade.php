<a href="../" class="inline-block text-black ml-4 mb-4">
<i class="fa-solid fa-arrow-left"></i> Back</a>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img
                        class="hidden w-48 mr-6 md:block"
                         src="{{$listing->logo ? asset('storage/' . $listing->logo ) :
                         asset('images/default.png')}}"
                        alt=""
                        />

                        <h3 class="text-2xl mb-2" style="color: #0000FF; font-family: 'Arial', sans-serif;">{{$listing->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                        <ul class="flex">
                            <?php $array=explode(",",$listing->tags); ?>
                            <?php $array=array_map('trim', $array); ?>
                            @foreach($array as $tag)
                            <li
                                class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                            >
                                <a href="/?tag={{$tag}}">{{$tag}}</a>
                            </li>
                          @endforeach
                        </ul>
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{$listing->description}}
                                </p>
                                <a
                                    href="mailto:{{$listing->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >
                                <a
                                    href="{{$listing->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                                    <i class="fa-solid fa-globe"></i> Visit Website</a>
                            </div>
                        </div>
                    </div>
               </div>
           </div>