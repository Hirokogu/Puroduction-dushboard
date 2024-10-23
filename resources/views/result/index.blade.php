<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            生産結果一覧表示
        </h2>
    </x-slot>
  
    <section class="text-gray-600 body-font">
      
      <div class="container px-7 py-7 mx-auto">
  
        <div class="lg:w-5/6 w-full mx-auto overflow-auto">
          <form method="get" action="{{ route('result.index')}}">
            <div class="mb-4">
                <label for="">日付検索</label>
                <input type="date" name="from" placeholder="from_date" value="{{ $from }}" class="rounded-md">
                    <span class="mx-3">~</span>
                <input type="date" name="until" placeholder="until_date" value="{{ $until }}" class="rounded-md">
            
              <x-primary-button class="bg-black-600">
                検索
              </x-primary-button>
            </div>
        </form>

          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300 rounded-tl rounded-bl">登録者</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">生産日</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">シフト</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">生産台数</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">生産時間</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">JPH</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">可動率</th>
                <th class="px-2 py-3 title-font tracking-tight font-medium text-gray-900 text-sm bg-blue-300 rounded-tr rounded-br"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $result)
              <tr @class(['text-sm','bg-gray-200' => $loop->even])>
                <td class="px-2 py-3">{{$result->user->name}}</td>
                <td class="px-2 py-3">{{$result->date}}</td>
                <td class="px-2 py-3">{{$result->shift}}</td>
                <td class="px-2 py-3">{{number_format($result->production_rate)}}</td>
                <td class="px-2 py-3">{{$result->production_time}}</td>
                <td class="px-2 py-3">{{$result->JPH}}</td>
                <td class="px-2 py-3">{{$result->working_rate}}</td>
                <td class="px-2 py-3">   
                  <div class="flex justify-left items-center gap-1">
                    <div>
                      <a href="{{route('result.show',['result'=>$result])}}">
                        <x-primary-button class="bg-green-600">
                          詳細
                        </x-primary-button>
                      </a>
                    </div>
                    <div>
                      <a href="{{route('result.edit', $result)}}">
                        <x-primary-button class="bg-blue-500">
                          編集
                        </x-primary-button>
                      </a>
                    </div>
                    <div>
                      <form action="{{route('result.destroy', $result)}}" method="post" class="">
                      @csrf
                      @method('delete')
                         <x-primary-button class="bg-red-600">
                          削除
                         </x-primary-button>
                      </form>  
                   </div>
                </div>          
                </td>                
              </tr>
              @endforeach
             
            </tbody>
          </table>

          <div class="mb-4 mt-4">
            {{ $results->links()}}
          </div>
        </div>
      
      </div>
    </section>
 
   
    </x-app-layout>
   
  