<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録設備名一覧表示
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-5 mx-auto flex flex-wrap items-center">
        <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
             
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300 rounded-tl rounded-bl">工程名</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">工程順</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300">設備名</th>
                <th class="px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-blue-300 rounded-tr rounded-br"></th>
          
              </tr>
            </thead>
            <tbody>
              @foreach($equipments as $equipment)
              <tr @class(['text-sm','bg-gray-200' => $loop->even])>
              
                <td class="px-2 py-1">{{$equipment->process}}</td>
                <td class="px-2 py-1">{{$equipment->process_No}}</td>
                <td class="px-2 py-1">{{$equipment->equipment_name}}</td>   
                <td class="px-2 py-1">
                  <div class="flex justify-left items-center gap-3">
                    <div>
                      <a class="text-blue-600" href="{{Route('equipment.edit',$equipment)}}">
                        <x-primary-button class="bg-green-500">
                          編集
                        </x-primary-button>
                      </a>
                    </div>
                    <div>
                      <form action="{{route('equipment.destroy',$equipment)}}" method="post" class="flex-1">
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
            {{ $equipments->links()}}
          </div>
        </div>
      
      <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-1 flex flex-col md:ml-auto w-full mt-5 md:mt-0">     
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 space-y-4 md:space-y-6 sm:p-2">
                <h1 class="title-font tracking-wider font-medium text-gray-900 text-sm">設備の追加</h1>
                <form method="post" class="space-y-4 md:space-y-6" action="{{ route('equipment.store')}}">
                @csrf

                    <div class="mt-2">
                        <label for="process" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">工程名</label>
                        <select id="process" name="process" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">工程名を選んでください</option>
                            <option value="前工程">前工程</option>
                            <option value="後工程">後工程</option>
                        </select>
                    </div>

                    <div class="mt-2">
                        <label for="process_No" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">工程順</label>
                        <input type="text"  name="process_No" id="process_No"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                                   
                    <div class="mt-2">
                        <label for="equipment_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">設備名</label>
                        <input type="text"  name="equipment_name" id="equipment_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <x-primary-button class="mt-2">
                        追加
                    </x-primary-button>                     
                </form>
            </div>
        </div>
    </div>
  </div>
 
</div>

    </section>
    
    </x-app-layout>
  
  