<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            生産結果登録画面
        </h2>
    </x-slot>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex min-h-full items-center flex-col justify-center px-2 py-2 lg:px-8">
        
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    
                    <form method="post" class="space-y-4 md:space-y-6" action="{{ route('result.store')}}" enctype="multipart/form-data">
                    @csrf
                      
                        <div class="mt-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">生産日</label>
                            <x-input-error :messages="$errors->get('date')" class="mt-2"/>
                            <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo date('Y-m-j');?>" >
                        </div>
                        <div class="mt-2">
                            <label for="shift" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">シフト</label>
                            <select id="shift" name="shift" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1直">1直</option>
                                <option value="2直">2直</option>
                                <option value="3直">3直</option>
                              </select>
                        </div>
                            <div class="mt-2">
                               
                                <label for="production_rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">生産台数</label>
                                <x-input-error :messages="$errors->get('production_rate')" class="mt-2"/>
                                <input type="text" inputmode="numeric" name="production_rate" id="production_rate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div class="mt-2">
                                <label for="production_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">生産時間</label>
                                <input type="text" inputmode="numeric" name="production_time" id="production_time"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>

                            <p><input type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'" onclick="calc(production_rate.value, production_time.value);" value="計算"></p>

                            <div class="mt-2">
                                <label for="JPH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JPH</label>
                                <input type="text" inputmode="numeric" name="JPH" id="JPH"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>

                            <div class="mt-2">
                                <label for="working_rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">可動率</label>
                                <input type="text" inputmode="numeric" name="working_rate" id="working_rate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                      
                        <div class="mt-4">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">日報</label>
                            <textarea type="text" name="body" id="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" ></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="image">画像</label>
                            <div class="flex items-end">
                                <img id="previewImage" src="{{ asset('storage/images/noimage.jpg')}}" data-noimage="{{ asset('storage/images/noimage.jpg')}}" alt="" class="rounded shadow-md w-64">
                                <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image" value="">
                            </div>
                        </div>
                        
                        <x-primary-button class="mt-2">
                            登録
                        </x-primary-button>                     
                    </form>

                    <script>

                        function calc(production_rate, production_time) {
                            const JPH_value = document.getElementById('JPH').value = Math.round(production_rate/production_time);
                            const working_rate_value = document.getElementById('working_rate').value = Math.round(JPH_value/168*100);
                                    }
                        // 画像プレビュー
                        document.getElementById('image').addEventListener('change', e => {
                            const previewImageNode = document.getElementById('previewImage')
                            const fileReader = new FileReader()
                            fileReader.onload = () => previewImageNode.src = fileReader.result
                            if (e.target.files.length > 0) {
                                fileReader.readAsDataURL(e.target.files[0])
                                } else {
                                    previewImageNode.src = previewImageNode.dataset.noimage
                                    }
    })
                                    </script>
                </div>
            </div>
        </div>
      </section>
</x-app-layout>

