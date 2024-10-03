<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            設備登録画面
        </h2>
    </x-slot>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    
                    <form method="post" class="space-y-4 md:space-y-6" action="{{ route('breakdown.store')}}">
                    @csrf
                      
                        <div class="mt-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">生産日</label>
                            <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo date('Y-m-j');?>" >
                        </div>

                        <div class="mt-2">
                           
                            <label for="process_No" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">設備名</label>
                            <select id="process_No" name="process_No" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                               @foreach($equipments as $equipment)
                                <option value="{{$equipment->process_No}}">{{$equipment->equipment_name}}</option>
                                @endforeach
                              </select>
                           
                        </div>

                        <div class="mt-2">
                            <label for="count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">チョコ停数</label>
                            <input type="text" name="count" id="count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="">
                        </div>                   
                        
                        <x-primary-button class="mt-2">
                            登録
                        </x-primary-button>                     
                    </form>
            
                </div>
            </div>
        </div>
      </section>
    

</x-app-layout>




