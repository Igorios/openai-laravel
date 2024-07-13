<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('OpenAI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-6 lg:px-8 ">
            <div class="p-10 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div style="padding: 10px">
                    <form class="mt-6 " action="{{ route('openai.index') }}" method="get">
                        <div style="margin-bottom: 20px">
                            <label class="block font-medium text-sm text-white mb-5" style="padding-top: 10px" for="search">
                                Digite sua pergunta aqui:
                            </label>
                            <input class="text-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500  rounded-md shadow-sm mt-1 block w-full" id="search" name="search" type="text" value="{{ request()->get('search') }}" required="required" autofocus="autofocus" autocomplete="search">
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label class="block font-medium text-sm text-white dark:text-gray-300 mb-10" for="model">
                                Modelo da IA:
                            </label>
                            @php $selected = request()->get('model', 'text-davinci-003'); @endphp
                            <select class="text-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500  rounded-md shadow-sm mt-1 block w-full" id="model" name="model" type="text" value="{{ $selected }}" required="required">
                                {!!  join("",$models->map( fn($x) => "<option value='".$x['id']."' ".($selected===$x['id']?'selected':'').">".$x['value']."</option>")->toArray()) !!} 
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-white text-black border border-transparent rounded-md font-semibold text-xs dark:text-gray-800 uppercase tracking-widest  focus:outline-none  focus:ring-offset-2 transition ease-in-out duration-150">
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @isset($result)
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Resposta do ChatGPT
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ $result }}
                    </p>
                    <p class="mt-1 text-sm text-green-700 dark:text-green-400">
                        <em>{!! join(' ', $info) !!}</em>
                    </p>
                </div>
            </div>
            @endisset
        </div>
    </div>
</x-app-layout>