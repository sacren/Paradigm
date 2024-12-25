<x-app-layout>
    <x-slot:title>
        Create Job
    </x-slot:title>

    <x-slot:header>
        Create Job
    </x-slot:header>

    <form>
        <div class="space-y-12">
            <section class="border-b border-gray-200 pb-12">
                <h2 class="text-lg font-medium text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm text-gray-600">Please provide the required information below.</p>

                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="block w-full rounded-md shadow-sm ring-1 ring-gray-300 focus:ring-indigo-600 focus:border-indigo-600 sm:max-w-md sm:text-sm"
                                placeholder="e.g., Petroleum Technician"
                            />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="salary"
                                id="salary"
                                class="block w-full rounded-md shadow-sm ring-1 ring-gray-300 focus:ring-indigo-600 focus:border-indigo-600 sm:max-w-md sm:text-sm"
                                placeholder="e.g., $187,000.00"
                            />
                        </div>
                    </div>
                </div>

                <!-- Button Section -->
                <div class="mt-4 flex justify-end gap-4 sm:max-w-md">
                    <button
                        type="button"
                        class="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="rounded-md bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </section>
        </div>
    </form>
</x-app-layout>
