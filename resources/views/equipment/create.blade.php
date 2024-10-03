<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            設備登録画面
        </h2>
    </x-slot>
    
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    
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
                            登録
                        </x-primary-button>                     
                    </form>
                </div>
            </div>
        </div>
      </section>
</x-app-layout>

