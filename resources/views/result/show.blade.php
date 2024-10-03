<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            詳細表示
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font relative">

        <div class="container px-2 py-5 mx-auto">
            <div class="grid grid-cols-2">
                    <div class="grid grid-cols-2">
                        <div class="grid-item text-xl text-right mx-4">登録者:</div>
                        <div class="grid-item text-xl text-left">{{$result->user->name}}</div>
            
                        <div class="grid-item mt-2 text-xl text-right mx-4">生産日:</div>
                        <div class="grid-item mt-2 text-xl text-left">{{$result->date}}</div>

                        <div class="grid-item mt-2 text-xl text-right mx-4">シフト:</div>
                        <div class="grid-item mt-2 text-xl text-left">{{$result->shift}}</div>

                        <div class="grid-item mt-2 text-xl text-right mx-4">生産台数(台):</div>
                        <div class="grid-item mt-2 text-xl text-left">{{number_format($result->production_rate)}}</div>

                        <div class="grid-item mt-2 text-xl text-right mx-4">生産時間(h):</div>
                        <div class="grid-item mt-2 text-xl text-left">{{$result->production_time}}</div>

                        <div class="grid-item mt-2 text-xl text-right mx-4">可動率(%):</div>
                        <div class="grid-item mt-2 text-xl text-left">{{$result->working_rate}}</div>

                        <div class="grid-item mt-2 text-xl text-right mx-4">JPH:</div>
                        <div class="grid-item mt-2 text-xl text-left">{{$result->JPH}}</div>
                    </div>  
                    <div class="grid grid-cols-2">
                        <div for="body" class="grid-item col-span-2 text-xl text-left">コメント:</div>
                        <div class="break-words col-span-2 grid-item ring-4 ring-blue-500/50 text-base outline-none text-gray-700 py-1 px-3">{{$result->body}}</div>
                        <div  class="mt-4 grid-item col-span-2 text-xl text-left">
                            <img class="h-40 mr-4 object-cover rounded-md" src="{{ asset('storage/'. $result->image)}}" alt="">
                        </div>
                        
                  </div>
                </div>
                  
                   <div class="text-right flex mt-10">
                    <a href="{{route('result.edit',$result)}}" class="flex-1">
                        <x-primary-button class="bg-blue-500 mt-1">
                            編集
                         </x-primary-button>
                    </a>
                  </div>
            
        
    </div>
          
</div>
<div>

</div>
</section>

</x-app-layout>