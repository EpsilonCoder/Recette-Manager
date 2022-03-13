<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creer une nouvelle recette') }}
        </h2>
    </x-slot>

    <!--Testoonnquelque chose pour voir ci ca marche
    @php
    $recipe=App\Models\Recipe::latest()->first();

    $recipe->ingredients->map(fn($ingredient) =>dump($ingredient->pivot->amount));

    @endphp-->

    <div class="py-12">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <form action="{{route('recipes.store')}}" method="post">
                    @csrf

                    <x-label value="Titre de la recette" for="title"></x-label>
                    <x-input name="title" id="title"></x-input>
                    <!--Ici y aura un probleme mais je l ai reglé avec les views composer-->
                    @foreach ($ingredients as $ingredient)
                    <div class="my-5" x-data="{isEnabled: false}">
                        <x-label value="{{ $ingredient->name }}" for="{{ $ingredient->id }}"></x-label>
                        <x-input type="checkbox" id="{{ $ingredient->id }}" x-model="isEnabled"></x-input>

                        <x-input name="ingredients[{{ $ingredient->id }}][amount]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-bind:disabled="!isEnabled"></x-input>
                        <x-input name="ingredients[{{ $ingredient->id }}][unit]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-bind:disabled="!isEnabled"></x-input>
                    </div>
                    @endforeach

                    <x-button type="submit">Créer ma recette</x-button>

                </form>
            </div>

        </div>

    </div>
</x-app-layout>