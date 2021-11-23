<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-500">
                                <tr class="p-6 bg-white border-b border-gray-200">
                                    <th scope="col" class="px-6 py-4 text-left text-sm text-gray-500 uppercase tracking-wider">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-ssm text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-sm text-gray-500 uppercase tracking-wider">
                                        Secret
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-sm text-gray-500 uppercase tracking-wider">
                                        Redirect
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse (auth()->user()->clients as $client)
                                    <tr class="p-6 bg-white border-b border-gray-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->secret }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->redirect }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="p-6 bg-white border-b border-gray-200">
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                            <p class="text-center font-semibold">No clients :(</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
