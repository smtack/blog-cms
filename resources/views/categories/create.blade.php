<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Create Category') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xs sm:rounded-lg">
				<div class="p-6 text-gray-900">
					<form method="post" action="{{ route('categories.store') }}" class="mt-6 space-y-6">
						@csrf

						<div>
							<x-input-label for="name" :value="__('Name')" />
							<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
							<x-input-error class="mt-2" :messages="$errors->get('name')" />
						</div>

						<div class="flex items-center gap-4">
							<x-primary-button>{{ __('Save') }}</x-primary-button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
